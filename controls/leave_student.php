<?php 
include("../../Database/Connection.php");  
global $conn;
/********************Leve student ********************************************************* */
if(isset($_POST['leave'])){
  dd($_GET['groupNO']);
  if(isset($_GET['groupNO']) && isset( $_GET['studentID']) &&  isset($_GET['stu_group']))
  {
    $g_no=$_GET['groupNO'];
    $stid=$_GET['studentID'];
    $stgroup=$_GET['stu_group'];

  // to get post number
  $array_p_no_fot_stu=array();
  $select_p_no_for_stu=" SELECT DISTINCT post.p_no FROM post,student_group,student WHERE student_group.stu_id=student.stu_id AND student_group.stu_group=post.stu_group AND post.g_no='$g_no' and  student_group.stu_id='$stid';"; 
  $result = $conn->query($select_p_no_for_stu);
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $p_no=$row['p_no'];
      array_push($array_p_no_fot_stu,$p_no);
    }
  }//

  //to get e_no 
  $array_e_no=array();
  $select_e_no="SELECT DISTINCT enquiry.e_no FROM enquiry,student_group WHERE student_group.stu_group=enquiry.stu_group AND student_group.stu_group='$stgroup';";
  $result = $conn->query($select_e_no);
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $e_no=$row['e_no'];
      array_push($array_e_no,$p_no);
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
  $deleteStudent=deleteStudentGroup($stu_id_delete);


  /**delete from student/user tables**/
  $deleteStudent=deleteStudentUser($user_id_delete);

  /*for successfully message */ 
  $_SESSION['message']="Student deleted successfully";
  header('location: '.BASE_URL.'/UI/group/main page for group.php');
  $conn->close();
  exit();

  }
}
?>