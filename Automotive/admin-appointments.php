<?php
include_once 'include\db.php';
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Automotive</title>
    <link rel="icon" href="images/logo1.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

    <!-- Map JS -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/css/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <img src="images/logo1.png" width="100" alt="logo1">
                <li><a href="admin-dashboard.php" class="nav-link px-2 text-white">Admin Dashboard</a></li>
                <li><a href="admin-service-centers.php" class="nav-link px-2 text-white">Service Centers</a></li>
                <li><a href="admin-appointments.php" class="nav-link px-2 text-white">Appointments</a></li>
                <li><a href="admin-users.php" class="nav-link px-2 text-white">Users</a></li>
                
            </ul>


</header>


<div class="container my-5" style="min-height: 400px">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Service Type</th>
                <th scope="col">Service center</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">City</th>
                <th scope="col">Vehicle Number</th>
                <th scope="col">Model</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">mobile</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT appointments.*, service_centers.name as service_center, cities.city FROM appointments 
            INNER JOIN service_centers ON service_centers.id = appointments.service_center_id
            INNER JOIN cities ON cities.id = appointments.city_id";
            $result = mysqli_query($dbcon, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['service_type']; ?></td>
                        <td><?php echo $row['service_center']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['vehicle_number']; ?></td>
                        <td><?php echo $row['vehicle_model']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</div>


<footer class="align-self-center">
    <div class="container-fluid bg-black py-4">
        <img src="images/logo1.png" class="rounded mx-auto d-block" width="200" alt="logo1">
    </div>

    <div class="footer text-center">
        <p class="bg-light pt-4">
            © 2022. All Rights Reserved | Designed & Developed by <span class="text-danger font-weight-light">Kalani Nirasha</span>
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>