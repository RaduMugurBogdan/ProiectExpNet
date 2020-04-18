<html> 
    <head>
        <title>Create_Post</title>
        <link rel="stylesheet" href="./create_post_page_style.css">
    </head>
    <body>
        <section id="post_main_container">
            <div id="title_container">
                New Post
            </div>
            <section class="field_container">
                <span class="field_label">
                    Brand
                </span>
                <select class="field_tag">
                    <option>Bmw</option>
                </select>
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Model
                </span>
                <select class="field_tag">
                    <option>
                        Seria 5
                    </option>
                </select>
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Versiune
                </span>
                <select class="field_tag">
                    <option>
                        F 10
                    </option>
                </select>
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Anul Fabricatiei
                </span>    
                <input type="month" class="field_tag" min="2018-03">
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
                <input type="number" class="field_tag" min="0">    
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
                        Euro 6
                    </option>
                </select>
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Emisii CO<sub>2</sub>(g/km)
                </span>
                <input type="number" class="field_tag" min="0">    
            </section>
            <hr class="section_del_line">
            <section class="field_container">
                <span class="field_label">
                    Numar de portiere
                </span>
                <input type="number" class="field_tag" min="0">    
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
           <section id="button_container"><button id="post_button">Posteaza</button></section>
        </section>
    </body>
</html>