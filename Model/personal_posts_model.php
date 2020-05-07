<?php
if(isset($_SESSION)==false){
    session_start();
}
class PersonalPostModel{
    private $conn;
    public function delete_post($post_id){
        if($this->conn==null){
            return;
        }
        $query="DELETE FROM POSTARI WHERE POSTARI.ID='${post_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();    
    }
    public function get_personal_posts(){
        if($this->conn!=null && isset($_SESSION['user_id'])){
            $user_id=$_SESSION['user_id'];
            $query="SELECT nume_brand,nume_model,picture,POSTARI.ID AS post_id FROM POSTARI 
            JOIN BRANDURI ON BRANDURI.ID=POSTARI.ID_BRAND 
            JOIN MODELE ON MODELE.ID=POSTARI.ID_MODEL
            JOIN PICTURES ON POSTARI.ID=PICTURES.POST_ID
            WHERE POSTARI.ID_USER='${user_id}' GROUP BY POSTARI.ID";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }else{
            return null;
        }
    }
    
    public function __construct(){
        include_once __DIR__.'/init_database.php';
        $this->conn=(new DatabaseInit())->get_db_conn();
    }
}

if(isset($_GET['content'])){
    $aux_object=new PersonalPostModel();
    switch($_GET['content']){
        case 'personal_posts':{
            $aux_object->get_personal_posts();
            exit;
        }
        case 'delete_post':{
            if(isset($_GET['post_id'])){
                $aux_object->delete_post($_GET['post_id']);
            }
            exit;
        }
    }
}




?>