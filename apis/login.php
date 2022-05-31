<?php

include("../Database/connection.php");

$username = $_POST["username"];

$password = hash("sha256", $_POST["password"]);

$query = $mysqli->prepare("Select user_id,is_admin from users where username = ? AND password = ?");

$query->bind_param("ss", $username, $password);

$query->execute();

$query->store_result();

$num_rows = $query->num_rows;

$query->bind_result($user_id,$is_admin);

$query->fetch();

$response = [];

if($num_rows == 0){

    $response["failed"] = "User not found";

}
else{

    $response["succeed"] = "User logged in successfuly";

    $response["user_id"] = $user_id;
    
    $response["is_admin"] = $is_admin;
}

$json = json_encode($response);

echo $json;
?>