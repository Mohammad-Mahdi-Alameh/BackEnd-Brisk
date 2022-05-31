<?php

include("../Database/connection.php");

$first_name = $_POST["first_name"];

$last_name = $_POST["last_name"];

$username = $_POST["username"];

$password = hash("sha256", $_POST["password"]);

$dob = $_POST["dob"];

$country = $_POST["country"];

$city = $_POST["city"];

$phone = $_POST["phone"];

$gender = $_POST["gender"];

$is_admin = 0;



$insert_query = $mysqli->prepare("INSERT INTO users (first_name,last_name,username,password,dob,country,city,phone,gender,is_admin)VALUES
(?,?,?,?,?,?,?,?,?,?)");

$get_id_query= $mysqli->prepare("SELECT LAST_INSERT_ID()");

$insert_query->bind_param("ssssssssss", $first_name, $last_name, $username, $password,$dob,$country,$city,$phone,$gender,$is_admin);

$insert_query->execute();

$get_id_query->execute();

$get_id_query->store_result();

$get_id_query->bind_result($id);

$get_id_query->fetch();

$response = [];

$response["success"] = true;

$response["user_id"]=$id;

$response["is_admin"]=0;

echo json_encode($response);

?>