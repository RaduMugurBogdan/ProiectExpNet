<?php

session_start();
function init(){
    if(empty($_SESSION['logged'])==true){
        $_SESSION['logged']=false;
    }
}


?>