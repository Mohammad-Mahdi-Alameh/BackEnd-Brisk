<?php

include("../Database/connection.php");

$trade_name = $_POST["trade_name"];

$working_hours = $_POST["working_hours"];

$dining_room_capacity = $_POST["dining_room_capacity"];

$drivethrough_availabilty = $_POST["drivethrough_availabilty"];

$delivery_availabilty = $_POST["delivery_availabilty"];

$reservation_availabilty = $_POST["reservation_availabilty"];

$support_all_diets = $_POST["support_all_diets"];

$address = $_POST["address"];

$phone = $_POST["phone"];

$query = $mysqli->prepare("INSERT INTO restaurants(trade_name, working_hours ,dining_room_capacity, drivethrough_availabilty, delivery_availabilty,reservation_availabilty,support_all_diets,address,phone) VALUES (?, ?, ?, ?,?,?,?,?,?)");

$query->bind_param("ssiiiiiss", $trade_name, $working_hours, $dining_room_capacity, $drivethrough_availabilty,$delivery_availabilty,

$reservation_availabilty,$support_all_diets,$address,$phone);

$query->execute();

$response = [];

$response["success"] = true;

echo json_encode($response);

?>