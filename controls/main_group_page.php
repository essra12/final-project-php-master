<?php
include(MAIN_PATH. "/database/db.php");

global $conn;
$exisiting_group="";
$errors = array();
$table1='groups';
$username=$_SESSION['full_name']; 
 /*$Tid= $_SESSION['tid'];*/
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
    global $conn; 
    $_POST['search']=trim($_POST['search'], "EFWL");
    $exisiting_group_search = selectOne($table1,['g_no'=>$_POST['search']]);
    if($exisiting_group_search)
        {    /////
             $_SESSION['search_g_no']=$_POST['search'];
             ////
             header('location: ' . BASE_URL .'/UI/student/join.php'); 
             $conn->close();
             exit();            
        }

    else if(!$exisiting_group_search) 
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
  $sql = "SELECT * FROM groups,student_group WHERE groups.g_no=student_group.g_no and student_group.stu_id='.$id.' ORDER BY groups.Datetime DESC";
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
 /* $te= $_SESSION['tid'];*/
  $query="SELECT tr_id FROM teacher,user WHERE teacher.user_id=user.user_id and user.full_name='".$username."'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $id=$row['tr_id'];
  }
} 
  /*******************************************************/
  $sql = "SELECT * FROM groups WHERE  groups.tr_id='$id' ORDER BY groups.Datetime DESC;";
  $pre=$conn->prepare($sql);
  $pre->execute();
  $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
  
}

/*******************************************************************************************/
/*******to creat group section *************************************************************/
/*******************************************************************************************/
$role=$_SESSION['role'];

if($_SESSION['role']=="teacher")
{
  $table="groups";
  /* $groupNumber=$_SESSION['g_no']; */
  $errors = array();
  global $conn;
   /***to get tr_id****/
  $user_id=$_SESSION['user_id'];
  $query="SELECT teacher.tr_id FROM teacher,user WHERE teacher.user_id=user.user_id and user.user_id='".$user_id."'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $tr_id=$row['tr_id'];
  }
}
  
  
/*   $query="SELECT teacher.tr_id FROM teacher,groups WHERE teacher.tr_id=groups.tr_id and groups.g_no='$groupNumber';";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $tr_id=$row['tr_id'];
       
      }
    } */ 
  
  /*************************Insert Group Data************************/
  $new_g_name=""; 
  if(isset($_POST['Create'])){
    $groupinput=$_POST['g_name'];
    if(empty($groupinput))
    {
      array_push($errors," Enter Group  Name");
    }else
     $exisiting_group = selectOne($table,['g_name'=>$_POST['g_name'],'tr_id'=>$tr_id]);
     if($exisiting_group)
     {
         array_push($errors," This Group alredy exists");
           
     }
     
     if(count($errors)==0){
         unset($_POST['Create']);
         $_POST['tr_id']=$tr_id;
         $post_id = insertData($table,$_POST);    
         $_SESSION['message']=' Group created successfully';
         header('location: ' . BASE_URL .'/UI/group/main page for group.php');// يتم إستخدام هذه الدالة  من أجل نقل أو تحويل المستخدم للمكان الذي نُريده
         $conn->close();
         exit(); 
     }
     
             
} 
}




/***************************Delete Group****************************/

if(isset($_GET['deleteID']))
{
    $g_no=$_GET['deleteID'];

    //to get p_no for tr
    $array_p_no_fot_tr=array();
    $select_p_no_for_tr="SELECT DISTINCT post.p_no FROM post,groups WHERE post.g_no=groups.g_no AND groups.g_no='$g_no';";
    $result = $conn->query($select_p_no_for_tr);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $p_no=$row['p_no'];
        array_push($array_p_no_fot_tr,$p_no);
      }
    }//

    //to get p_no for stu
    $array_p_no_fot_stu=array();
    $select_p_no_for_stu="SELECT DISTINCT post.p_no FROM post,student_group,groups WHERE student_group.g_no=groups.g_no AND student_group.stu_group=post.stu_group AND groups.g_no='$g_no';";
    $result = $conn->query($select_p_no_for_stu);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $p_no=$row['p_no'];
        array_push($array_p_no_fot_stu,$p_no);
      }
    }//

    /**delete from file table**/
    // to delete from file table by p_no  for tr
    if(count($array_p_no_fot_tr)>0){
        for($i=0;$i<count($array_p_no_fot_tr);$i++){
            //delete from file table by tr p_no
            $deletefile_by_p_no_for_tr=deleteFileBy_p_no($array_p_no_fot_tr[$i]);
        }
    }

    // to delete from file table by p_no  for stu
    if(count($array_p_no_fot_stu)>0){
        for($i=0;$i<count($array_p_no_fot_stu);$i++){
            //delete from file table by tr p_no
            $deletefile_by_p_no_for_stu=deleteFileBy_p_no($array_p_no_fot_stu[$i]);
        }
    }
    /**************************/
    /**delete from post table**/
    // to delete from post table by p_no  for tr
    for($i=0;$i<count($array_p_no_fot_tr);$i++){
        //delete from post table by tr p_no
        $deletefile_by_p_no_for_tr=deletePostBy_p_no($array_p_no_fot_tr[$i]);
    }
    // to delete from post table by p_no  for stu
    for($i=0;$i<count($array_p_no_fot_stu);$i++){
        //delete from post table by tr p_no
        $deletepost_by_p_no_for_stu=deletePostBy_p_no($array_p_no_fot_stu[$i]);
    }

    /*******************************/
    /**delete from response table**/
    $delete_response=deleteResponse_g_no($g_no);

    /*******************************/
    /**delete from enquiry table**/
    //to get e_no for stu
    $array_e_no=array();
    $select_e_no="SELECT  enquiry.e_no FROM enquiry,student_group,groups WHERE student_group.g_no=groups.g_no AND student_group.stu_group=enquiry.stu_group AND groups.g_no='$g_no';";
    $result = $conn->query($select_e_no);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $e_no=$row['e_no'];
        array_push($array_e_no,$e_no);
      }
    }//
    // to delete from enquiry table by e_no
    if(count($array_e_no)>0){
        for($i=0;$i<count($array_e_no);$i++){
            //delete from enquiry table
            $deleteenquiry=deleteEnquiry($array_e_no[$i]);
        }
    }

    /************************************/
    /**delete from Announcement by g_no table**/
    $delete_announcement=deleteAnnouncement_g_no($g_no);

    /************************************/
    /**delete from student_group table**/
    $delete_student_group_by_g_no=deleteStudent_group($g_no);

     /***************************/
    /**delete from group table**/
    $delete_group_by_g_no=deleteGroup($g_no);

     /***************************/
    /*for successfully message */ 
    $_SESSION['message']="Group deleted successfully";
    header('location: '.BASE_URL.'/UI/group/main page for group.php');
    $conn->close();
    exit();

}

