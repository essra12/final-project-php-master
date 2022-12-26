<?php
include(MAIN_PATH. "/database/db.php");

$user_id=$_SESSION['user_id'];

////////////////////////////
$group_no=$_SESSION['g_no'];
///////////////////////////

$sql="SELECT stu_id FROM user,student Where user.user_id=student.user_id AND user.user_id='$user_id';";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['stu_id']=$row["stu_id"];
      }
}

function infoforstudent(){
    $stu_id=$_SESSION['stu_id'];
    $group_no=$_SESSION['g_no'];
    global $conn;
    $sql = "SELECT post.title ,post.Datatime,post.p_no from post,student_group WHERE post.stu_group=student_group.stu_group AND student_group.g_no=$group_no and student_group.stu_id=$stu_id";
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function selectpostfile(){
$group_no=$_SESSION['g_no'];
global $conn;
$sql="SELECT  user.full_name,student.stu_id,post.title,post.Datatime,post.p_no from user,student,student_group,post,file WHERE 
user.user_id=student.user_id and student.stu_id=student_group.stu_id and student_group.stu_group=post.stu_group and post.p_no=file.p_no and student_group.g_no='$group_no'";
$pre=$conn->prepare($sql);
$pre->execute();
$records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}
?>

