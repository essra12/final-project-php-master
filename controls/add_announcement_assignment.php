<?php
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");

$groupNumber=$_SESSION['g_no'];
$role=$_SESSION['role'];
global $conn;
$errors=array();
$an_content="";
$grade="";
$due_date="";

if(isset($_POST['add_announcement_assignment'])){
    unset($_POST['add_announcement_assignment']);
    $an_content=htmlentities($_POST['an_content']);   
    $due_date=$_POST['due_date'];  
    $grade=$_POST['an_grade']; 
    $sql_insert_announcement_assignment = "INSERT INTO announcement(an_content, due_date, grade, g_no) VALUES ('$an_content','$due_date','$grade','$groupNumber');";
    if(mysqli_query($conn, $sql_insert_announcement_assignment)){
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
        $grade=$_POST['an_grade'];
        $due_date=$_POST['due_date']; 
      }
}