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

if(isset($_GET['number']) && isset( $_GET['studentID']) &&  isset($_GET['stu_group']))
{
  $user_id=$_SESSION['user_id'];
  $g_no=$_GET['number'];
  $stid=$_GET['studentID'];
  $stgroup=$_GET['stu_group'];

// to get post number
$array_p_no=array();
$select_p_no=" SELECT DISTINCT post.p_no FROM post,student_group,student WHERE student_group.stu_id=student.stu_id AND student_group.stu_group=post.stu_group AND post.g_no='$g_no' and  student_group.stu_id='$stid';"; 
$result = $conn->query($select_p_no);
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $p_no=$row['p_no'];
    array_push($array_p_no,$p_no);
  }
}//

//to get e_no 
$array_e_no=array();
$select_e_no="SELECT DISTINCT enquiry.e_no FROM enquiry,student_group WHERE student_group.stu_group=enquiry.stu_group AND student_group.stu_group='$stgroup';";
$result = $conn->query($select_e_no);
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $e_no=$row['e_no'];
    array_push($array_e_no,$e_no);
  }
}
/**delete from file table**/
if(count($array_p_no)>0){
  for($i=0;$i<count($array_p_no);$i++){
      //delete from file table by p_no
      $deletefile_by_p_no=deleteFileBy_p_no($array_p_no[$i]);
  }
}
/**************************/

/**delete from post table**/
for($i=0;$i<count($array_p_no);$i++){
  //delete from post table by p_no
  $deletepost_by_p_no=deletePostBy_p_no($array_p_no[$i]);
}
/**************************/

/**delete from response table**/
if(count($array_e_no)>0){
  for($i=0;$i<count($array_e_no);$i++){
      //delete from response table by p_no
      $deleteResponse_by_e_no=deleteResponse_e_no($array_e_no[$i]);
  }
}
/*****************************/

/**delete from Enquiry table**/
if(count($array_e_no)>0){
    for($i=0;$i<count($array_e_no);$i++){
        //delete from Enquiry table by p_no
        $deleteEnquiry_by_e_no=deleteEnquiry($array_e_no[$i]);
    }
}
/*****************************/

/**delete from student group table**/
/* DELETE Student From Group FUNCTION */
function deleteStudentGroupLeave($stu_id,$g_no)
{
    global $conn;
    $sql1="DELETE FROM student_group WHERE stu_id='$stu_id' AND g_no='$g_no';";
    $st=executeQuery($sql1,['stu_id'=>$stu_id,'g_no'=>$g_no]);
    return $st->affected_rows;
}
$deleteStudent=deleteStudentGroupLeave($stid,$g_no);

/*for successfully message */ 
$_SESSION['message']="you leaved from group";
header('location: '.BASE_URL.'/UI/group/main page for group.php');
$conn->close();
exit();

}

/************************************end leave button****************************************** */
