<?php

include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");

global $conn;

/********************************************Delete Student from control panel**********************************************/
 if(isset($_GET['deletef_no']))
 {
   $deletefile=deleteFile($_GET['deletef_no']);
   $_SESSION['message']="file deleted successfully";
   header('location: '.BASE_URL.'/UI/control_panel/file_control_panal.php');
   $conn->close();
   exit();
 } 

 ?>