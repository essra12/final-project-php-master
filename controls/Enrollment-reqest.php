
 <?php
/* include("../path.php");  */ 
include("../../database/db.php");
include(MAIN_PATH. "/common/validity.php");
global $conn;
$groupNO=$_SESSION['g-no'];
 /*********************************************   insert stdent group  in  Enrollment Requests page  ***************************************************************** */
 /**   (ONE)------------------- selct all student-group --> if post="" ----------------------------- */
 function testpost(){
    global $conn;
    $groupNO=$_SESSION['g-no'];
    $sql3=" SELECT  user.full_name,user.u_img ,user.user_id , student_group.stu_id,student_group.stu_group FROM `student_group`,user,student WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id  and student_group.g_no='$groupNO';; ";
    $pre=$conn->prepare($sql3);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
/**---(TWO)--------------------------- selct all student-group   if post != "" ---------------------- */
/** عرض كل الطلبة يلي مدايرين post */
function selectStudentG(){ 
    global $conn;
    $groupNO=$_SESSION['g-no'];
   $sql="SELECT  user.full_name,user.u_img ,user.user_id , student_group.stu_id,student_group.stu_group ,file.p_no FROM `student_group`,user,student,file,post WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id and student_group.stu_group=post.stu_group and post.p_no=file.p_no and student_group.g_no='$groupNO';";
  /*  $sql = "SELECT  user.full_name,user.u_img ,user.user_id , student_group.stu_id,student_group.stu_group FROM `student_group`,user,student WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id;";
  SELECT  user.full_name,user.u_img ,user.user_id , student_group.stu_id,student_group.stu_group ,file.p_no FROM `student_group`,user,student,file,post WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id and student_group.stu_group=post.stu_group and post.p_no=file.p_no;
  */ 
  $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
/**---(TWO)--------------------------- selct  student-group ,post, file    if post != "" ---------------------- */

function selectstudentallG(){/** هاك تكرار في الجملة يجب حلة   post  يجب عرض الطلبة الذين لم يقوموا بوضع اي واجب   */
    global $conn;
    $groupNO=$_SESSION['g-no'];
    $sql="  SELECT  user.full_name,user.u_img ,user.user_id , student_group.stu_id,student_group.stu_group FROM `student_group`,user,student,post WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id and student_group.stu_group!=post.stu_group and student_group.g_no='$groupNO'; 
    ";
   /* $sql="  SELECT  user.full_name,user.u_img ,user.user_id , student_group.stu_id,student_group.stu_group,post.stu_group FROM `student_group`,user,student ,post,file WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id and student_group.stu_group!= post.stu_group;
    ";*/
 /* $sql="SELECT  user.full_name,user.u_img ,user.user_id , student_group.stu_id,student_group.stu_group,post.stu_group FROM `student_group`,user,student ,post,file WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id and student_group.stu_group=post.stu_group;";*/
   /*   $sql = "SELECT  user.full_name,user.u_img ,user.user_id , student_group.stu_id,student_group.stu_group FROM `student_group`,user,student WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id;";
   */ 
   $pre=$conn->prepare($sql);
      $pre->execute();
      $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
      return $records;

}
 /********************************************Delete Student in  Enrollment Requests page **********************************************/

/**---(ONE)-------------------------------- delete sudent group --> if post =""  -------------------------------- */

function test($id8)
{
    global $conn;
    $sql1="DELETE FROM `post` WHERE post.stu_group=?;";
    $st=executeQuery($sql1,['stu_group'=>$id8]);
    $sql2="DELETE FROM `student_group` WHERE student_group.stu_group=?";
    $st=executeQuery($sql2,['stu_group'=>$id8]);
    return $st->affected_rows;
} 

 if(isset($_GET['deleteSTID88']))
 {
   $deleteStudent=test($_GET['deleteSTID88']);
   $_SESSION['message']="Student deleted successfully";
   header('location: '.BASE_URL.'/UI/teacher/Enrollment__Requests.php');/** <---  */
   $conn->close();
   exit();
 } 
 /**--(TWO)---------------------------- delete all post ,file,stu_group -------------------------------- */

function deleteStudentgroupp($id,$id1)
{
    global $conn;
    $sql="  DELETE FROM `file` WHERE file.p_no=?;";
    $st=executeQuery($sql,['p_no'=>$id1]);
    $sql1="DELETE FROM `post` WHERE post.stu_group=?;";
    $st=executeQuery($sql1,['stu_group'=>$id]);
    $sql2="DELETE FROM `student_group` WHERE student_group.stu_group=?";
    $st=executeQuery($sql2,['stu_group'=>$id]);
    return $st->affected_rows;
} 

 if(isset($_GET['deleteSTID'])&&isset($_GET['deleteSTID2']))
 {
   $deleteStudent=deleteStudentgroupp($_GET['deleteSTID'],$_GET['deleteSTID2']);
   $_SESSION['message']="Student deleted successfully";
   header('location: '.BASE_URL.'/UI/teacher/Enrollment__Requests.php');
   $conn->close();
   exit();
 } 
 /**----(TWO)----------------------------------delete  student group --------------------- */

 function deleteSTG($id)
{
    global $conn;
    $sql1="DELETE FROM `post` WHERE post.stu_group=?;";
    $st=executeQuery($sql1,['stu_group'=>$id]);
    $sql2="DELETE FROM `student_group` WHERE student_group.stu_group=?";
    $st=executeQuery($sql2,['stu_group'=>$id]);
    return $st->affected_rows;
} 

 if(isset($_GET['deleteSTID55']))
 {
   $deleteStudent=deleteSTG($_GET['deleteSTID55']);
   $_SESSION['message']="Student deleted successfully";
   header('location: '.BASE_URL.'/UI/teacher/Enrollment__Requests.php');
   $conn->close();
   exit();
 } 
