<?php 
include("../../Database/Connection.php");  
/********************Leve student ********************************************************* */

if(isset($_GET['groupNO'])&&$_GET['studentID']&&$_GET['studentGR'])
{
global $conn;
$g_no=$_GET['groupNO'];
$stid=$_GET['studentID'];
$stgroup=$_GET['studentGR'];
/**------- to get post number ----------- */
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
$postNO=reterengno();
$sql="  DELETE FROM `file` WHERE file.p_no=?;";
    $st=executeQuery($sql,['p_no'=> $postNO]);
    $sql1="DELETE FROM `post` WHERE post.stu_group=?;";
    $st=executeQuery($sql1,['stu_group'=>$stgroup]);
    $sql2="DELETE FROM `student_group` WHERE student_group.stu_group=?";
    $st=executeQuery($sql2,['stu_group'=>$stgroup]);
    return $st->affected_rows;
}
?>