<?php 
include("../../Database/Connection.php");  
/********************Leve student ********************************************************* */

if(isset($_GET['groupNO'])&&$_GET['studentID']&&$_GET['studentGR'])
{
global $conn;
$g_no=$_GET['groupNO'];
$stid=$_GET['studentID'];
$stgroup=$_GET['studentGR'];

$sql="SELECT post.p_no FROM `post` WHERE post.stu_group='$stgroup' and post.g_no='$g_no';";
$prre = $conn->query($sql);
if ($prre->num_rows > 0) {
  // output data of each row
  while($row = $prre->fetch_assoc()) {
    $postNO=$row['p_no'];
    
  }
} 

$sql="  DELETE FROM `file` WHERE file.p_no=?;";
    $st=executeQuery($sql,['p_no'=> $postNO]);
    $sql1="DELETE FROM `post` WHERE post.stu_group=?;";
    $st=executeQuery($sql1,['stu_group'=>$stgroup]);
    $sql2="DELETE FROM `student_group` WHERE student_group.stu_group=?";
    $st=executeQuery($sql2,['stu_group'=>$stgroup]);
    return $st->affected_rows;
}


?>