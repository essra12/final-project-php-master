<?php

session_start();
unset($_SESSION['fullname']);
header("location:login.php");

?>