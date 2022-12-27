<?php
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");



$role=$_SESSION['role'];
$group_no=$_SESSION['g_no'];
global $conn;


if(isset($_POST['add_enquiry'])){
 
/*to get user id from user -> student*/
$user_id=$_SESSION['user_id'];
$sql="SELECT stu_id FROM user,student Where user.user_id=student.user_id AND user.user_id='$user_id';";
$result_stu_id = $conn->query($sql);
if ($result_stu_id->num_rows == 1) {
    while($row = $result_stu_id->fetch_assoc()) {
      $stu_id=$row["stu_id"];
    
    }
}
/*to get user $stu_group from user -> student*/
$mysql="SELECT stu_group FROM student_group Where stu_id='$stu_id' and g_no='$group_no';";
$result= $conn->query($mysql);
if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
      $stu_group=$row["stu_group"];
    
    }
}

    $e_content=$_REQUEST["enquiry"];
    $sql="INSERT INTO `enquiry`(`e_no`, `e_content`, `datetime`,  `stu_group`) VALUES (0,'$e_content',current_timestamp(),'$stu_group')";
    if(mysqli_query($conn, $sql)){
        $_SESSION['message']="The post sent successfully";
      
    } 
   
}
/*******************************************************************************************************/
/*******************************************************************************************************/
/*******   to creat cards with using select Enquiry****************************************************/
/******************************************************************************************************/


function selectEnquiry(){ 
  global $conn; 

$group_no=$_SESSION['g_no'];
   $sql = "SELECT enquiry.e_no, enquiry.e_content, enquiry.datetime, student_group.stu_id  FROM `enquiry`,student_group WHERE enquiry.stu_group=student_group.stu_group and student_group.g_no='$group_no' ORDER BY enquiry.datetime DESC;";
  $pre=$conn->prepare($sql);
  $pre->execute();
  $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
  
}
/*******************************************************************************************************/
/*******************************************************************************************************/
/*******   to  reply on post section ******************************************************************/
/******************************************************************************************************/



  
if(isset($_POST['reply'])){
 
  global $conn; 
  $group_no=$_SESSION['g_no'];
  $r_content=$_REQUEST["replyText"];
  $e_no=$_POST['e_no'];
  dd($e_no);
  $sql="INSERT INTO `response`(`r_no`, `r_content`, `datetime`, `e_no`, `g_no`) VALUES (0,'$r_content',current_timestamp(),'$e_no',$group_no);";
  if(mysqli_query($conn, $sql)){
    $_SESSION['message']="successfully";
   
  } 
 
}

function selectReply(){ 
  global $conn; 
  $group_no=$_SESSION['g_no'];
  $mysql="SELECT `r_no`, `r_content`, response.datetime, response.e_no, `g_no`,enquiry.e_no  FROM `response`,enquiry WHERE response.e_no=70 AND g_no='$group_no' AND enquiry.e_no=response.e_no;";
  $pre=$conn->prepare($mysql);
  $pre->execute();
  $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
  
}

if(isset($_GET['deleteReply'])){

  global $conn;
  $r_no=$_GET['deleteReply'];
  $sql="DELETE FROM `response` WHERE r_no='$r_no';";
  $pre=$conn->query($sql);

}




?>