<?php
include "db/connect.php";
echo "1234";
// $datbase = new Database();
// $db = $datbase->getConnection();

class Login extends Database{
  
    // database connection and table name
    private $conn;
    private $table_name = "products";
  
    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
        echo("123455");
    }
}
?>