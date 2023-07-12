<?php

// Database Connection
$server = "localhost";
$username = "root";
$password = "";
$db = "automotive";
$dbcon = mysqli_connect($server, $username, $password, $db);

// POST Data 
$serviceCenterName = $_POST['serviceCenterName'];
$details = $_POST['details'];
$openTime = $_POST['openTime'];
$closeTime = $_POST['closeTime'];
$address = $_POST['address'];
$contactNo = $_POST['contactNo'];
$city = $_POST['city'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];

// Password Hashing
$hashpass = md5($password);


// Insert User
$sql = "INSERT INTO users (email, password, role) VALUES('$email', '$hashpass', 'service center')";
mysqli_query($dbcon, $sql);
$userId = mysqli_insert_id($dbcon);

// Insert Coordinates
$sql2 = "INSERT INTO coordinates (latitude, longitude) VALUES('$latitude', '$longitude')";
mysqli_query($dbcon, $sql2);
$coordinatesId = mysqli_insert_id($dbcon);


// Insert Service Center
$sql3 = "INSERT INTO service_centers (name, first_name, last_name, address, coordinates_id, contact_no, details, city_id, user_id, open_time, close_time)
        VALUES('$serviceCenterName', '$firstName', '$lastName', '$address', '$coordinatesId', '$contactNo', '$details', '$city', '$userId', '$openTime', '$closeTime')";

if(mysqli_query($dbcon, $sql3)){
    $status = "successfully added";
}

echo json_encode($status);
exit;
