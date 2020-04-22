<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="./personal_posts_page_style.css">
        <style>
            <?php
                if(empty($_GET['page'])==false){    
                    echo "#".$_GET['page']."{color:red;}";
                }else{
                    header("Location: ./personal_posts_page.php?page=postari_id");
                }                                           
            ?>
        </style>
    <meta http-equiv="Cache-control" content="no-cache">
    </head>
    <body> 
     <section id="main_container">   
        <section id="main_details_container">
            <section id="username_container">
                <img  id="user_picture" src="https://cdn0.iconfinder.com/data/icons/set-ui-app-android/32/8-512.png">
                <span id="username_label"><?php if(isset($_SESSION['logged_in'])){echo $_SESSION['user_first_name']." ".$_SESSION['user_last_name'];}?></span>
            </section>
            <hr class="contact_del_line">
            <section id="contact_data_container">
                <div class="contact_item"><div class="contact_label">Telefon</div><div class="contact_value"><?php if(isset($_SESSION['logged_in'])){echo $_SESSION['user_phone'];}?></div></div>
                <div class="contact_item"><div class="contact_label">E-main</div><div class="contact_value"><?php if(isset($_SESSION['logged_in'])){echo $_SESSION['user_email_address'];}?></div></div>
                <div class="contact_item"><div class="contact_label">Adresa</div><div class="contact_value"><?php if(isset($_SESSION['logged_in'])){echo $_SESSION['user_address'];}?></div></div>
            </section>
            <a href="../../Controller/account_controller.php?option=logg_out" id="logg_oout_button_cont">
            <button id="logg_out_button">
                Logg Out
            </button>
            </a>
        </section>
        <section id="posts_container">
            <section id="posts_title_container">
                <span class="posts_label" ><a id="postari_id" href="./personal_posts_page.php?page=postari_id">Postari</a></span>
                <span class="posts_label" ><a id="favorite_id" href="./personal_posts_page.php?page=favorite_id">Favorite</a></span>
                <span class="posts_label" ><a id="cont_id" href="./personal_posts_page.php?page=cont_id">Cont</a></span>
            </section>
            <hr class="contact_del_line">
            <form class="user_content" id="cont_container">
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
                        <textarea class="input_text_area" name="address" id="text_ar"></textarea>
                    </div>
                    <hr class="sep_hr">
                    <div id="buttons_panel">
                        <input type="submit" value="Modifica" class="user_button">    
                    </div>
            </section>
        </section>
    </section>
    </body>
</html>