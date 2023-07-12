<?php
include "include/db.php";
include "include/validation.php";

session_start();

$user = $_SESSION['userid'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = validation($_POST['fname']);
    $lastName = validation($_POST['lname']);
    $mobile = validation($_POST['mobile']);
    $city = validation($_POST['city']);


    $sql = "UPDATE customers SET first_name = '$firstName', last_name = '$lastName', mobile = '$mobile', 
    city = '$city' WHERE user_id = '$user'";

    if (mysqli_query($dbcon, $sql)) {
        echo '<script>location.replace("myaccount.php");</script>';
    }else{
        echo 'SQL Query Error';
    }
    
}else{
    echo 'Validation Error';
}
