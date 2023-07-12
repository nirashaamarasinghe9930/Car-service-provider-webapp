<?php include_once 'include\header.php';
include_once 'include\validation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST Data 
    $service = $_POST['service'];
    $serviceCenter = $_POST['serviceCenter'];
    $city = $_POST['city'];
    $vehicleNumber = $_POST['vehicleNumber'];
    $vehicleModel = $_POST['vehicleModel'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            $path = "images/" . basename($_FILES["fileToUpload"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "INSERT INTO appointments (service_type, city_id, vehicle_number, vehicle_model, name, email, mobile, time, date, image_path, service_center_id) 
        VALUES ('$service', '$city', '$vehicleNumber', '$vehicleModel', '$name', '$email', '$mobile', '$time', '$date', '$path', '$serviceCenter')";

    if (mysqli_query($dbcon, $sql)) {
        header("Location:index.php");
    } else {
        echo "SQL Error";
    }
}



?>




<div class="content row d-flex justify-content-center my-5">

    <div class="col-4 shadow-lg p-3 rounded">

        <form class="row g-3" method="post" enctype="multipart/form-data">
            <div class="text-center">
                <div class="col-12">
                    <img src="images\logo2.png" style="width: 150px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">Appointment Form</h4>

                </div>
            </div>
            <div class="col-6">

                <label class="service col-lg-3 mb-2">Service</label>
                <select class="service form-control col-lg-6" name="service" required>
                    <option value="service">Service</option>
                    <option value="MechanicalRepair">Mechanical Repair</option>
                    <option value="BodyRepairs">Body Repairs</option>
                    <option value="WashOnly">Wash Only</option>
                    <option value="Lubricantonly">Lubricant Only</option>
                    <option value="CarCheckup">Car Checkup</option>
                    <option value="TowaBodyCoating">Towa Body Coating</option>
                </select>

            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Service Center</label>
                <select name="serviceCenter" class="form-select" required>
                    <?php
                    $sql = "SELECT * FROM service_centers";
                    $result = mysqli_query($dbcon, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php }
                    } ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <select name="city" class="form-select" required>
                    <?php
                    $sql = "SELECT * FROM cities";
                    $result = mysqli_query($dbcon, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['city']; ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="col-6">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form1Example3">Vehicle Number</label>
                    <input type="text" name="vehicleNumber" class="form-control" required />
                </div>
            </div>

            <div class="col-6">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form1Example4">Vehicle Model</label>
                    <input type="text" name="vehicleModel" class="form-control" required />
                </div>
            </div>
            <div class="col-6">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form1Example5">Name</label>
                    <input type="text" name="name" class="form-control" required />
                </div>
            </div>


            <div class="col-6">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form1Example6">Email</label>
                    <input type="email" name="email" class="form-control" required />

                </div>
            </div>

            <div class="col-6">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form1Example7">Mobile</label>
                    <input type="intiger" name="mobile" class="form-control" required />
                </div>
            </div>
            <div class="col-6">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form1Example8">Time</label>
                    <input type="Time" name="time" class="form-control" required />
                    <p> Please include the time after 9.00 a.m & Before 4.30 p.m</p>
                </div>
            </div>
            <div class="col-6">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form1Example9">Date</label>
                    <input type="date" name="date" class="form-control" required />

                </div>
            </div>

            <div class="col-12">
                <div class="form-outline mb-4">
                    <label for="file" class="form-label">Image</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-center pb-4">
                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Place your Appointment</button>
            </div>


        </form>
    </div>


    <?php include_once 'include\footer.php'; ?>