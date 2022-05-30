<?php

include("../Database/connection.php");

$review_text = $_POST["review_text"];

$rating_value = $_POST["rating_value"];

$is_approved = $_POST["is_approved"];

$users_id = $_POST["users_id"];

$restaurants_restaurant_id =  $_POST["restaurants_restaurant_id"];


$query = $mysqli->prepare("INSERT INTO reviews_rates (review_text,rating_value,is_approved,users_id,restaurants_restaurant_id)VALUES
(?,?,?,?,?)");
$query->bind_param("siiii", $review_text, $rating_value,$is_approved,$users_id, $restaurants_restaurant_id);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>