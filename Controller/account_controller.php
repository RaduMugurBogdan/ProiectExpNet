<?php


class AccountController{
    private function perform_login(){
        if(isset($_SESSION['logged']) and $_SESSION['logged']==false){
            //redirectionare spre pagina de logare
        }else{
            //redirectare catre pagina de home ,daca exista deja un cont activ
            //in sesiune
        }
    }
    private function perform_account_creat(){
        if(isset($_SESSION['logged'])==true and $_SESSION['logged']==false){
            //creare_cont
        }else{
            //redirectare catre pagina de home ,daca exista deja un cont activ
            //in sesiune
        }
    }
    private function perform_account_config(){
        if(isset($_SESSION['logged'])==true and $_SESSION['logged']==true){
            //redirectionare spre controller-ul de administrare a contului
        }else{
            //redirectare catre pagina de login  ,daca exista deja un cont activ
            //in sesiune
        }
    }
    function __construct($service_name){
        session_start();
        switch($service_namme){
            case 'login':
                perform_login();
                break;
            case 'create_account':
                perform_account_creat();
                break;
            case 'perform_account_config':
            break;
            default:
                echo "error page";
            break;
        }
    }

}


?>