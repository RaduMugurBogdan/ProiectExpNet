<?php
if(isset($_SESSION)==false){
    session_start();
}

class FavoriteControllerClass{
    public function access_favorite_items(){
        if(isset($_SESSION['user_id'])){
            header("Location:http://localhost/ProiectExpNet/View/personal_posts_page_view/personal_posts_page.php?page=favorite_id");
        }else{
            header("Location:http://localhost/ProiectExpNet/login");
        }
    }
    public function __construct(){

    }
}




?>