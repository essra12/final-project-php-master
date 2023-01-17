<?php
include("../../path.php"); 
include(MAIN_PATH. "/DataBase/db.php");

global $conn;
$stu_id =$_SESSION["stu_id"];


$sql="SELECT stu_group FROM student_group,student WHERE student_group.stu_id=student.stu_id AND student_group.stu_id ='$stu_id';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $stu_group=$row["stu_group"];
      $sql = "UPDATE student_announcement SET status='1' WHERE student_announcement.status='0' AND student_announcement.stu_group='$stu_group';";
      $res = mysqli_query($conn, $sql);
    }
}
if ($res) {
  echo "Success";
} else {
  echo "Failed";
}