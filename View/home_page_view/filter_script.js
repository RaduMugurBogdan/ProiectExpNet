

function reset_filters(input_object){
    document.getElementById("brand_input_id").value="Alege";
    change_brand(document.getElementById("brand_input_id"));
    document.getElementById("model_input_id").value="Alege";
    change_model(document.getElementById("brand_input_id"));
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


function change_brand(input_object){
    if(input_object.value.trim()=="Alege"){
        document.getElementById("model_input_id").value="Alege";
        document.getElementById("model_input_id").disabled=true;
        set_access_to_fields("submit_button",true);
        set_access_to_fields("dep_field",true);
    }else{
        document.getElementById("model_input_id").disabled=false;
        set_access_to_fields("submit_button",false);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var my_object = JSON.parse(this.responseText);
            mod_object=document.getElementById('model_input_id');
            mod_object.innerHTML="<option>Alege</option>";
            for(i=0;i<my_object.length;i++){
                aux_cont="<option>"+my_object[0]['NUME_MODEL']+"</option>";
                mod_object.innerHTML=mod_object.innerHTML+aux_cont;
            }
        }
        };
        xmlhttp.open("GET", "../../Model/get_models_db_api.php?brand="+input_object.value.trim(), true);
        xmlhttp.send();
    }
}


function change_model(input_object){
    if(input_object.value.trim()=="Alege"){
        set_access_to_fields("dep_field",true);
    }else{
        set_access_to_fields("dep_field",false);
        brand_value=document.getElementById('brand_input_id').value.trim();
        model_value=input_object.value.trim();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var my_object = JSON.parse(this.responseText);

                
                document.getElementById('start_year').value=my_object['min_year'];
                document.getElementById("start_year").min=my_object['min_year'];
                document.getElementById('final_year').value=my_object['max_year'];
                document.getElementById("final_year").max=my_object['max_year'];

                document.getElementById("start_kil").value=my_object['min_k'];
                document.getElementById("start_kil").min=my_object['min_k'];
                document.getElementById("final_kil").value=my_object['max_k'];
                document.getElementById('final_kil').max=my_object['max_k'];

                document.getElementById('start_price').value=my_object['min_price'];
                document.getElementById('start_price').min=my_object['min_price'];
                document.getElementById('final_price').value=my_object['max_price'];
                document.getElementById('final_price').max=my_object['max_price'];
                
            }
        };
        xmlhttp.open("GET", "../../Model/get_dep_db_api.php?brand="+brand_value+"&model="+model_value, true);
        xmlhttp.send();
    }
}
