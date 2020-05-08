<?php
include_once __DIR__.'/init_database.php';
class FavoritePostsModel{
    private $conn=null;

    public function insert_favorite($user_id,$post_id){
        if($this->conn==null){
            return;
        }
        $query="INSERT INTO FAVORITE (ID,USER_ID,POST_ID) VALUES (NULL,'${user_id}','${post_id}')";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }
    public function delete_favorite($user_id,$post_id){
        if($this->conn==null){
            return;
        }
        $query="DELETE FROM FAVORITE WHERE POST_ID='${post_id}' AND  USER_ID='${user_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }
    public function exists($user_id,$post_id){
        if($this->conn==null){
            return false;
        }
        $query="SELECT * FROM FAVORITE WHERE USER_ID='${user_id}' AND  POST_ID='${post_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($result)==0){
            return false;
        }
        return true;
    }

    public function get_user_favorite_posts($user_id){
        if($this->conn==null){
            return null;
        }
        $query="SELECT NUME_BRAND,NUME_MODEL,FAVORITE.POST_ID AS FAV_ID,PICTURE FROM POSTARI 
                        JOIN FAVORITE ON POSTARI.ID=FAVORITE.POST_ID 
                        JOIN BRANDURI ON BRANDURI.ID=POSTARI.ID_BRAND 
                        JOIN MODELE ON MODELE.ID=POSTARI.ID_MODEL
                        JOIN PICTURES ON POSTARI.ID=PICTURES.POST_ID
                        WHERE FAVORITE.USER_ID='${user_id}' GROUP BY POSTARI.ID";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function __construct(){
        $this->conn=(new DatabaseInit())->get_db_conn();
        
    }
    
}

if(isset($_GET['user_id']) && isset($_GET['post_id']) && isset($_GET['option'])){
    $aux_object=new FavoritePostsModel();
    switch($_GET['option']){
        case 'exists':{
            echo json_encode($aux_object->exists($_GET['user_id'],$_GET['post_id']));
            exit;
        }
        case 'insert':{
            echo json_encode($aux_object->insert_favorite($_GET['user_id'],$_GET['post_id']));
            exit;
        }
        case 'delete':{
            echo json_encode($aux_object->delete_favorite($_GET['user_id'],$_GET['post_id']));
            exit;
        }
    }
}

?>