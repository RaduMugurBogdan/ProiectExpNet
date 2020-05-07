<?php
session_start();
if(isset($_SESSION['user_id'])==false){
    header("Location: ../home_page_view/home_page.php"); 
}
?>
<html>
    <head>
        <link rel="stylesheet" href="./personal_posts_page_style.css">
        <link rel="stylesheet" href="../Components/mini_personal_view/mini_personal_view.css">
        <link rel="stylesheet" href="../Components/header/header_style.css">
        <link rel="stylesheet" href="../Components/footer/footer_style.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <?php
            //import the header code
            include '../Components/header/header.php';
    ?>

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
            <a href="../../Controller/account_controller.php?option=logg_out" id="logg_out_button_cont">
            <button id="logg_out_button">
                Log Out
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
            
            <section class="user_content" id="cont_container">
                   <?php
                        if($_GET['page']=='favorite_id'){
                            include '../../Model/favorite_model.php';
                            $aux_object=new FavoritePostsModel();
                            $fav_objects=$aux_object->get_user_favorite_posts($_SESSION['user_id']);
                            
                            foreach($fav_objects as $aux){
                    ?>            
                                <section class="main_posts_container">
                                        <section class="post_container">
                                            <section class="mini_view_info">
                                                <section class="mini_view_picture">
                                                    <?php echo '<img class="picture" src="data:image/jpeg;base64,'.base64_encode($aux['PICTURE']).'"  />';?>
                                                </section>
                                                <section class="mini_view_labels">   
                                                    <span class="brand_name_container"><?php echo $aux['NUME_BRAND']; ?></span>
                                                    <span class="model_name_container"><?php echo $aux['NUME_MODEL']; ?></span> 
                                                </section>
                                            </section>
                                            <section class="options_panel">
                                                <section class="post_option" onclick="delete_favorite(<?php echo 'this,'.$_SESSION['user_id'].','.$aux['FAV_ID']; ?>)">Sterge</section>
                                            </section>
                                        </section>
                                </section>
                                
                    <?php
                            }
                        }
                    ?>

                    <?php
                        if($_GET['page']=='postari_id'){
                            include '../../Model/personal_posts_model.php';
                            $aux_object=new PersonalPostModel();
                            $fav_objects=$aux_object->get_personal_posts();
                            foreach($fav_objects as $aux){
                    ?>            
                                <section class="main_posts_container">
                                        <section class="post_container">
                                            <section class="mini_view_info">
                                                <section class="mini_view_picture">
                                                    <?php echo '<img class="picture" src="data:image/jpeg;base64,'.base64_encode($aux['picture']).'"  />';?>
                                                </section>
                                                <section class="mini_view_labels">   
                                                    <span class="brand_name_container"><?php echo $aux['nume_brand']; ?></span>
                                                    <span class="model_name_container"><?php echo $aux['nume_model']; ?></span> 
                                                </section>
                                            </section>
                                            <section class="options_panel">
                                                <section class="post_option">Modifica</section>   
                                                <section class="post_option" onclick="delete_post(<?php echo 'this,'.$aux['post_id']; ?>)">Sterge</section>
                                            </section>
                                        </section>
                                </section>
                                
                    <?php
                            }
                        }
                    ?>



           </section>
       </section>
    </section>
    <?php
        include '../Components/footer/footer.php';
    ?> 
    <script src="./personal_posts.js"></script>
    </body>
</html>