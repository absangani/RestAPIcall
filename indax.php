<?php
include "db/connect.php";
include "Login.php";
include "validation.php";
$datbase = new Database();
$db = $datbase->getConnection();

if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $validation = new Validation($db);
    $validation->loginDataValidation($username,$password);
    // $login = new Login($db,$username,$password);
    // $row = $login->getdata();
    // // print_r($row);
    // echo json_encode($row);
    // echo json_encode(array("message"=>"username find"));
}else{
    echo json_encode(array("message"=>"username not find"));
}


?>