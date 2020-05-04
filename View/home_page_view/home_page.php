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
        <link rel="stylesheet" href="../Components/footer/footer_Style.css">
        <link rel="stylesheet" href="./filter_page_view_style.css">
        <link rel="stylesheet" href="../Components/mini_view/mini_view.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body onload="init_pages()">
        <?php
            //import the header code
            include '../Components/header/header.php';
        ?>



        <section class="super_container">
            <section class="main_container"> 
                <form class="filter_container"  method="post" action="../../Model/perform_request.php">
                <div class="filter_label">Filtre</div>
                    <div class="filter_category">
                        <span class="filter_title_label">Brand</span>
                        <select class="filter_input" onchange="change_brand(this)" id="brand_input_id" name="brand">
                            <?php
                                include '../../Model/init_database.php';
                                if(!isset($_SESSION['brand'])){
                                    echo "<option selected>";
                                }else{
                                    echo "<option>";
                                }
                                echo "Alege";
                                echo "</option>";
                                $result=(new DatabaseInit())->get_all_valid_brands();
                                for($i=0;$i<count($result);$i++){
                                    if(isset($_SESSION['brand'])){
                                        echo "<option selected>";
                                    }else{
                                        echo "<option>";
                                    }
                                    echo $result[$i]['NUME_BRAND'];
                                    echo "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="filter_category">
                        <span class="filter_title_label">Model</span>
                        <select class="filter_input" id="model_input_id" onchange="change_model(this)" name="model">
                             <?php
                                if(!isset($_SESSION['model'])){
                                    echo "<option selected>";
                                }else{
                                    echo "<option>";
                                }
                                echo "Alege";
                                echo "</option>";
                                $result=(new DatabaseInit())->get_all_valid_models($_SESSION['brand']);
                                for($i=0;$i<count($result);$i++){
                                    if(isset($_SESSION['model'])){
                                        echo "<option selected>";
                                    }else{
                                        echo "<option>";
                                    }
                                    echo $result[$i]['NUME_MODEL'];
                                    echo "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="filter_category">
                        <span class="filter_title_label">Anul Fabricatiei</span>
                        <div class="multiple_inputs_cont">
                            <input type="number" class="filter_input dep_field" id="start_year" name="start_year"   value="<?php if(isset($_SESSION['min_year'])) echo $_SESSION['min_year']; ?>">
                            <input type="number" class="filter_input dep_field" id="final_year" name="final_year"  value="<?php if(isset($_SESSION['max_year'])) echo $_SESSION['max_year']; ?>">
                        </div>
                    </div>
                    <div class="filter_category">
                        <span class="filter_title_label">Kilometraj</span>
                        <div class="multiple_inputs_cont">
                            <input type="number" class="filter_input dep_field" min="0" id="start_kil" name="start_kil"  value="<?php if(isset($_SESSION['min_kil'])) echo $_SESSION['min_kil']; ?>">
                            <input type="number" class="filter_input dep_field" min="0" id="final_kil" name="final_kil" value="<?php if(isset($_SESSION['max_kil'])) echo $_SESSION['max_kil']; ?>">
                        </div>
                    </div>
                    <div class="filter_category">
                        <span class="filter_title_label">Pret</span>
                        <div class="multiple_inputs_cont">
                            <input type="number" class="filter_input dep_field" min="0" id="start_price" name="start_price"  value="<?php if(isset($_SESSION['min_price'])) echo $_SESSION['min_price']; ?>">
                            <input type="number" class="filter_input dep_field" min="0" id="final_price" name="final_price"  value="<?php if(isset($_SESSION['max_price'])) echo $_SESSION['max_price']; ?>">
                        </div>
                    </div>
                    <div class="filter_category">
                        <span class="filter_title_label">Combustibil</span>
                        <div class="multiple_inputs_cont">
                           <div>
                                <input type="checkbox" class="dep_field" value="diesel" name="comb[]" <?php if(isset($_SESSION['comb']) && in_array("diesel",$_SESSION['comb'])){echo "checked";}?>>
                                <span>Diesel</span>
                           </div>
                           <div>
                                <input type="checkbox" class="dep_field" value="benzina" name="comb[]" <?php if(isset($_SESSION['comb']) && in_array("benzina",$_SESSION['comb'])){echo "checked";}?>>
                                <span>Benzina</span>
                          </div>
                          <div>
                                <input type="checkbox" class="dep_field" value="electrica" name="comb[]" <?php if(isset($_SESSION['comb']) && in_array("electrica",$_SESSION['comb'])){echo "checked";}?>>
                                <span>Electrica</span>
                          </div> 
                          <div>
                                <input type="checkbox" class="dep_field" value="hibrid" name="comb[]" <?php if(isset($_SESSION['comb']) && in_array("hibrid",$_SESSION['comb'])){echo "checked";}?>>
                                <span>Hibrid</span>
                         </div>
                         <div>
                                <input type="checkbox" class="dep_field" value="toate" name="comb[]" <?php if(isset($_SESSION['comb']) && in_array("toate",$_SESSION['comb'])){echo "checked";}?>>
                                <span>Toate</span>
                         </div>
                        </div>
                    </div>
                    
                    <div class="filter_category" id="buttons_container">
                        <input type="submit" class="submit_button" value="Cauta" onclick="perform_request(this)"> 
                        <input type="submit" class="submit_button" value="Reset" onclick="reset_filters(this)">
                    </div>
                </form>
            
                <section class="mini_views_container">
                    <section class="cars_posts_container">
                        <?php
                            if(isset($_SESSION['result'])){
                                $result=$_SESSION['result'];
                                for($i=0;$i<count($result);$i++){
                                    ?>
                                    <section class="mini_view_container">
                                        <div class="picture_container">
                                            <img class="mini_view_img" src="https://s1.cdn.autoevolution.com/images/news/next-bmw-2-series-coupe-will-be-rwd-and-we-it-cant-come-soon-enough-138677_1.jpg">
                                        </div>
                                        <div class="info_container">
                                            <div class="car_desc">
                                                <span class="car_brand_name"><?php echo $result[$i]['nume_brand']; ?></span>
                                                <span class="car_model_name"><?php echo $result[$i]['nume_model']; ?></span>
                                            </div> 
                                            <div class="car_price"> 
                                                <span class="price"><?php echo $result[$i]['price']; ?></span> <sup class="eur_label"> EUR</sup>
                                            </div>  
                                        </div>
                                    </section>
                                    <?php    
                                }
                            }else{
                                echo "<h1>No results found</h1>";
                            }
                        ?>



                    </section>
                    <hr class="buttons_del_line">
                    <section class="menu_buttons_container">
                        <i class="fa fa-arrow-circle-left arr" onclick="preview_page()"></i>
                        <span id="page_index_container"></span>
                        <i class="fa fa-arrow-circle-right arr" onclick="next_page()"></i> 
                    </section>
                </section>
            </section>
            
            <section class="footer_container">
            </section>    
        </section>





        <script src="./filter_script.js"></script>
    </body>
</html>