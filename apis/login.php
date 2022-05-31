<?php

include("../Database/connection.php");

$username = $_POST["username"];

$password = hash("sha256", $_POST["password"]);

$query = $mysqli->prepare("Select user_id from users where username = ? AND password = ?");

$query->bind_param("ss", $username, $password);

$query->execute();

$query->store_result();

$num_rows = $query->num_rows;

$query->bind_result($id);

$query->fetch();

$response = [];

if($num_rows == 0){

    $response["response"] = "User not found";

}
else{

    $response["response"] = "User logged in successfuly";

    $response["user_id"] = $id;

}

$json = json_encode($response);

echo $json;
?>