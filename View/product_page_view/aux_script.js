var curent_image=0;
function default_style(){
    elements=document.getElementsByClassName("car_picture");
    if(elements.length>0){
        elements[0].style.display="inline";
        document.getElementById('picture_counter').innerHTML="1/"+elements.length;
    }
    modify_picture_counter();
}
default_style();

function modify_picture_counter(){
    document.getElementById("picture_counter").innerHTML=curent_image+1+"/"+document.getElementsByClassName("car_picture").length;
}

function next_picture(){
    elements=document.getElementsByClassName("car_picture");
    elements[curent_image].style.display="none";
    if(elements.length>0){
        curent_image=(curent_image+1)%elements.length;
        elements[curent_image].style.display="inline";   
    }
    modify_picture_counter();
}


function preview_picture(){
    elements=document.getElementsByClassName("car_picture");
    elements[curent_image].style.display="none";
    if(curent_image==0){
        curent_image=elements.length-1;
    }else{
        curent_image--;
    }
    elements[curent_image].style.display="inline";
    modify_picture_counter();
}