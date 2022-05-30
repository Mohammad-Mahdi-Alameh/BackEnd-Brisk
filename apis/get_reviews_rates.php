<?php

include("connection.php");


$query = $mysqli->prepare("SELECT * from reviews_rates");

$query->execute();

$array = $query->get_result();

$response = [];

while($review_rate = $array->fetch_assoc()){
    $response[] = $review_rate;
}


echo json_encode($response);


?>