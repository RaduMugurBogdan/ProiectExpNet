<?php

class DatabaseInit{
    private $conn=null;
    private function init_database_conn(){
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=proiect_exp_network', 'root', '');
        }catch(Exception $e){
            echo 'problema la initializarea conexiunii cu baza de date';
            $this->conn=null;
        }
    }
    public function get_db_conn(){
        return $this->conn;
    }
    public function get_brand_id($brand_name){
        $query="SELECT ID FROM BRANDURI WHERE NUME_BRAND='${brand_name}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['ID'];
    }
    public function get_model_id($model_name){
        $query="SELECT ID FROM MODELE WHERE NUME_MODEL='${model_name}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['ID'];
    }
    public function get_all_valid_brands(){
        $query="SELECT DISTINCT NUME_BRAND FROM BRANDURI JOIN POSTARI ON BRANDURI.ID=POSTARI.ID_BRAND";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function get_all_valid_models($brand_name){
        $query="SELECT DISTINCT NUME_MODEL FROM BRANDURI JOIN POSTARI ON BRANDURI.ID=POSTARI.ID_BRAND JOIN MODELE ON POSTARI.ID_MODEL=MODELE.ID WHERE LOWER(NUME_BRAND)=LOWER('${brand_name}')";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function load_brand_names(){
        if($this->conn==null){
            return;
        }
        $last_name=null;
        $rec_id=0;
        $sec_rec_id=0;
        $piv_rec_id=0;
        ini_set('auto_detect_line_endings',TRUE);
        $handle = fopen('./csv.csv','r');
        while (($data = fgetcsv($handle) )!== FALSE) {
            $aux_container=explode(';',$data[0]);
            if(count($aux_container)!=4){
                continue;
            }
            if($last_name!=$aux_container[0]){
                $last_name=$aux_container[0];    
                $rec_id=$rec_id+1;
                $sql_qerry="INSERT INTO BRANDURI (id,nume_brand) VALUES ({$rec_id}, '{$aux_container[0]}')";
                $stmt=$this->conn->prepare($sql_qerry);
                $stmt->execute();
            }
            $sec_rec_id=$sec_rec_id+1;
            if($aux_container[3]=="-"){
                $aux_container[3]=$aux_container[2];
            }
            $sql_qerry="INSERT INTO MODELE (id,nume_model,fst_year,last_year) VALUES ({$sec_rec_id}, '{$aux_container[1]}',{$aux_container[2]},{$aux_container[3]})";
            $stmt=$this->conn->prepare($sql_qerry);
            $stmt->execute();
            $piv_rec_id=$piv_rec_id+1;
            $sql_qerry="INSERT INTO BRAND_MODEL_PIVOT (id,id_brand,id_model) VALUES ({$piv_rec_id},{$rec_id},{$sec_rec_id})";
            $stmt=$this->conn->prepare($sql_qerry);
            $stmt->execute();
        }
        ini_set('auto_detect_line_endings',FALSE);

    }

    public function __construct(){
        $this->init_database_conn();
    }
}

?>