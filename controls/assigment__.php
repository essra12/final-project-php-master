<?php
include(MAIN_PATH. "/database/db.php");

$errors=array();

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
    $sql = "SELECT post.title ,post.Datatime,post.p_no,post.stu_grade,announcement.grade from post,student_group,announcement WHERE post.stu_group=student_group.stu_group AND post.an_no=announcement.an_no AND student_group.g_no='$group_no' and student_group.stu_id='$stu_id' ORDER BY post.Datatime DESC";
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function selectpostfile(){
$group_no=$_SESSION['g_no'];
global $conn;
$sql="SELECT user.full_name,user.u_img,student.stu_id,post.title,post.Datatime,post.p_no,announcement.grade,post.stu_grade from user,student,student_group,post,file,announcement 
WHERE user.user_id=student.user_id and student.stu_id=student_group.stu_id and student_group.stu_group=post.stu_group and post.p_no=file.p_no and post.an_no=announcement.an_no and student_group.g_no='$group_no'";
$pre=$conn->prepare($sql);
$pre->execute();
$records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}
function search($stu_id){ 
    $group_no=$_SESSION['g_no'];
    $search="";
    global $errors;
    global $conn; 

        $sql="SELECT user.full_name,user.u_img,student.stu_id,post.title,post.Datatime,post.p_no,announcement.grade,post.stu_grade from user,student,student_group,post,file,announcement 
        WHERE user.user_id=student.user_id and student.stu_id=student_group.stu_id and student_group.stu_group=post.stu_group and post.p_no=file.p_no and post.an_no=announcement.an_no and student_group.g_no='$group_no' AND student.stu_id='$stu_id';";
        $pre=$conn->prepare($sql);
        $pre->execute();
        $exisiting_student_search=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
            
        if($exisiting_student_search)
        {
            $conn->close();
            return $exisiting_student_search;
        }
        elseif(!$exisiting_student_search) 
          {
            array_push($errors," This student dosn't exist");
            $search="";
            return $exisiting_student_search;
         } 
                   
    } 

?>

