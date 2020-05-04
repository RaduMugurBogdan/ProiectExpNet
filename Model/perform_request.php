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
if(isset($_POST['brand']) && trim($_POST['brand'])!="Alege"){    
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
    
    $model_name_var="";
    if(trim($model_name)!='Alege'){
        $model_name_var=" AND UPPER(NUME_MODEL)=UPPER('${model_name}') ";
    }
    
    $comb_list="";
    if(isset($_POST['comb'])){ 
        $_SESSION['comb']=$_POST['comb'];
        if(strtoupper($_POST['comb'][count($_POST['comb'])-1])!="TOATE"){
            $comb_list=" AND UPPER(CARBURANT) IN (";
            for($i=0;$i<count($_POST['comb']);$i++){
                $comb_list=$comb_list.strtoupper("'".$_POST['comb'][$i]."'");
                if($i<count($_POST['comb'])-1){
                    $comb_list=$comb_list.",";
                }
            }
            $comb_list.=")";
        }
    }
    $query="SELECT DISTINCT * FROM BRANDURI JOIN POSTARI ON BRANDURI.ID=POSTARI.ID_BRAND JOIN MODELE ON POSTARI.ID_MODEL=MODELE.ID WHERE
            UPPER(NUME_BRAND)=UPPER('${brand_name}')
            ${model_name_var} AND PRICE>='${min_price}' AND PRICE<='${max_price}'
            AND AN_FABRICATIE>='${min_year}' AND AN_FABRICATIE<='${max_year}'
            AND KILOMETRI>='${min_kil}' AND KILOMETRI<='${max_kil}'
             ${comb_list}";
}/*
echo "<pre>";
print_r($_SESSION);

echo $query;
die();
*/


$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->fetchAll();
$_SESSION['result']=$result;
header("Location:../View/home_page_view/home_page.php");
?>