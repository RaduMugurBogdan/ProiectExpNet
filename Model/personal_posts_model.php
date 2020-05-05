<?php
session_start();
class PersonalPostModel{
    private $conn;
    public function get_personal_posts(){
        if($this->conn!=null && isset($_SESSION['user_id'])){
            $query="SELECT * FROM POSTARI JOIN BRANDURI ON BRANDURI.ID=POSTARI.ID_BRAND JOIN MODELE ON POSTARI.ID_MODEL=MODELE.ID WHERE ID_USER='".$_SESSION['user_id']."'";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return null;
        }
    }
    
    public function __construct(){
        include './init_database.php';
        $this->conn=(new DatabaseInit())->get_db_conn();
    }
}


if(isset($_GET['content'])){
    $aux_object=new PersonalPostModel();
    switch($_GET['content']){
        case 'personal_posts':{
            $aux_object->get_personal_posts();
            break;
        }
    }
}




?>