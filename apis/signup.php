<?php

include("../Database/connection.php");

$first_name = $_POST["first_name"];

$last_name = $_POST["last_name"];

$username = $_POST["username"];

$password =  $_POST["password"];

$dob = $_POST["dob"];

$country = $_POST["country"];

$city = $_POST["city"];

$phone = $_POST["phone"];

$gender = $_POST["gender"];

$is_admin = 0;



$query = $mysqli->prepare("INSERT INTO users (first_name,last_name,username,password,dob,country,city,phone,gender,is_admin)VALUES
(?,?,?,?,?,?,?,?,?,?)");
$query->bind_param("ssssssssss", $first_name, $last_name, $username, $password,$dob,$country,$city,$phone,$gender,$is_admin);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>