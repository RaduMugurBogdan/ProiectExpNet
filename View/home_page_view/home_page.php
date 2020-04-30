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



        <section class="super_container">
            <section class="main_container"> 
                <section class="filter_container">
                <div class="filter_label">Filtre</div>
                    <div class="filter_category">
                        <span class="filter_title_label">Brand</span>
                        <select class="filter_input" onchange="change_brand(this)" id="brand_input_id">
                            <option selected="selected">
                                Alege
                            </option>
                            <option>
                                BMW
                            </option>
                        </select>
                    </div>
                    <div class="filter_category">
                        <span class="filter_title_label">Model</span>
                        <select class="filter_input" disabled id="model_input_id" onchange="change_model(this)">
                            <option selected="selected">
                                Alege
                            </option>
                            <option>
                                5 Series
                            </option>
                        </select>
                    </div>
                    <div class="filter_category">
                        <span class="filter_title_label">Anul Fabricatiei</span>
                        <div class="multiple_inputs_cont">
                            <input type="number" class="filter_input dep_field" id="start_year"  disabled>
                            <input type="number" class="filter_input dep_field" id="final_year" disabled>
                        </div>
                    </div>
                    <div class="filter_category">
                        <span class="filter_title_label">Kilometraj</span>
                        <div class="multiple_inputs_cont">
                            <input type="number" class="filter_input dep_field" min="0" id="start_kil" disabled>
                            <input type="number" class="filter_input dep_field" min="0" id="final_kil" disabled>
                        </div>
                    </div>
                    <div class="filter_category">
                        <span class="filter_title_label">Pret</span>
                        <div class="multiple_inputs_cont">
                            <input type="number" class="filter_input dep_field" min="0" id="start_price" disabled>
                            <input type="number" class="filter_input dep_field" min="0" id="final_price" disabled>
                        </div>
                    </div>
                    <div class="filter_category">
                        <span class="filter_title_label">Combustibil</span>
                        <div class="multiple_inputs_cont">
                           <div>
                                <input type="checkbox" class="dep_field" disabled>
                                <span>Diesel</span>
                           </div>
                           <div>
                                <input type="checkbox" class="dep_field" disabled>
                                <span>Benzina</span>
                          </div>
                          <div>
                                <input type="checkbox" class="dep_field" disabled>
                                <span>Electrica</span>
                          </div> 
                          <div>
                                <input type="checkbox" class="dep_field" disabled>
                                <span>Hibrid</span>
                         </div>
                         <div>
                                <input type="checkbox" class="dep_field" dsiabled>
                                <span>Toate</span>
                         </div>
                        </div>
                    </div>
                    
                    <div class="filter_category" id="buttons_container">
                        <input type="submit" class="submit_button" value="Cauta" disabled>
                        <input type="submit" class="submit_button" value="Reset" disabled onclick="reset_filters(this)">
                    </div>
                </section>
    
                <section class="mini_views_container">
                    <section class="cars_posts_container">
                    </section>
                    <hr class="buttons_del_line">
                    <section class="menu_buttons_container">
                        <i class='arr'>&#60;</i>
                        <span class="page_index_container">1/<sub>100</sub></span>
                        <i class='arr'>&#62;</i>
                    </section>
                </section>
            </section>
            
            <section class="footer_container">
            </section>    
        </section>
        <script src="./filter_script.js"></script>
    </body>
</html>