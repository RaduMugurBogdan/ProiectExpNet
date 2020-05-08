<html> 
    <head>
        <title>Creare Postare</title>
        <link rel="stylesheet" href="./create_post_page_style.css">
        <link rel="stylesheet" href="../Components/header/header_style.css">
        <link rel="stylesheet" href="../Components/footer/footer_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
    <body onload="prepare_default()">
        <?php
                //import the header code
                include '../Components/header/header.php';
        ?>
        <form id="post_main_container" method="POST" action="../../Model/new_post.php" enctype="multipart/form-data">
            <div id="title_container">
                Adauga o postare
            </div>
            <section class="field_container" >
                <span class="field_label">
                    Brand
                </span>
                <select class="field_tag"  onchange="get_model(this)" name="brand_name" id="brand_input" ochange="del_errors(this,'brand_error','Alege Brand')"> 
                    <?php          
                        include '../../Model/post_model.php';
                        (new PostModelClass())->show_brands();
                    ?>
                </select>
            </section>
            <section class="error_container" id="brand_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Model
                </span>
                <select class="field_tag" id="model_container" name="model_name" onchange="change_model(this)">
                </select>
            </section>
            <section class="error_container" id="model_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Pret
                </span>    
                <input type="number" class="field_tag" min="0" value="0" name="price_value" id="price_input">
            </section>
            <section class="error_container" id="price_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Anul Fabricatiei
                </span>    
                <input type="number" class="field_tag" min="1986" max="2020" value="2020" name="man_year" id="year_input">
            </section>
            <section class="error_container" id="year_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Carburant
                </span>
                <select class="field_tag" name="fuel_type" id="carb_input">
                    <option selected>
                        Alege Carburantul
                    </option>
                    <option>
                        Diesel
                    </option>
                    <option>
                        Benzina
                    </option>
                    <option>
                        Hibrid
                    </option>
                    <option>
                        Electrica
                    </option>
                </select>
            </section>
            <section class="error_container" id="carb_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Kilometri
                </span>    
                <input type="number" class="field_tag" min="0" value="0" name="kils" id="kils_input">
            </section>
            <section class="error_container" id="kils_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Capacitate Cilindrica
                </span>
                <input type="number" class="field_tag" min="0" value="0" step="0.01" name="cil_cap" id="cil_cap_input">    
            </section>
            <section class="error_container" id="cil_cap_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Putere (CP)
                </span>
                <input type="number" class="field_tag" min="0" value="0" name="horse_p" id="horse_p_input">     
            </section>
            <section class="error_container" id="horse_p_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Norma de poluare
                </span>
                <select class="field_tag" name="pol_norm" id="pol_norm_input">
                    <option selected>
                        Alege Norma
                    </option>
                    <option>
                        Euro 1
                    </option>
                    <option>
                        Euro 2
                    </option>
                    <option>
                        Euro 3
                    </option>
                    <option>
                        Euro 4
                    </option>
                    <option>
                        Euro 5
                    </option>
                    <option>
                        Euro 6
                    </option>
                    
                </select>
            </section>
            <section class="error_container" id="pol_norm_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Emisii CO<sub>2</sub>(g/km)
                </span>
                <input type="number" class="field_tag" min="0" value="0" step="0.01" name="emissions" id="emiss_input">    
            </section>
            <section class="error_container" id="emiss_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Numar de portiere
                </span>
                <input type="number" class="field_tag" min="1" max="7" value="0" name="doors_n" id="door_input">    
            </section>
            <section class="error_container" id="door_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Culoare Caroserie
                </span>
                <input type="text" class="field_tag"  name="color" id="color_input">    
            </section>
            <section class="error_container" id="color_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Tara de origine
                </span>
                <input type="text" class="field_tag" name="country" id="country_input">    
            </section>
            <section class="error_container" id="country_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Fotografii
                </span>
                <input type="file" multiple="" class="field_tag" name="pictures[]" enctype="multipart/form-data" id="pics_input">    
            </section>
            <section class="error_container" id="pics_error">
            </section>
            <hr class="section_del_line">
            <section class="field_container" id="desc_area">
                <span class="field_label">
                    Alte detalii
                </span>
                <textarea class="field_tag" id="desc_text_area" name="ad_details"></textarea>    
            </section>    
            <hr class="section_del_line">
           <section id="button_container"><input type="button" id="post_button" value="Posteaza" onclick="perform_request(this)"></section>
        </form>
        <?php
        include '../Components/footer/footer.php';
         ?> 
        <script src="./aux_script.js"></script>
    </body>
</html>
