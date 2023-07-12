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

        <li><a type="button" class="btn btn-outline-light me-2" href="admin-dashboard.php">Admin Dashboard</a></li>
        <li><a type="button" class="btn btn-outline-light me-2" href="admin-service-centers.php">Service Centers</a></li>
        <li><a type="button" class="btn btn-outline-light me-2" href="admin-appointments.php">Appointments</a></li>
        <li><a type="button" class="btn btn-outline-light me-2" href="admin-users.php">Users</a></li>
        <li><a type="button" class="btn btn-outline-light me-2" href="index.php">Automotive</a></li>
      </ul>


</header>

<video cotrols width="1350" hight="800" service-center="" autoplay="" id="myVideo" loop="" muted="" oncanplay="this.play()" onloadedmetadata="this.muted = true" preload="auto">
  <source service-center="" src="images\video3.mp4" type="video/mp4">
</video>
<?php include_once 'include\footer.php'; ?>