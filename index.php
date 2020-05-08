<?php
//url path starting from localhost
$request = $_SERVER['REQUEST_URI'];
$path= explode("/",$request);

include './Controller/account_controller.php';

switch ($path[2]) {
    case '' : 
        header('Location:./View/home_page_view/home_page.php');//index page identic cu /home
        break;
    case 'home' ://pagina de index
        header('Location:./View/home_page_view/home_page.php');
        break;
    case 'add_post':
        include './Controller/view_post_controller.php';
        (new  ViewPostController())->create_new_post();
        break;
    case 'login': //proces de login
        new AccountController('login');
        break;
    case 'create_account'://creare cont
        new AccountController('create_account');
        break;
    case 'account_config': //modificare cont(postari proprii,lista de favorite,modificare date de contact si date credentiale)
        include __DIR__.'\Controller\account_controller.php';
        new AccountController('perform_account_config');
        break;    
    break;
    case 'visit_page': //pagina de vizita a unui client
        break;
    case 'favorite':
        //controller-ul responsabil de afisarea postarii
        include './Controller/favorite_controller.php';
        (new FavoriteControllerClass())->access_favorite_items();
        break;
    default:
        //header("Location:".$request);
    break;
}