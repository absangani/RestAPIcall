<?php
// echo "1234";

class Login{
  
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
    public function __construct($db,$username,$password){
        $this->conn = $db;
        $this->username = $username;
        $this->password = $password;
        // echo("123455");
    }

    public function getdata(){
        $query = "SELECT * FROM `user_data`";
        $result = $this->conn->query($query);
        $row = $result -> fetch_assoc();
        return $row;
    }
}
?>