<?php

include 'init_database.php';

function get_post_info($post_id){    
    $conn=(new DatabaseInit())->get_db_conn();
    $query="SELECT * FROM POSTARI JOIN PICTURES ON POSTARI.ID=PICTURES.POST_ID JOIN BRANDURI ON BRANDURI.ID=POSTARI.ID_BRAND JOIN MODELE ON MODELE.ID=POSTARI.ID_MODEL JOIN ACCOUNTS ON ACCOUNTS.ID=POSTARI.ID_USER WHERE POSTARI.ID='${post_id}'";
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


?>  