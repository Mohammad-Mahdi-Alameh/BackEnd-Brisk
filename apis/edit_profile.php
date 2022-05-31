<?php

include("../Database/connection.php");



$username = $_POST["username"];

$password = hash("sha256", $_POST["password"]);

$phone = $_POST["phone"];

$update_username_query = $mysqli->prepare("UPDATE users SET username=? WHERE $_COOKIE[$user_id]");

$update_password_query = $mysqli->prepare("UPDATE users SET password=? WHERE");

$update_phone_query = $mysqli->prepare("UPDATE users SET phone=? WHERE");

$update_username_quer->bind_param("s", $username);

$update_password_quer->bind_param("s", $password);

$update_phone_quer->bind_param("s", $phone);

$update_username_quer->execute();

$update_username_quer->execute();

$update_username_quer->execute();

$get_id_query->execute();

$get_id_query->store_result();

$get_id_query->bind_result($id);

$get_id_query->fetch();

$response = [];

$response["success"] = true;

echo json_encode($response);

?>