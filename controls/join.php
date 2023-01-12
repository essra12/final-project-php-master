<?php
include(MAIN_PATH. "/database/db.php");

$errors = array();
global $conn; 

function selectGroupNameTeacherName(){
  global $conn; 
  $g_no=$_SESSION['search_g_no'];

  $sql="SELECT g_no,g_name,full_name FROM groups,user,teacher WHERE groups.g_no='$g_no' AND groups.tr_id=teacher.tr_id AND teacher.user_id=user.user_id;";
  $result = $conn->query($sql);
  
  if ($result->num_rows ==1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $group_no=$row['g_no'];
      $group_name=$row['g_name'];
      $tr_name=$row['full_name'];
    }
    $join_data=[
      "group_name" =>$group_name,
      "tr_name" =>$tr_name
    ];
  }
  return $join_data;
}

if(isset($_POST['conf_join'])){

  /**get stu_id**/
  $user_id=$_SESSION['user_id'];
  $sql_stu_id="SELECT stu_id FROM student,user WHERE student.user_id=user.user_id AND user.user_id='$user_id';";
  $result_stu_id = $conn->query($sql_stu_id);
  if ($result_stu_id->num_rows == 1) {
      while($row = $result_stu_id->fetch_assoc()) {
        $stu_id=$row["stu_id"];
      }
  }
  /**************/

  $g_no=$_SESSION['search_g_no'];
  $exisiting_student_in_group = selectOne('student_group',['stu_id'=>$stu_id,'g_no'=>$g_no]);
    if($exisiting_student_in_group)
    {
        array_push($errors,"You alredy in the group");
    }

  /**for teasting**/
/*   $exisiting_student_in_basic_group = selectOne('testing',['stu_id'=>$stu_id,'g_no'=>$g_no]);
  if(empty($exisiting_student_in_basic_group))
  {
      array_push($errors,"You cannot join to this group");
  } */
  /****************/

    if(count($errors)==0){
      $sql_join="INSERT INTO `student_group`(`stu_id`, `g_no`) VALUES ('$stu_id','$g_no')";
      $conn->query($sql_join); 
      $last_id = $conn->insert_id;

      /*successful*/
      $_SESSION['message']='you joined the group';
      header('location: ' . BASE_URL .'/UI/group/main page for group.php');
      $conn->close();
      exit();
    }
 
  

}