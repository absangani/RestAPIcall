<?php

include "db/connect.php";
$datbase = new Database();
$db = $datbase->getConnection();

class Registration{

    public function __construct($db){
       $this->conn = $db;
    }

    public function registreUser($name,$username,$password,$phone,$gender){
        $query = "INSERT INTO `user_data` (`user_id`, `user_name`, `user_username`, `user_password`, `user_phone`, `user_gender`) 
        VALUES (NULL, '".$name."', '".$username."', '".$password."', '".$phone."', '".$gender."');";
        return $this->conn->query($query);

    }
}

class RegistreDataValidation{
    public function validateData(){
        if(isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["phone"]) && isset($_POST["gender"])){
            if($_POST["name"] == ""){
                return json_encode(array(
                    "message"=>"please enter your name",
                    "status"=>0
                ));
            }
            if($_POST["username"] == ""){
                return json_encode(array(
                    "message"=>"please enter your username",
                    "status"=>0
                ));
            } 
            if($_POST["password"] == ""){
                return json_encode(array(
                    "message"=>"password should not null",
                    "status"=>0
                ));
            } 
            if($_POST["phone"] == ""){
                return json_encode(array(
                    "message"=>"please enter your phone number",
                    "status"=>0
                ));
            } 
            if($_POST["gender"] == ""){
                return json_encode(array(
                    "message"=>"please select your gender",
                    "status"=>0
                ));
            }
            return 1;
        }else{
            return json_encode(array(
                "message"=>"Data not found",
                "status"=>0
            ));
        }
    }
}


$dataValidation = new RegistreDataValidation();
$isValidate = $dataValidation->validateData();
if($isValidate === 1){
    $registration = new Registration($db);
    $result = $registration->registreUser($_POST["name"],$_POST["username"],$_POST["password"],$_POST["phone"],$_POST["gender"]);
    if($result){
        echo json_encode(array(
            "message"=>"Registration successfully",
            "status"=>1
        ));
    }
}else{
    echo $isValidate;
}

?>