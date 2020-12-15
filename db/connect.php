<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "RestApiCall";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new mysqli($this->host,$this->username,$this->password,$this->db_name);
            // echo ("connection");
        }catch(Exception $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>