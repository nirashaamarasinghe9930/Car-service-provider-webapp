<?php include_once 'include\header.php';
include_once 'include\validation.php'; ?>
<div class="container mb-4">
    <div class="row mt-2">
        <h3>My Profile</h3>
    </div>
    <div class="row">
        <?php
        if (isset($_SESSION['userid'])) {
            $userId = $_SESSION['userid'];
        } else {
            header('Location: index.php');
        }

        // SQL Query
        $sql = "SELECT c.id as customer_id, c.first_name, c.last_name, c.mobile, c.city, c.vehicle_id, u.email, u.created_date 
        FROM customers AS c INNER JOIN users AS u ON c.user_id = u.id WHERE u.id = '$userId'";
        $result = mysqli_query($dbcon, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


        ?>

        <div class="col-6 shadow m-2 p-4">
            <h5>Profile Information</h5>
            <hr>
            <!-- Profile Info starts -->
            <div class="profile-data">
                <div class="row">
                    <div class="col-3">
                        <h6>Email:</h6>
                    </div>
                    <div class="col">
                        <h6 class="font-weight-light"><?php echo $row['email'] ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6>First Name:</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row['first_name'] ?></h6>
                    </div>
                    <div class="col-3">
                        <h6>Last Name:</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row['last_name'] ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h6>Mobile:</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row['mobile'] ?></h6>
                    </div>
                    <div class="col-3">
                        <h6>City:</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="font-weight-light"><?php echo $row['city'] ?></h6>
                    </div>
                </div>

            </div>

            <div class="row justify-content-end mt-3">
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                        Change Password
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateUserModal">
                        Edit Profile
                    </button>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="updateUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form method="POST" action="updateuser.php">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $row['email'] ?>" disabled>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control form-control-sm" required name="fname" value="<?php echo $row['first_name'] ?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control form-control-sm" required name="lname" value="<?php echo $row['last_name'] ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="firstname">Mobile</label>
                                        <input type="text" class="form-control form-control-sm" name="mobile" value="<?php echo $row['mobile'] ?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="lastname">City</label>
                                        <input type="text" class="form-control form-control-sm" name="city" value="<?php echo $row['city'] ?>">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm mt-4">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="changePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form method="POST" action="changepassword.php">
                                <div class="form-group">
                                    <label for="ePassword">Current Password</label>
                                    <input type="password" class="form-control form-control-sm" name="ePassword">
                                </div>
                                <div class="form-group">
                                    <label for="nPassword">New Password</label>
                                    <input type="password" class="form-control form-control-sm" name="nPassword">
                                </div>
                                <div class="form-group">
                                    <label for="cPassword">Confirm New Password</label>
                                    <input type="password" class="form-control form-control-sm" name="cPassword">
                                </div>
                                <button type="submit" class="mt-4 btn btn-primary btn-sm">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include_once 'include\footer.php'; ?>