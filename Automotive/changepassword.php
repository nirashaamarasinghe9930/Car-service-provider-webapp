<?php

include "include/db.php";
include "include/validation.php";

session_start();

// Session User Id
$user = $_SESSION['userid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate POST inputs
    $epass = validation($_POST['ePassword']);
    $npass = validation($_POST['nPassword']);
    $cpass = validation($_POST['cPassword']);

    // Hashing password
    $hashEpass = md5($epass);

    // Checking existing password
    $sql1 ="SELECT password FROM users WHERE id='$user' AND password='$hashEpass'";
    $result = mysqli_query($dbcon, $sql1);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

   if(mysqli_num_rows($result) == 1){
       // Check new password and password confirmation Matches
        if($npass == $cpass){
            $hashNpass = md5($npass); // Hash New password
            // Update password
            $sql2 ="UPDATE users SET password='$hashNpass' WHERE id='$user'";

            if(mysqli_query($dbcon, $sql2)){
                header('Location: myaccount.php'); // Redirect to profile
            }
        }else{
            echo "Password doesn't matches";
        }
   }else{
    echo "Incorrect password";
   }

}