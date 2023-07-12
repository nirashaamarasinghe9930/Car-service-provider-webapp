<?php
// Database Connection
$server = "localhost";
$username = "root";
$password = "";
$db = "automotive";
$dbcon = mysqli_connect($server, $username, $password, $db);


$cityId = $_GET['cityId'];

$query = "SELECT * FROM cities WHERE id = '$cityId'";
$result = mysqli_query($dbcon, $query);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);
exit;