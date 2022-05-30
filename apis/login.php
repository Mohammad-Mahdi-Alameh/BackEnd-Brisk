<?php

include("../Database/connection.php");

$username = $_POST["username"];

$password =  $_POST["password"];

$response = [];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) === 1) {

          $row = mysqli_fetch_assoc($result);

          $response["response"] = "Logged in";
         
           $response["response"]=$row;

           //$response["user_id"] = $row['user_id']; 
         // $response["is_admin"] = $row['is_admin']; 

        //  $_SESSION['id']=$id;
           
}

        else
        
            $response["response"] = "UserNotFound";
        
        $json = json_encode($response);
        echo $json;
?>