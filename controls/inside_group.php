<?php 
include(MAIN_PATH. "/database/db.php");

if(isset($_GET["data"]))
{
	$data = $_GET["data"];
   $group_no = $_GET["number"];

}

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
 