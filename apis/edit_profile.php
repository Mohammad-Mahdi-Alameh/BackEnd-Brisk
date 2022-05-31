<?php

include("../Database/connection.php");

$username = $_POST["username"];

$password = hash("sha256", $_POST["password"]);

$phone = $_POST["phone"];

$user_id="user_id";

$update_username_query = $mysqli->prepare("UPDATE users SET username='$username' WHERE user_id=$_COOKIE[$user_id]");

$update_password_query = $mysqli->prepare("UPDATE users SET password='$password' WHERE user_id=$_COOKIE[$user_id]");

$update_phone_query = $mysqli->prepare("UPDATE users SET phone='$phone' WHERE user_id=$_COOKIE[$user_id]");

// $update_username_query->bind_param("s", $username);

// $update_password_query->bind_param("s", $password);

// $update_phone_query->bind_param("s", $phone);

$update_username_query->execute();

$update_password_query->execute();

$update_phone_query->execute();

$response = [];

$response["success"] = true;

echo json_encode($response);

?>