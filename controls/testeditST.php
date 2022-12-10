<?php
include("../../database/db.php");
include(MAIN_PATH."/common/validity.php");
global $conn;
$groupNO=$_SESSION['g-no'];
$errors = array();



function testposttest(){
    global $conn;
    $groupNO=$_SESSION['g-no'];
    $sql=" SELECT  user.full_name,user.u_img ,user.user_id ,student_group.g_no, student.stu_id ,student_group.stu_id,student_group.stu_group FROM `student_group`,user,student WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id  and student_group.g_no=14
;    ";
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

if(isset($_GET['deleteSTID'])&&$_GET['deletestuid']&&$_GET['group'])
{
    $g_no=$_GET['deleteSTID'];
$stid=$_GET['deletestuid'];
$stgroup=$_GET['group'];

    //to get p_no for stu
    function reterengno(){
        global $conn;
        $g_no=$_GET['deleteSTID'];
   $stid=$_GET['deletestuid'];
  $stgroup=$_GET['group'];

    $array_p_no_fot_stu=array();
   /* $select_p_no_for_stu=" SELECT DISTINCT post.p_no FROM post,student_group,groups WHERE student_group.g_no=groups.g_no AND student_group.stu_group=post.stu_group AND groups.g_no='$g_no' and  student_group.stu_id='$stid';";*/
   $select_p_no_for_stu=" SELECT DISTINCT post.p_no FROM post,student_group,student WHERE student_group.stu_id=student.stu_id AND student_group.stu_group=post.stu_group AND post.g_no='$g_no' and  student_group.stu_id='$stid'"; 
   $result = $conn->query($select_p_no_for_stu);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $p_no=$row['p_no'];
        array_push($array_p_no_fot_stu,$p_no);
        return $p_no;
      }}}
    //

   $pno=reterengno();
 

$sql="  DELETE FROM `file` WHERE file.p_no=?;";
    $st=executeQuery($sql,['p_no'=> $pno]);
    $sql1="DELETE FROM `post` WHERE post.stu_group=?;";
    $st=executeQuery($sql1,['stu_group'=>$stgroup]);
    $sql2="DELETE FROM `student_group` WHERE student_group.stu_group=?";
    $st=executeQuery($sql2,['stu_group'=>$stgroup]);
    return $st->affected_rows;


}


