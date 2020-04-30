<?php
    if(isset($_GET['brand'])){
        $brand_name=$_GET['brand'];
        include './init_database.php';
        $conn=(new DataBaseInit())->get_db_conn();
        $query="SELECT DISTINCT NUME_MODEL FROM BRANDURI JOIN POSTARI ON BRANDURI.ID=POSTARI.ID_BRAND JOIN MODELE ON POSTARI.ID_MODEL=MODELE.ID WHERE LOWER(NUME_BRAND)=LOWER('${brand_name}')";
        $stmt=$conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll();
        $result=json_encode($result);
        echo $result;
        exit;
    }else{
        //redirect to search page
    }

?>