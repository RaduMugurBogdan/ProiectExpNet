<?php
session_start();
class AccountController{
    private function perform_login(){
        if(isset($_SESSION['logged_in'])==false){
            //redirectionare spre pagina de logare
            header('Location:'.$_SERVER['DOCUMENT_ROOT'].'/ProiectExpNet/View/login_page_view/login_page.php');
            //header('Location:login');
        }else{
            header('Location:'.$_SERVER['DOCUMENT_ROOT'].'/ProiectExpNet/View/home_page_view/home_page.php');
        }
    }
    private function perform_account_creat(){
        if(isset($_SESSION['logged_in'])==true && $_SESSION['logged_in']==false){
            //creare_cont
            header('Location:./View/creat_acc_page_view/creat_acc_page.php');
        }else{
            header('Location:../View/home_page_view/home_page.php');           
            //redirectare catre pagina de home ,daca exista deja un cont activ
            //in sesiune
        }
    }
    private function perform_account_config(){
        if(isset($_SESSION['logged_in'])==true){
            //redirectionare spre controller-ul de administrare a contului
            header('Location:'.__DIR__.'../View/personal_posts_page_view/personal_posts_page.php');
        }else{
            //redirectare catre pagina de login  ,daca exista deja un cont activ
            //in sesiune
            header('Location:'.__DIR__.'../View/home_page_view/home_page.php');           
            
        }
    }
    private function perform_logg_out(){
        session_destroy();
        header('Location:../View/home_page_view/home_page.php');  
    }
    function dummy_method(){
        echo "message from dummy method";
    }
    function __construct($service_name){
        switch($service_name){
            case 'login':
                $this->perform_login();
                break;
            case 'create_account':
                $this->perform_account_creat();
                break;
            case 'perform_account_config':
                $this->perform_account_config();
            break;
            case 'logg_out':
                $this->perform_logg_out();
            break;
            default:
                echo "error page";
            break;
        }
    }

}

if(isset($_GET['option'])){
    new AccountController($_GET['option']);
}

?>