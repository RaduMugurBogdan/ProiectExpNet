<?php
if(isset($_SESSION)==false){
    session_start();
}
class ViewPostController{
    public function create_new_post(){
        if(isset($_SESSION['user_id'])){
            header("Location:http://localhost/ProiectExpNet/View/create_posts_page_view/create_post_page_view.php");
        }else{
            header("Location:http://localhost/ProiectExpNet/login");
        }
    }
    public function __costruct(){
        
    }
}


?>