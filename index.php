<?php

//url path starting from localhost
$request = $_SERVER['REQUEST_URI'];

$path= explode("/",$request);

//var_dump($path);

 
switch ($path[2]) {
    case '' : 
        echo '/';//index page identic cu /home
        break;
    case 'home' ://pagina de index
        break;
    case 'add_post'://adaugare postare
        break;
    case 'login': //proces de login
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