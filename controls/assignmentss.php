<?php
include(MAIN_PATH."/DataBase/Connection.php");
include(MAIN_PATH. "/database/db.php");
global $conn;
$groupNO=$_SESSION['g-no'];
$id=$_SESSION['id'];
/*$id= $_SESSION['id'];*/
/** -------------------for teacher------------------------ */

function selectAllfilesInfo(){ 

    
global $conn; 
$groupNO=$_SESSION['g-no'];
/*$sql="SELECT  user.full_name,user.u_img ,user.user_id,student.stu_id ,post.title,post.description FROM `student_group`,user,student,post WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id and student_group.stu_group=post.stu_group and post.g_no='$groupNO' ;";
*/
 $stu_id=$_SESSION['stu_id'];
 $group_no=$_SESSION['g_no'];
global $conn;
/*$sql = "SELECT post.title ,post.Datatime,post.p_no from post,student_group WHERE post.stu_group=student_group.stu_group AND student_group.g_no=$group_no and student_group.stu_id=$stu_id";*/
/*
$sql="SELECT  `title`, `description` FROM `post`,groups WHERE groups.g_no=post.g_no  and post.g_no='$groupNO';";*/
$sql="SELECT  user.full_name,user.user_id,student.stu_id ,post.title,post.description ,post.Datatime FROM `student_group`,user,student,post WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id and student_group.stu_group=post.stu_group and student_group.g_no='$group_no' and student_group.stu_id='$stu_id';";   
global $conn;
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

/** -------------------for student ------------------------ */

function selectstudentpost(){
    global $conn; 
    $groupNO=$_SESSION['g-no'];
      $id=$_SESSION['id'];
    $sql="SELECT  user.full_name,user.u_img ,user.user_id,student.stu_id ,post.title,post.description FROM `student_group`,user,student,post WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id and student_group.stu_group=post.stu_group and student_group.stu_id='$id' and   student_group.g_no='$groupNO' ;";
    global $conn;
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

}
?>
