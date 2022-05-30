<?php

include("connection.php");


$query = $mysqli->prepare("SELECT * from users");

$query->execute();

$array = $query->get_result();

$response = [];

while($user = $array->fetch_assoc()){
    $response[] = $user;
}


echo json_encode($response);


?>