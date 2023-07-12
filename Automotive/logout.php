<?php

session_start();
unset($_SESSION['userid']);
session_unset();
header("Location:index.php");

?>