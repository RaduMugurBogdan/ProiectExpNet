<?php
    session_start();
?>
 <html> 
    <head>
        <title>Login Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="./login_page_style.css">
    </head>
    <body>        
        <form id="main_container" method="POST" action="../../Model/login_aux.php">
            <div id="title_container">
                <i class='fas fa-user-circle' id="title_picture"></i>
                <span id="title_label">Login</span>
            </div>
            <div class="error_label">
                <?php if(!empty($_SESSION['login_email_error'])) echo $_SESSION['login_email_error'];?>
            </div>
            <div class="input_data_panel">
                <div class="input_label">E-mail</div>
                <input type="text" class="input_box" name="email" value="<?php if(!empty($_SESSION['login_email_value'])) echo $_SESSION['login_email_value']; ?>">
            </div>
            <div class="error_label">
                <?php if(!empty($_SESSION['login_password_error'])) echo $_SESSION['login_password_error'];?>
            </div>
            <div class="input_data_panel">
                <div class="input_label">Parola</div>
                <input type="password" class="input_box" name="password" value="<?php if(!empty($_SESSION['login_password_value'])) echo $_SESSION['login_password_value']; ?>">
            </div>
            <hr class="sep_hr">
            <div id="buttons_panel">
                <input type="submit" value="Login" class="user_button">
                <a href="http://localhost/ProiectExpNet/Controller/account_controller.php?option=create_account">
                <input type="button" value="Creare Cont" class="user_button">
                </a>    
            </div>
        </form>

        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </body>
</html>