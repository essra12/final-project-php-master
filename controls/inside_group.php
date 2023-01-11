<?php 
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH."/common/validity.php");

if(isset($_GET["data"]))
{
	$data = $_GET["data"];
   $group_no = $_GET["number"];
   $_SESSION['g_no']= $group_no;
}
$_SESSION['g-no']=$group_no;
/*******************************************************************************************/
/***************to get the teacher name ***************************************/
/*******************************************************************************************/

    global $conn; 
    $group_no = $_GET["number"];

    $query="SELECT user_id FROM teacher,groups WHERE teacher.tr_id=groups.tr_id and groups.g_no='".$group_no ."'";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $id=$row['user_id'];
     
    }
  } 
    /*******************************************************/
    $sql="SELECT  `full_name` FROM user WHERE user.user_id='".$id."'";
    $prre = $conn->query($sql);
    if ($prre->num_rows > 0) {
      // output data of each row
      while($row = $prre->fetch_assoc()) {
        $teacher_name=$row['full_name'];
        
      }
    } 
/**************************************************************** */
/********************Leve student ********************************************************* */
if(isset($_GET['groupNO'])&&$_GET['studentID']&&$_GET['studentGR'])
{
$g_no=$_GET['groupNO'];
$stid=$_GET['studentID'];
$stgroup=$_GET['studentGR'];

    //to get p_no for stu
        function reterengno(){
        global $conn;
        $g_no=$_GET['groupNO'];
        $stid=$_GET['studentID'];
        $stgroup=$_GET['studentGR'];

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


 