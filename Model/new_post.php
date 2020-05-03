<?php
session_start();
include './init_database.php';
$_SESSION['user_id']=12;

if(isset($_SESSION['user_id']) && isset($_POST['brand_name']) && isset($_POST['model_name']) && isset($_POST['price_value']) && isset($_POST['man_year']) && isset($_POST['fuel_type']) && isset($_POST['kils']) && isset($_POST['cil_cap']) && isset($_POST['horse_p'])  && isset($_POST['pol_norm'])  && isset($_POST['emissions']) && isset($_POST['doors_n']) && isset($_POST['color']) && isset($_POST['country']) && isset($_FILES['pictures']) && isset($_POST['ad_details']) ){
    $brand_name=$_POST['brand_name'];
    $model_name=$_POST['model_name'];
    $price_value=$_POST['price_value'];
    $man_year=$_POST['man_year'];
    $fuel_type=$_POST['fuel_type'];
    $kil=$_POST['kils'];
    $cil_cap=$_POST['cil_cap'];
    $horse_p=$_POST['horse_p'];
    $pol_norm=$_POST['pol_norm'];
    $emissions=$_POST['emissions'];
    $doors_n=$_POST['doors_n'];
    $color=$_POST['color'];
    $country=$_POST['country'];
    $pictures_set=$_FILES['pictures'];
    $ad_details=$_POST['ad_details'];
    $user_id=$_SESSION['user_id'];
    $conn=(new DatabaseInit())->get_db_conn();
    $query="SELECT MAX(ID) max_id FROM POSTARI";
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $post_id=$result[0]['max_id']+1;
    $conn=new DatabaseInit();
    $brand_id=$conn->get_brand_id($brand_name);
    $model_id=$conn->get_model_id($model_name);
    $query="INSERT INTO POSTARI (id,id_brand,id_model,id_user,price,an_fabricatie,carburant,kilometri,cap_cilindrica,putere_cp,norma_poluare,emisii,numar_portiere,culoare_car,tara_orig,detalii)
                         VALUES ('${post_id}','${brand_id}','${model_id}','${user_id}','${price_value}','${man_year}','${fuel_type}','${kil}','${cil_cap}','${horse_p}','${pol_norm}','${emissions}','${doors_n}','${color}','${country}','${ad_details}')";
    $stmt=$conn->get_db_conn()->prepare($query);
    $stmt->execute();
    /***************************************************************************/

    $query="SELECT MAX(ID) max_id FROM pictures";
    $stmt=$conn->get_db_conn()->prepare($query);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $picture_id=$result[0]['max_id']+1;

    $pictures_target_path="../tmp_picture/";
    $image_ext_array=array("JPG","JPEG","PNG","GIF","WEBP","TIFF","PSD","RAW","BMP","HEIF","INDD");
    $conn=$conn->get_db_conn();
    for($i=0;$i<count($_FILES['pictures']['name']);$i++){
        $ex_name=explode('.',$_FILES['pictures']['name'][$i]);
        if(in_array(strtoupper(end($ex_name)),$image_ext_array)){    
            $picture_content=addslashes(file_get_contents($_FILES['pictures']['tmp_name'][$i]));
            $query="INSERT INTO PICTURES (ID,POST_ID,PICTURE) VALUES ('${picture_id}','${post_id}','${picture_content}')";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $picture_id++;
        }
    }

}
 
?>