<?php
include_once 'include\header.php';
include_once 'include\validation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Form Data
    $email = validation($_POST['email']);
    $firstName = validation($_POST['firstName']);
    $lastName = validation($_POST['lastName']);
    $password = validation($_POST['password']);

    // Password Hashing
    $hashPass = md5($password);

    // Insert user SQL Query
    $sql = "INSERT INTO users (email, password) VALUES('$email', '$hashPass')";
    mysqli_query($dbcon, $sql);

    // User ID
    $userId = mysqli_insert_id($dbcon);

    // Check If user data inserted successfully
    if ($userId != NULL) {
        // Insert customer SQL Query
        $customerSQL = "INSERT INTO customers (first_name, last_name, user_id) VALUES('$firstName', '$lastName', $userId)";
        
        if (mysqli_query($dbcon, $customerSQL)) {
            $_SESSION['userid'] = $userId;
            $_SESSION['role'] = "customer";
            header("Location:myaccount.php");
        } else {
            $error = "Registration Error";
        }
    }
}

?>



<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="images/logo2.png" style="width: 200px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Sign Up</h4>
                                </div>

                                <form method="POST">

                                    <div class="form-outline mb-4">
                                        <input type="text" name="firstName" class="form-control" placeholder="First name" />
                                        <label class="form-label" for="form2Example11">First Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="lastName" class="form-control" placeholder="Last name" />
                                        <label class="form-label" for="form2Example11">Last Name</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" class="form-control" placeholder="email address" />
                                        <label class="form-label" for="form2Example11">Email address</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" class="form-control" />
                                        <label class="form-label" for="form2Example22">Password</label>
                                    </div>

                                    <div class="text-center pt-1 mb-4 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Sign-up</button><br>
                                        <a class="text-muted" href="#!">Terms of service</a>
                                    </div>


                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">You can Easily Find the Car repair service center</h4>
                                <p class="small mb-0">Automotive helps to find a best car repair service center for you.
                                    Firstly you should register in Automotive and then you can have acess to find the best services.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'include\footer.php'; ?>