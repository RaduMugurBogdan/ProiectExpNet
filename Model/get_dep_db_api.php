<?php
    if(isset($_GET['brand']) && isset($_GET['model'])){
        $brand_name=$_GET['brand'];
        $model_name=$_GET['model'];
        $return_array=array(); 
        include './init_database.php';
        $conn=(new DataBaseInit())->get_db_conn();
        $query="SELECT MIN(an_fabricatie) as min_year ,MAX(an_fabricatie) as max_year,MIN(kilometri) as min_k,MAX(kilometri) as max_k,MIN(price) as min_price,MAX(price) as max_price FROM BRANDURI JOIN POSTARI ON BRANDURI.ID=POSTARI.ID_BRAND JOIN MODELE ON POSTARI.ID_MODEL=MODELE.ID WHERE LOWER(NUME_BRAND)=LOWER('${brand_name}') and LOWER(NUME_MODEL)=LOWER('${model_name}')";
        $stmt=$conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $return_array['min_year']=$result[0]['min_year'];
        $return_array['max_year']=$result[0]['max_year'];
        $return_array['min_k']=$result[0]['min_k'];
        $return_array['max_k']=$result[0]['max_k'];
        $return_array['min_price']=$result[0]['min_price'];
        $return_array['max_price']=$result[0]['max_price'];
        $return_array=json_encode($return_array);
        echo $return_array;
    }

?>