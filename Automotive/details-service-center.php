<?php include_once 'include\header.php'; ?>
<div class="col-6 shadow m-2 p-4">


<!--view the service centers profile -->
            <h5>Service Center Details</h5>
            <hr>
            <!-- Profile Info starts -->
            <div class="profile-data">
                <div class="row">
                    <div class="col-3">
                        <h6>Service Center Name:</h6>
                    </div>
                    <div class="col">
                        <h6 class="font-weight-light"><?php echo $row['name'] ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6>Details:</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row[''] ?></h6>
                    </div>
                    <div class="col-3">
                        <h6>Open time</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row[''] ?></h6>
                    </div>
                    <div class="col-3">
                        <h6>Closing time</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row[''] ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h6>Address:</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row[''] ?></h6>
                    </div>
                    <div class="col-3">
                        <h6>City:</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row[''] ?></h6>
                    </div>
                </div>
                <div class="col-3">
                        <h6>Contact Person:</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row[''] ?></h6>
                    </div>
                </div>

                <div class="col-3">
                        <h6>E-mail:</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row[''] ?></h6>
                    </div>
                </div>

            </div>








<?php include_once 'include\footer.php'; ?>