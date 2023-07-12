<?php
include_once 'include\header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST Data 
    $title = $_POST['title'];
    $description = $_POST['description'];
    $contactNo = $_POST['contactNo'];
    $city = $_POST['city'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

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

    $sql = "INSERT INTO advertisements (title, description, first_name, last_name, email, contact_no, city_id, image_path) 
        VALUES ('$title', '$description', '$firstName', '$lastName', '$email', '$contactNo', '$city', '$path')";

    if (mysqli_query($dbcon, $sql)) {
        header("Location:index.php");
    } else {
        echo "SQL Error";
    }
}

?>


<div class="content row d-flex justify-content-center my-5">
    <div class="col-6 shadow-lg p-5 rounded">
        <h3 class="mb-2">New Advertisement</h3>
        <hr>

        <form class="row g-3" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Advertisment Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="6"></textarea>
            </div>

            <h5>Contact Person Details</h5>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstName" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastName" required>
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Contact No</label>
                <input type="text" class="form-control" name="contactNo" required>
            </div>
            <div class="col-md-4">
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

            <div class="col-4">
                <label for="file" class="form-label">Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>

            <div class="col-12">
                <button type="submit" id="create" name="submit" class="btn btn-primary">Create</button>
            </div>
        </form>

    </div>
</div>

<?php include_once 'include\footer.php'; ?>