<?php
session_start();
//url path starting from localhost
$request = $_SERVER['REQUEST_URI'];

$path= explode("/",$request);

if(isset($_SESSION['logged'])==false){
    $_SESSION['logged']=false;
}

 
switch ($path[2]) {
    case '' : 
        header('Location:./View/home_page_view/home_page.php');//index page identic cu /home
        break;
    case 'home' ://pagina de index
        header('Location:./View/home_page_view/home_page.php');
        break;
    case 'add_post'://adaugare postare
        break;
    case 'login': //proces de login
        include __DIR__.'/Controller/account_controller.php';
        new AccountController('login');
        break;
    case 'create_account'://creare cont
        break;
    case 'account_config': //modificare cont(postari proprii,lista de favorite,modificare date de contact si date credentiale)
        break;
    case 'visit_page': //pagina de vizita a unui client
        break;
    default:
        echo 'error page';
    break;
}