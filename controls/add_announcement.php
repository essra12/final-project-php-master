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
$sql_insert_announcement = "INSERT INTO `announcement`(`an_content`,`due_date`,`g_no`) VALUES ('$an_content',current_date(),'$groupNumber');";

if(mysqli_query($conn, $sql_insert_announcement)){
}
else{
    array_push($errors,"Error in save data $conn->error");
}  

$sql_last_id="SELECT MAX( an_no ) FROM announcement;";
$result_id = $conn->query($sql_last_id);
if ($result_id->num_rows == 1) {
    while($row = $result_id->fetch_assoc()) {
      $last_id=$row['MAX( an_no )'];
    }
}

$sql="SELECT stu_group FROM `student_group` WHERE g_no='$groupNumber';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $stu_group=$row["stu_group"];
    $mysql="INSERT INTO `student_announcement`(`stu_group`, `an_no`) VALUES ('$stu_group','$last_id');";
    if(mysqli_query($conn, $mysql)){
    }
    else{
        array_push($errors,"Error in save data $conn->error");
    }
  }
}

if(count($errors)==0){
    $_SESSION['message']="The announcement sent successfully";
    header('location: '.BASE_URL.'/UI/teacher/announcement.php');
    $conn->close();
    exit();
  }
  else{
    $an_content=$_POST['an_content'];
  }
}
