<?php

include_once 'include\header.php';
include_once 'include\validation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST Data 
    $email = $_POST['email'];
    $comment = $_POST['comment'];

  // service centers ID
  $service_centersId = mysqli_insert_id($dbcon);
  
  // Insert feedback
    $feedbacksql = "INSERT INTO `feedback`(`email`, `comment`, `S_id`) VALUES ('$email','$comment','$service_centersId')";
   

    if (mysqli_query($dbcon, $feedbacksql)) {
        $_SESSION['service_centersId '] =  $service_centersId;
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
                    <h4 class="mt-1 mb-5 pb-1">Customer Feedback</h4>
                </div>

                <form method="POST">

                    <div class=" col-6 form-outline  mb-4">
                        <label for="inputservice_center" class="form-label text-right">Select Service Center</label>
                        <select id="name" class="form-select" required>
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
                    <div class=" col-6 form-outline mb-4">
                        <label class="form-label" for="form2exmp">Username</label>
                        <div class="col-12">
                            <input type="text" name="email" class="form-control" placeholder="email" required>
                        </div>
                    </div>

                    <div class=" col-6 form-outline mb-4">
                        <label class="form-label" for="form2exmp">Comment</label>
                        <div class="col-6">
                            <textarea id="comment" name="comment" class="form-control" placeholder="Write something.." style="width:200px" required></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-10 mb-3">
                            Star Ratings
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="star" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="star" id="inlineRadio2" value="2">
                                <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="star" id="inlineRadio1" value="3">
                                <label class="form-check-label" for="inlineRadio1">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="star" id="inlineRadio2" value="4">
                                <label class="form-check-label" for="inlineRadio2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="star" id="inlineRadio2" value="5">
                                <label class="form-check-label" for="inlineRadio2">5</label>
                            </div>
                        </div>


                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">submit</button><br>


                </form>
            </div>
    </div>
</div>

<?php include_once 'include\footer.php'; ?>