<?php
include(MAIN_PATH. "/database/db.php");

global $conn;
$errors = array();
$table1='groups';
$username=$_SESSION['full_name']; 
//----user id for get image -----
$user_id=$_SESSION['user_id'];
//-------------------------------

global $conn; 
$query="SELECT full_name FROM user WHERE  user.user_id='".$user_id."'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  $full_name=$row['full_name'];
}
}



/*******************************************************************************************/
/*******search section **************************/
/*******************************************************************************************/
function search(){ 
$search="";
/////
global $table1;
global $errors;
////

  if(isset($_POST['search'])){

    $exisiting_group_search = selectOne($table1,['g_no'=>$_POST['search']]);
    if($exisiting_group_search)
        {    /////
             $_SESSION['search_g_no']=$_POST['search'];
             ////
             header('location: ' . BASE_URL .'/UI/student/join.php'); 
             $conn->close();
             exit();            
        }

    elseif(!$exisiting_group_search) 
      {
        array_push($errors," This group is not exists");
    
     } 
               
} }
/*******************************************************************************************/
/*******to creat cards with using group name for student section **************************/
/*******************************************************************************************/
function selectGroupName(){ 
  global $conn; 
  /* $username=$_SESSION['full_name']; */
  $user_id=$_SESSION['user_id'];
  $query="SELECT stu_id FROM student,user WHERE student.user_id=user.user_id and user.user_id='".$user_id."'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id=$row['stu_id'];
  }
} 
  /*******************************************************/
  $sql = "SELECT * FROM groups,student_group WHERE groups.g_no=student_group.g_no and student_group.stu_id='".$id."'";
  $pre=$conn->prepare($sql);
  $pre->execute();
  $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
  
}
/*******************************************************************************************/
/*******to creat cards with using group name for teacher section **************************/
/*******************************************************************************************/

function selectGroupNameForTeacher(){ 
  global $conn; 
  $username=$_SESSION['full_name'];
  $query="SELECT tr_id FROM teacher,user WHERE teacher.user_id=user.user_id and user.full_name='".$username."'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id=$row['tr_id'];
  }
} 
  /*******************************************************/
  $sql = "SELECT * FROM groups WHERE  groups.tr_id='".$id."'";
  $pre=$conn->prepare($sql);
  $pre->execute();
  $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
  
}
