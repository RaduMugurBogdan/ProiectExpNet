<html> 
    <head>
        <title>Creare Postare</title>
        <link rel="stylesheet" href="./create_post_page_style.css">
    </head>
    <body>
        <form id="post_main_container">
            <div id="title_container">
                Adauga o postare
            </div>
            <section class="field_container" >
                <span class="field_label">
                    Brand
                </span>
                <select class="field_tag"  onchange="get_model(this)">
                    <?php          
                        include '../../Model/post_model.php';
                        (new PostModelClass())->show_brands();
                    ?>
                </select>
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Model
                </span>
                <select class="field_tag" id="model_container" disabled>
                </select>
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Pret
                </span>    
                <input type="number" class="field_tag" min="0">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Anul Fabricatiei
                </span>    
                <input type="number" class="field_tag" min="1986" max="2020" value="2020">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Carburant
                </span>
                <select class="field_tag">
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
            
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Kilometri
                </span>    
                <input type="number" class="field_tag" min="0">
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Capacitate Cilindrica
                </span>
                <input type="number" class="field_tag" min="0" step="0.01">    
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Putere (CP)
                </span>
                <input type="number" class="field_tag" min="0">    
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Norma de poluare
                </span>
                <select class="field_tag">
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
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Emisii CO<sub>2</sub>(g/km)
                </span>
                <input type="number" class="field_tag" min="0" step="0.01">    
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Numar de portiere
                </span>
                <input type="number" class="field_tag" min="1" max="7">    
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Culoare Caroserie
                </span>
                <input type="text" class="field_tag" min="0">    
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Tara de origine
                </span>
                <input type="text" class="field_tag" >    
            </section>

            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Fotografii
                </span>
                <input type="file" multiple="" class="field_tag">    
            </section>
            
            <hr class="section_del_line">
            <section class="field_container" id="desc_area">
                <span class="field_label">
                    Alte detalii
                </span>
                <textarea class="field_tag" id="desc_text_area"></textarea>    
            </section>    
            <hr class="section_del_line">
           <section id="button_container"><input type="button" id="post_button" value="Posteaza"></section>
        </form>
        <script src="./aux_script.js"></script>
    </body>
</html>
