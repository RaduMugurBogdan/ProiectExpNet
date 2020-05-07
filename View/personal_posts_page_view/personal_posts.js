
function delete_favorite(input_object,user_id,post_id){
    var closest_parrent=input_object.closest(".post_container");
    closest_parrent.style.display="none";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "http://localhost/ProiectExpNet/Model/favorite_model.php?option=delete&post_id="+post_id+"&user_id="+user_id, true);
    xmlhttp.send();
}


function delete_post(input_object,post_id){
    var closest_parrent=input_object.closest(".post_container");
    closest_parrent.style.display="none";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","http://localhost/ProiectExpNet/Model/personal_posts_model.php?content=delete_post&post_id="+post_id, true);
    xmlhttp.send();
}