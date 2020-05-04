
function reset_filters(input_object){
    document.getElementById("brand_input_id").value="Alege";
    change_brand(document.getElementById("brand_input_id"));
    document.getElementById("model_input_id").value="Alege";
    dep_fields=document.getElementsByClassName('dep_field');
    for(i=0;i<dep_fields.length;i++){
        dep_fields[i].value="";
        dep_fields[i].max="0";
        dep_fields[i].min="0";
        dep_fields[i].checked=false;
    }
}

function set_access_to_fields(class_name,access_value){
    my_elements=document.getElementsByClassName(class_name);
    for(i=0;i<my_elements.length;i++){
        my_elements[i].disabled=access_value;
    }
}
function set_dep_fields_value(brand_name,model_name){
    set_access_to_fields("dep_field",false);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var my_object = JSON.parse(this.responseText);
             
                document.getElementById('start_year').value=my_object['min_year'];
                document.getElementById("start_year").min=my_object['min_year'];
                document.getElementById("start_year").max=my_object['max_year'];
                

                document.getElementById('final_year').value=my_object['max_year'];
                document.getElementById("final_year").max=my_object['max_year'];
                document.getElementById("final_year").min=my_object['min_year'];

                document.getElementById("start_kil").value=my_object['min_k'];
                document.getElementById("start_kil").min=my_object['min_k'];
                document.getElementById("start_kil").max=my_object['max_k'];
                

                document.getElementById("final_kil").value=my_object['max_k'];
                document.getElementById('final_kil').max=my_object['max_k'];
                document.getElementById('final_kil').min=my_object['min_k'];

                document.getElementById('start_price').value=my_object['min_price'];
                document.getElementById('start_price').min=my_object['min_price'];
                document.getElementById('start_price').max=my_object['max_price'];
                
                
                document.getElementById('final_price').value=my_object['max_price'];
                document.getElementById('final_price').max=my_object['max_price'];
                document.getElementById('final_price').min=my_object['min_price'];

            }
        };
        xmlhttp.open("GET", "../../Model/get_dep_db_api.php?brand="+brand_name+"&model="+model_name, true);
        xmlhttp.send();
}

function set_fields_empty(){
    let objects=document.getElementsByClassName("dep_field");
    for(let i=0;i<objects.length;i++){
        objects[i].value="";
    }
}

function change_brand(input_object){
    if(input_object.value.trim()=="Alege"){
        document.getElementById("model_input_id").value="Alege";
        document.getElementById("model_input_id").disabled=true;
        set_access_to_fields("submit_button",true);
        set_access_to_fields("dep_field",true);
        set_fields_empty();
    }else{
        document.getElementById("model_input_id").disabled=false;
            set_access_to_fields("submit_button",false);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var my_object = JSON.parse(this.responseText);
            mod_object=document.getElementById('model_input_id');
            mod_object.innerHTML="<option selected>Alege</option>";
            for(i=0;i<my_object.length;i++){
                aux_cont="<option>"+my_object[i]['NUME_MODEL']+"</option>";
                mod_object.innerHTML=mod_object.innerHTML+aux_cont;
            }
        }
        };
        xmlhttp.open("GET", "../../Model/get_models_db_api.php?brand="+input_object.value.trim(), true);
        xmlhttp.send();
        set_access_to_fields("dep_field",false);
        brand_value=document.getElementById('brand_input_id').value.trim();
        set_dep_fields_value(brand_value,"Altele");
    }
}



function change_model(input_object){
    if(input_object.value.trim()=="Alege"){
        set_access_to_fields("dep_field",true);
        //set_fields_empty();
        set_dep_fields_value(brand_value,"Altele");
    }else{
        set_access_to_fields("dep_field",false);
        brand_value=document.getElementById('brand_input_id').value.trim();
        model_value=input_object.value.trim();
        set_dep_fields_value(brand_value,model_value);
    }
}

function validate_fields(object_min_id,object_max_id){
    first_object=document.getElementById(object_min_id);
    last_object=document.getElementById(object_max_id);
    first_ob_min=first_object.min;
    first_ob_max=first_object.max;
    first_ob_value=first_object.value;
    last_ob_min=last_object.min;
    last_ob_max=last_object.max;
    last_ob_value=last_object.value;

    if(first_ob_value=="" || (first_ob_value>=first_ob_min && first_ob_value<=first_ob_max)==false){
        first_object.value=first_ob_min;
    }
    if(last_ob_value=="" || (last_ob_value>=last_ob_min && last_ob_value<=last_ob_max)==false){
        last_object.value=last_ob_max;
    }
    if(first_ob_value>last_ob_value){
        first_object.value=first_ob_min;
        first_object.value=first_ob_min;
    }
}


function perform_request(input_object){
    brand=document.getElementById("brand_input_id");
    model=document.getElementById("model_input_id");
    validate_fields("start_year","final_year");
    validate_fields("start_kil","final_kil");
    validate_fields("start_price","final_price");
    this.submit();
}

/***************************products load*************************************************/

var curent_page=1;//pagina curenta
var pages_number;//numarul de pagini
var max_items_page=2;//numarul maxim de produse acceptat pe o prezentare
var items_number;//numarul total de postari
function init_pages(){
    items_number=document.getElementsByClassName("mini_view_container").length;
    if(items_number!=0){    
        pages_number=Math.floor(items_number/max_items_page)+1*(items_number%max_items_page!=0);
        elements=document.getElementsByClassName("mini_view_container");
        for(i=0;i<items_number%max_items_page;i++){
            elements[i].style.display="flex";
        }
        modify_front();
    }
}

function modify_front(){
    document.getElementById("page_index_container").innerHTML=curent_page+"/<sub>"+pages_number+"</sub>";
}
function set_all_hidden(){
    for(element in document.getElementsByClassName("mini_view_container")){
        element.display="none";
    }
}
function next_page(){
    if(curent_page<pages_number){
        set_all_hidden();
        curent_page++;
        elements=document.getElementsByClassName("mini_view_container");
        for(i=((curent_page-2)*items_number)%items_number;i<((curent_page-1)*items_number)%items_number;i++){
            elements[i].style.display="flex";
        }
        modify_front();
    }
}
function preview_page(){
    if(curent_page>1){
        set_all_hidden();
        curent_page--;
        elements=document.getElementsByClassName("mini_view_container");
        for(i=((curent_page-2)*items_number)%items_number;i<((curent_page-1)*items_number)%items_number;i++){
            elements[i].style.display="flex";
        }
        modify_front();
    }
}

