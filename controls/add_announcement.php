<?php
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");

$groupNumber=$_SESSION['g_no'];
$role=$_SESSION['role'];
global $conn;
$errors=array();
$an_content="";

if(isset($_POST['add_announcement'])){
    unset($_POST['add_announcement']);
$an_content=htmlentities($_POST['an_content']);    
$sql_insert_announcement = "INSERT INTO announcement(an_content, g_no) VALUES ('$an_content','$groupNumber');";
if(mysqli_query($conn, $sql_insert_announcement)){
}
else{
    array_push($errors,"Error in save data");
}  
if(count($errors)==0){
    /* $_SESSION['message']="The announcement sent successfully"; */
    header('location: '.BASE_URL.'/UI/teacher/Announcement.php');
    $conn->close();
    exit();
  }
  else{
    $an_content=$_POST['an_content'];
  }
}
