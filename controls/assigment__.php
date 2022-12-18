<?php
include(MAIN_PATH. "/database/db.php");

$user_id=$_SESSION['user_id'];

$sql="SELECT stu_id FROM user,student Where user.user_id=student.user_id AND user.user_id='$user_id';";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
         $stu_id=$row["stu_id"];
         $_SESSION['p_no']=$stu_id;
    }
}

if($role=="teacher"){
function infoforstudent(){
    global $stu_id;
    $group_no=$_SESSION['g_no'];
    global $conn;
    $sql = "SELECT post.title ,post.Datatime,post.p_no from post,student_group WHERE post.stu_group=student_group.stu_group AND student_group.g_no=$group_no and student_group.stu_id=$stu_id";
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
}
?>
