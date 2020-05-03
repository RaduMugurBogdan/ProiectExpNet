function prepare_default(){
    for(error_field in document.getElementsByClassName("error_container")){
        error_field.innerHTML="";
    }
    if(document.getElementById("brand_input").value.trim()=="Alege Brand"){
        for(input_field in document.getElementsByClassName("field_tag")){        
            input_field.disabled=true;
           
        }
        document.getElementById("brand_input").disabled=false;
    }
}


function del_errors(input_object,error_id,wrong_value){
    alert("dasdasda");
    if(input_object.value.trim()!=wrong_value){
        document.getElementById(error_id).innerHTML="";
    }
}

function set_empty_errors(){
   console.log(document.getElementsByClassName("error_container"));
    /*
    for(err in document.getElementsByClassName("error_container")){
        err.innerHTML="";
    }*/
}
function get_model(c_object){
    var brand_name=c_object.value;
    aux_cont=document.getElementsByClassName("field_tag");
    if(brand_name!="Alege Brand" && brand_name!=""){
        document.getElementById("model_container").disabled=false;
        var request = new XMLHttpRequest();
        var aux_container;
        request.open('GET', 'http://localhost/ProiectExpNet/Model/post_model.php?brand='.concat(brand_name), true);
        request.onload = function() {
            aux_container=JSON.parse(this.response);
            console.log(aux_container);
            var output_object=document.getElementById("model_container");
            output_object.innerHTML="<option selected>Alege Model</option>";
            aux_container.forEach(element => {
                output_object.innerHTML=output_object.innerHTML+"<option>"+element['NUME_MODEL']+"</option>";
            });
        }
        request.send();
        document.getElementById("model_container").disabled=false;
    }else{
        document.getElementById("model_container").innerHTML="";
        document.getElementById("model_container").disabled=true;
        for(i=0;i<aux_cont.length;i++){
            aux_cont[i].disabled=true;
        }
        c_object.disabled=false;
        set_empty_errors();
        
    }
}


function change_model(input_object){
    aux_cont=document.getElementsByClassName("field_tag");
    if(input_object.value.trim()!="Alege Model"){
        for(i=0;i<aux_cont.length;i++){
            aux_cont[i].disabled=false;
        }
    }else{
        for(i=0;i<aux_cont.length;i++){
            aux_cont[i].disabled=true;
        }
        document.getElementById("brand_input").disabled=false;
        document.getElementById("model_container").disabled=false;
        set_empty_errors();
    }
}

function check_fields_val(){
    if(document.getElementById("brand_input").value.trim()=="Alege Brand"){
        document.getElementById("brand_error").innerHTML="Brand neitrodus";
        return false;
    }else{
        document.getElementById("brand_error").innerHTML="";
        if(document.getElementById("model_container").value.trim()=="Alege Model"){
            document.getElementById("model_error").innerHTML="Model neitrodus";
            return false;
        }else{
            document.getElementById("model_error").innerHTML="";
            return_value=true;
            
            document.getElementById("price_error").innerHTML="";
            if(document.getElementById("price_input").value==""){
                document.getElementById("price_error").innerHTML="Pret inexistent";
                return_value=false;
            }

            document.getElementById("year_error").innerHTML="";
            if(document.getElementById("year_input").value==""){
                document.getElementById("year_error").innerHTML="An inexistent";
                return_value=false;
            }

            document.getElementById("carb_error").innerHTML="";
            if(document.getElementById("carb_input").value.trim()=="Alege Carburantul"){
                document.getElementById("carb_error").innerHTML="Tipul carburantului inexistent";
                return_value=false;
            }
            
            document.getElementById("kils_error").innerHTML="";
            if(document.getElementById("kils_input").value==""){
                document.getElementById("kils_error").innerHTML="Kilometri inexistenti";
                return_value=false;
            }

            document.getElementById("cil_cap_error").innerHTML="";
            if(document.getElementById("cil_cap_input").value==""){
                document.getElementById("cil_cap_error").innerHTML="Capacitatea cilindrica inexistenta";
                return_value=false;
            }

            document.getElementById("horse_p_error").innerHTML="";
            if(document.getElementById("horse_p_input").value==""){
                document.getElementById("horse_p_error").innerHTML="Putere inexistenta";
                return_value=false;
            }
            
            document.getElementById("pol_norm_error").innerHTML="";
            if(document.getElementById("pol_norm_input").value.trim()=="Alege Norma"){
                document.getElementById("pol_norm_error").innerHTML="Norma de poluare inexistenta";
                return_value=false;
            }

            document.getElementById("emiss_error").innerHTML="";
            if(document.getElementById("emiss_input").value.trim()==""){
                document.getElementById("emiss_error").innerHTML="Emisii inexistente";
                return_value=false;
            }

            document.getElementById("door_error").innerHTML="";
            if(document.getElementById("door_input").value.trim()==""){
                document.getElementById("door_error").innerHTML="Numar de portiere inexistente";
                return_value=false;
            }

            document.getElementById("color_error").innerHTML="";
            if(document.getElementById("color_input").value.trim()==""){
                document.getElementById("color_error").innerHTML="Culoare inexistenta";
                return_value=false;
            }
            document.getElementById("country_error").innerHTML="";
            if(document.getElementById("country_input").value.trim()==""){
                document.getElementById("country_error").innerHTML="Tara nementionata";
                return_value=false;
            }
        
            document.getElementById("pics_error").innerHTML="";
            if(document.getElementById("pics_input").value.trim()==""){
                document.getElementById("pics_error").innerHTML="Imagini inexistente";
                return_value=false;
            }
        
            return return_value;
        }
    }
}


function perform_request(input_object){
    
    if(check_fields_val()==true){
        document.getElementById("post_main_container").submit();
    }
}
