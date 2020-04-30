<?php
session_start();
unset($_SESSION['brand']);
unset($_SESSION['model']);
unset($_SESSION['min_year']);
unset($_SESSION['max_year']);
unset($_SESSION['min_kil']);
unset($_SESSION['max_kil']);
unset($_SESSION['min_price']);
unset($_SESSION['max_price']);
unset($_SESSION['comb']);

include './init_database.php';
$conn=(new DataBaseInit())->get_db_conn();
$query=null;
if(isset($_POST['model']) && trim($_POST['model'])=="Alege"){
    $brand_name=$_POST['brand'];
    $query="SELECT DISTINCT POSTARI.ID FROM BRANDURI JOIN POSTARI ON BRANDURI.ID=POSTARI.ID_BRAND JOIN MODELE ON POSTARI.ID_MODEL=MODELE.ID WHERE LOWER(NUME_BRAND)=LOWER('${brand_name}')";
    $_SESSION['brand']=$brand_name;
}else{
    $brand_name=$_POST['brand'];
    $model_name=$_POST['model'];
    $min_year=$_POST['start_year'];
    $max_year=$_POST['final_year'];
    $min_kil=$_POST['start_kil'];
    $max_kil=$_POST['final_kil'];
    $min_price=$_POST['start_price'];
    $max_price=$_POST['final_price'];
    
    $_SESSION['brand']=$brand_name;
    $_SESSION['model']=$model_name;
    $_SESSION['min_year']=$min_year;
    $_SESSION['max_year']=$max_year;
    $_SESSION['min_kil']=$min_kil;
    $_SESSION['max_kil']=$max_kil;
    $_SESSION['min_price']=$min_price;
    $_SESSION['max_price']=$max_price;
    $_SESSION['comb']=$_POST['comb'];
    $comb_list="()";
    if(isset($_POST['comb'])){
        $comb_list="(";
        for($i=0;$i<count($_POST['comb']);$i++){
            $comb_list=$comb_list.strtoupper($_POST['comb'][$i]);
            if($i<count($_POST['comb'])-1){
                $comb_list=$comb_list.",";
            }
        }
        $comb_list.=")";
    }
    $query="SELECT DISTINCT POSTARI.ID FROM BRANDURI JOIN POSTARI ON BRANDURI.ID=POSTARI.ID_BRAND JOIN MODELE ON POSTARI.ID_MODEL=MODELE.ID WHERE UPPER(NUME_BRAND)=UPPER('${brand_name}')
            AND PRICE>='${min_price}' AND PRICE<='${max_price}'
            AND AN_FABRICATIE>='${min_year}' AND AN_FABRICATIE<='${max_year}'
            AND KILOMETRI>='${min_kil}' AND KILOMETRI<='${max_kil}'
            AND STRTOUPPER(CARBURANT) IN ${comb_list}";
}
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->fetchAll();
header("Location:../View/home_page_view/home_page.php");
?>