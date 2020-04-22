<?php
class AccountModel{
    private $conn=null;
    private function conn_db(){
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=proiect_exp_network', 'root', '');
        }catch(Exception $e){
            echo 'problema la initializarea conexiunii cu baza de date';
            $this->conn=null;
        }
    }
    public function check_for_email($email){
           $sql_query="SELECT * FROM  ACCOUNTS WHERE EMAIL='{$email}'";
            $result=null;
            $stmt=$this->conn->prepare($sql_query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);       
            if(empty($result)){
                return true;
            }
            return false;
    }
    public function create_account($email,$password,$last_name,$first_name,$address_details,$phone_number){
        if($this->conn!=null){
            $sql_query="SELECT * FROM  ACCOUNTS WHERE EMAIL='{$email}'";
            $result=null;
            $stmt=$this->conn->prepare($sql_query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);       
            if(empty($result)){
                $password=md5($password);
                $sql_query="INSERT INTO ACCOUNTS VALUES(null,'{$email}','{$password}','{$first_name}','{$last_name}','{$phone_number}','{$address_details}')";
                $result=$this->conn->prepare($sql_query)->execute();
                return true;
            }else{
                $_SESSION['email_already_used']=true;
                return false;
            }
        }else{
            return false;
        }
    }
    public function perform_login($email,$password){
        if($this->conn!=null){
            $sql_query="SELECT * FROM  ACCOUNTS WHERE EMAIL='{$email}'";
            $result=null;
            $stmt=$this->conn->prepare($sql_query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result[0]['password']==md5($password)){
                return $result;
            }   
            return null;
        }else{
            return false;
        }   
    }
    public function __construct(){
        $this->conn_db();
    }


}

$acc_object=new AccountModel();
?>