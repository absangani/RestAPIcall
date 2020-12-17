<?php
include "db/connect.php";
include "Login.php";
include "validation.php";
$datbase = new Database();
$db = $datbase->getConnection();

if(isset($_POST["username"]) && isset($_POST["password"])){
    if($_POST["username"] != "" && $_POST["password"] != ""){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $validation = new Validation($db);
        $loginValidation = $validation->loginDataValidation($username,$password);
        if($loginValidation){
            $login = new Login($db);
            $userDetails = $login->getUserDetails($username);
            $message_array = array(
                "message"=>"Login successfully",
                "status"=>0
            );

            echo json_encode(array_merge($userDetails,$message_array));
        }else{
            $message_array = array(
                "message" => "Username or Password not valid",
                "status"=>1
            );
            echo json_encode(array($message_array));
        }
    }else{
        echo json_encode(array(
            "message"=>"please enter username",
            "status"=>1
        ));
    }
}else{
    echo json_encode(array(
        "message"=>"username not find",
        "status"=>1
    ));
}


?>