<?php
// echo "1234";

class Login{
  
    // database connection
    private $conn;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function getUserDetails($username){
        $query = "SELECT * FROM `user_data` WHERE `user_username` = '".$username."'";
        $result = $this->conn->query($query);
        $row = $result -> fetch_assoc();
        return $row;
    }
}
?>