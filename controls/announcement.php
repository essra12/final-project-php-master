<?php
include(MAIN_PATH. "/database/db.php");


$groupNumber=$_SESSION['g_no'];
$role=$_SESSION['role'];
$errors=array();
/******************Delete Announcement******************/

if(isset($_GET['delete_an_no']))
 {
   $deleteStudent=deleteAnnouncement($_GET['delete_an_no']);
   $_SESSION['message']="Announcement deleted successfully";
   header('location: '.BASE_URL.'/UI/teacher/announcement.php');
   $conn->close();
   exit();
 }
/******************Delete Announcement Assignment******************/

if(isset($_GET['delete_an_ass_no']))
 {
   $an_no=$_GET['delete_an_ass_no'];
   /****************to know if thier is assignment in this announcement*****************/
   $sql="SELECT an_no FROM `post` WHERE an_no='$an_no'"; 
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
      array_push($errors,"It can't be deleted, because some students submitted the assignment");
   }
   else if($result->num_rows == 0) {
    $deleteStudent=deleteAnnouncement($an_no);
    $_SESSION['message']="Announcement deleted successfully";
    header('location: '.BASE_URL.'/UI/teacher/announcement.php');
    $conn->close();
    exit();
    }
   /***********************************************************************************/
 }

