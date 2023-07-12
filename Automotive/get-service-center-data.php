<?php

include_once 'include\db.php';

$cityId = $_GET['cityId'];

$query = "SELECT sc.id as service_center_id, sc.name, sc.address, sc.contact_no, c.latitude, c.longitude 
FROM service_centers sc INNER JOIN coordinates c ON sc.coordinates_id = c.id WHERE sc.city_id = '$cityId'";
$result = mysqli_query($dbcon, $query);
$row = mysqli_fetch_assoc($result);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $t = [];
    $t['serviceCenterId'] = $row['service_center_id'];
    $t['serviceCenterName'] = $row['name'];
    $t['address'] = $row['address'];
    $t['contactNo'] = $row['contact_no'];
    $t['latitude'] = $row['latitude'];
    $t['longitude'] = $row['longitude'];
    $data[] = $t;
}

echo json_encode($data);

