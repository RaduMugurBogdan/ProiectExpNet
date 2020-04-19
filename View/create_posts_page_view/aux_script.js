function get_model(c_object){
    var brand_name=c_object.value;
    if(brand_name!="Alege Brand"){
        document.getElementById("model_container").disabled=false;
        var request = new XMLHttpRequest();
        var aux_container;
        request.open('GET', 'http://localhost/ProiectExpNet/Model/post_model.php?brand='.concat(brand_name), true);
        request.onload = function() {
            aux_container=JSON.parse(this.response);
            console.log(aux_container);
            var output_object=document.getElementById("model_container");
            output_object.innerHTML="";
            aux_container.forEach(element => {
                output_object.innerHTML=output_object.innerHTML+"<option>"+element['NUME_MODEL']+"</option>";
            });
        }
        request.send();
    }else{
        document.getElementById("model_container").innerHTML="";
        document.getElementById("model_container").disabled=true;
    }
}
