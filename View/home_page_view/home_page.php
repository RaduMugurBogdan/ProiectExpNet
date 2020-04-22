<?php
session_start();
$option_value=null;
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
    $option_value="perform_account_config";
}else{
    $option_value="login";
}
?>
<html> 
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../Components/header/header_style.css">
        <link rel="stylesheet" href="./home_page_style.css">
    </head>
    <body>
        <header id="header_bar">
            <div id="logo_container">MyCar</div>
                   
            <div id="options_container">
                <div class="fa fa-plus item_icon"></div>
                <div class="fa fa-star item_icon"></div>
                <a id="username_container" href="../../Controller/account_controller.php?option=<?php echo $option_value;?>">
                <div class="fa fa-user-circle-o item_icon"></div>
                <div><?php if(isset($_SESSION['user_first_name'])){echo $_SESSION['user_first_name'];}?></div>
                </a>
            </div>
        </header>
    </body>
</html>