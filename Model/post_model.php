<?php

 
include __DIR__.'/init_database.php';

class PostModelClass{
    private $conn=null;
    public function __construct(){
        $this->conn=(new DatabaseInit())->get_db_conn();
    }
    public function insert_post($id_brand,$id_model,$an_fab,$kilom,$cap_cil,$cp,$norma_p,$emisii,$numar_portiere,$culoare_car,$tara_orig,$detalii,$pictures_list){
        
    }
    public function get_brands(){
        $sql_querry="SELECT NUME_BRAND FROM BRANDURI";
        $stmt=$this->conn->prepare($sql_querry);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function show_brands(){
        $brands=$this->get_brands();
        $ret_string="<option>Alege Brand</option>";
        foreach($brands as $value){
            $ret_string=$ret_string."<option>".$value['NUME_BRAND']."</option>";
        }
        echo $ret_string;
    }
    public function get_model($brand_name){
        $sql_querry="SELECT NUME_MODEL FROM BRANDURI JOIN BRAND_MODEL_PIVOT ON BRANDURI.ID=BRAND_MODEL_PIVOT.ID_BRAND JOIN MODELE ON MODELE.ID=BRAND_MODEL_PIVOT.ID_MODEL WHERE UPPER(TRIM(NUME_BRAND))=UPPER(TRIM('{$brand_name}'))";
        $stmt=$this->conn->prepare($sql_querry);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }
}

if(isset($_GET['brand'])){
    $TestVar = new PostModelClass();
    header('Content-Type: application/json');
    echo $TestVar->get_model($_GET['brand']);
}


?>