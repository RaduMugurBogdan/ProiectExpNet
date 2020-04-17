<?php session_start();?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./create_acc_style.css" type="text/css">
    </head>
    <body>  
    <form method="POST" action="../../Model/new_account.php" id="main_container">
      
            <div id="title_container">    
                <i class='fas fa-user-alt' id="title_picture"></i>
                <span id="title_label">Creare Cont</span>
            </div>
            <hr class="sep_hr">
            <div class="error_label">
                <?php if(isset($_SESSION['email_error'])) echo $_SESSION['email_error'] ?>
            </div>
            <div class="input_data_panel">
                <div class="input_label">E-mail</div>
                <input type="text" class="input_box" name="email" value="<?php  if(isset($_SESSION['valid_email'])){echo $_SESSION['valid_email'];} ?>">
            </div>
            <div class="error_label">
                 <?php if(isset($_SESSION['password_error'])) echo $_SESSION['password_error'] ?>
            </div>
            <div class="input_data_panel">
                <div class="input_label">Parola</div>
                <input type="password" class="input_box" name="password" value="<?php if(isset($_SESSION['valid_password'])){echo $_SESSION['valid_password'];} ?>">
            </div>
            
            <div class="error_label">
                <?php if(isset($_SESSION['conf_password_error'])) echo $_SESSION['conf_password_error'] ?>
            </div>
            <div class="input_data_panel">
                <div class="input_label">Confirma Parola</div>
                <input type="password" class="input_box" name="conf_password" value="<?php if(isset($_SESSION['valid_conf_password'])){echo $_SESSION['valid_conf_password'];} ?>">
            </div>
            
            <div class="error_label">
                <?php if(isset($_SESSION['last_name_error'])) echo $_SESSION['last_name_error'] ?>
            </div>

            <div class="input_data_panel">
                <div class="input_label">Nume</div>
                <input type="text" class="input_box" name="last_name">
            </div>
            
            <div class="error_label">
                <?php if(isset($_SESSION['first_name_error'])) echo $_SESSION['first_name_error'] ?>
            </div>
            
            <div class="input_data_panel">
                <div class="input_label">Prenume</div>
                <input type="text" class="input_box" name="first_name">
            </div>
           
            <div class="error_label">
                <?php if(isset($_SESSION['phone_error'])) echo $_SESSION['phone_error'] ?>
            </div>

            <div class="input_data_panel">
                <div class="input_label">Telefon</div>
                <input type="text" class="input_box" name="phone">
            </div>
            

            <div class="input_data_panel">
                <div class="input_label">Adresa</div>
                <textarea class="input_text_area" name="address"></textarea>
            </div>
            <hr class="sep_hr">
            <div id="buttons_panel">
                <input type="submit" value="Finalizare" class="user_button">    
            </div>
    </form>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </body>
</html>