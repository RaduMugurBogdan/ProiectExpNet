<?php

class ViewPostController{
    private function init_data(){
        $post_id=$_GET['post_id'];
        
        //functia care extrage si depune in sesiune 
        //datele din baza de date referitoare la masina si proprietar,date care vor fi interpretate in View-ul product_page_view
        /*
            datele ce vor fi retinute in sesiune;
                numele complet al vehicului (brand + model)
                anume_fabricatiei;
        */
    }
    public function __costruct(){
        if(isset($_GET['CAR_ID'])){
            $this->init_data();
        }
    }
}


?>