<?php
        include './account_model.php';
        session_start();
        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST["conf_password"]) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone']) && isset($_POST['address'])){
            $error_checker=false;
            
            unset($_SESSION['email_error']);
            unset($_SESSION['password_error']);
            unset($_SESSION['conf_password_error']);
            unset($_SESSION['phone_error']);
            unset($_SESSION['first_name_error']);
            unset($_SESSION['last_name_error']);

            $_SESSION['valid_email']=$_POST['email'];
            $_SESSION['valid_password']=$_POST['password'];
            $_SESSION['valid_conf_password']=$_POST['conf_password'];
            $_SESSION['valid_phone']=$_POST['phone'];
            $_SESSION['valid_first_name']=$_POST['first_name'];
            $_SESSION['valid_last_name']=$_POST['last_name'];

            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==false){
                $_SESSION['email_error']="The string is not an e-mail address";
                $error_checker=true;
            }else if($acc_object->check_for_email($_POST['email'])==false){
                    $_SESSION['email_error']="The e-mail address is already used";
                    $error_checker=true;
            }

            if(strlen($_POST['password'])<=8){
                $_SESSION['password_error']="Too short password.Minimun 8 charcters required";
                $error_checker=true;
            }

            if($_POST['password']!=$_POST['conf_password']){
                $_SESSION['conf_password_error']="The passwords don't match";
                $error_checker=true;
            }

            if(filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT)==false){
                $_SESSION['phone_error']="The value is not a phone number";
                $error_checker=true;
            }

            if(strlen($_POST['first_name'])==0){
                $_SESSION['first_name_error']="The value can't be a name";
                $error_checker=true;
            }

            if(strlen($_POST['last_name'])==0){
                $_SESSION['last_name_error']="The value can't be a name";
                $error_checker=true;
            }
            
            if($error_checker==true){
                header("Location:../View/create_acc_page_view/create_acc_page.php");    
            }else{
                $acc_object->create_account($_POST['email'],$_POST['password'],$_POST['last_name'],$_POST['first_name'],$_POST['phone'],$_POST['address']);
                header("Location:../View/home_page_view/home_page.php"); 
            }      
        }else{
            header("Location:../View/create_acc_page_view/create_acc_page.php");
        }
        
?>