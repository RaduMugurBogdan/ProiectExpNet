<?php
    session_start();
    function reset_fields(){
        unset($_SESSION['email_error']);
        unset($_SESSION['password_error']);
        unset($_SESSION['conf_password_error']);
        unset($_SESSION['phone_error']);
        unset($_SESSION['first_name_error']);
        unset($_SESSION['last_name_error']);
        usnet($_SESSION['valid_email']);
        usnet($_SESSION['valid_email']);
        usnet($_SESSION['valid_password']);
        usnet($_SESSION['valid_conf_password']);
        usnet($_SESSION['valid_phone']);
        usnet($_SESSION['valid_first_name']);
        usnet($_SESSION['valid_last_name']);
    }

?>