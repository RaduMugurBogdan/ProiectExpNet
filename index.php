<?php
//url path starting from localhost
$request = $_SERVER['REQUEST_URI'];
$path= explode("/",$request);


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
        include './Controller/account_controller.php';
        new AccountController('login');
        break;
    case 'create_account'://creare cont
        header('Location:\Controller\account_controller.php?option=create_account');
        //include __DIR__.'\Controller\account_controller.php';
        //new AccountController('create_account');
        break;
    case 'account_config': //modificare cont(postari proprii,lista de favorite,modificare date de contact si date credentiale)
        include __DIR__.'\Controller\account_controller.php';
        new AccountController('perform_account_config');
        break;    
    break;
    case 'visit_page': //pagina de vizita a unui client
        break;
    case 'view_post':
        //controller-ul responsabil de afisarea postarii
        break;
    default:
        header("Location:".$request);
    break;
}