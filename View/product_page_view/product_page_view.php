<?php
    include '../../Model/product_page_model.php';
    $product_info=null;
    if(isset($_GET['post_id'])){
        $product_info=get_post_info($_GET['post_id']);
        if($product_info==false){
            header("Location:../home_page_view/home_page.php");
        }
    }else{
        header("Location:../home_page_view/home_page.php");
    }
?>
<html>
    <head>
        <title>Product page</title>
        <link rel="stylesheet" href="./product_page_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <section id="product_pres_container">
            <section id="product_pictures_panel">
                <section id="picture_panel">
                    <?php
                        for($i=0;$i<count($product_info);$i++){
                            $picture=$product_info[$i]['picture'];
                            echo '<img class="car_picture" src="data:image/jpeg;base64,'.base64_encode($picture).'"  />';
                        }
                    ?>
                </section>
                <section id="buttons_list_panel"> 
                    <i class="fa fa-arrow-circle-left button_object" onclick="preview_picture()"></i>
                    <span id="picture_counter"></span> 
                    <i class="fa fa-arrow-circle-right button_object" onclick="next_picture()"></i>
                </section>
            </section>
            <section id="product_info_panel">
                <div id="product_name_panel"><?php echo $product_info[0]['nume_brand']."<br>Model: ".$product_info[0]['nume_model'] ?></div>
                <hr class="del_line">
                <div id="price_container"><span id="price_label">Pret: </span><span id="price_value"><?php echo $product_info[0]['price'] ?></span><sub>   EUR</sub></div>
                <hr class="del_line">
                <div id="fav_button_panel">
                    <button class="fav_button">Pagina Proprietarului</button>
                    <button class="fav_button">Adauga la favorite</button>
                </div>
                <hr class="del_line">
                <div id="contacts_panel">
                    <div class="info_container"><span class="info_label">Telefon:</span><span class="info_cont_label"><?php echo $product_info[0]['phone'];?></span></div>
                    <div class="info_container"><span class="info_label">E-mail:</span><span class="info_cont_label"><?php echo $product_info[0]['email']; ?></span></div>
                </div>
            </section>
        </section>
        <section id="product_info_container">
            <section class="info_section">
                <span class="title_label">Descriere</span>
                <section class='info_data_container'>
                    <div class="info_item">
                        <span class="info_title">Nume Brand</span>
                        <span class="info_value"><?php echo $product_info[0]['nume_brand'];?></span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Nume Model</span>
                        <span class="info_value"><?php echo $product_info[0]['nume_model'];?></span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Kilometri</span>
                        <span class="info_value"><?php echo $product_info[0]['kilometri']; ?></span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">An fabricatie</span>
                        <span class="info_value"><?php echo $product_info[0]['an_fabricatie'] ?></span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Carburant</span>
                        <span class="info_value"><?php echo $product_info[0]['carburant'] ?></span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Capacitate Cilindrica</span>
                        <span class="info_value"><?php echo $product_info[0]['cap_cilindrica'] ?> cm<sup>3<sup></span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Putere</span>
                        <span class="info_value"><?php echo $product_info[0]['putere_cp'] ?> CP</span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Norma De Poluare</span>
                        <span class="info_value"><?php echo $product_info[0]['norma_poluare'] ?></span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Emisii CO<sub>2<sub></span>
                        <span class="info_value"><?php echo $product_info[0]['emisii'] ?> g/km</span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Numar De Portiere</span>
                        <span class="info_value"><?php echo $product_info[0]['numar_portiere'] ?></span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Culoare Caroserie</span>
                        <span class="info_value"><?php echo $product_info[0]['culoare_car'] ?></span>
                    </div>
                    <hr class="info_del_line">
                </section>
                </section>
            <section class="info_section">
                <span class="title_label">Detalii</span>
                <spna><?php echo $product_info[0]['detalii'] ?></span>
            </section>
        </section>
        <script src="./aux_script.js"></script>       
    </body>
</html>