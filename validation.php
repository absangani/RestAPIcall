<?php

class Validation{
    public function __construct($db){
        $this->conn = $db;

    }

    public function loginDataValidation($username,$password){
        $query = "SELECT * FROM `user_data` WHERE `user_username` = ".$username." AND `user_password` = ".$password."";
        $result = $this->conn->query($query);
        $rowCount = $result->rowCount();
        echo $rowCount;
        // $row = $result->fetch_assoc($result);

    }
}
?>