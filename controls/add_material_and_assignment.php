<?php
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");

global $conn;
$errors_for_material=array();
$errors_for_assignment=array();
$title="";
$description="";


/*****************************************************************************/
/*****************************Insert  material*******************************/

/*****to find g_no *******/
 function selectGroupNo(){ 
   global $conn; 
   if(isset($_GET["g_no"]))
   {
     $g_number = $_GET["g_no"];
   }
   return $g_number;
 } 
 /***********************/

if(isset($_POST['add_material'])){
   unset($_POST['add_material']);

   $files = array_filter($_FILES['f_name']['name']);

   /******for Post Table*********/
    $title=htmlentities($_POST['title']);
    $description=htmlentities($_POST['description']);
    $g_no=selectGroupNo();

    if(count($files)==0){
      array_push($errors_for_material,"please choose a file.");
    }
    else{

      $sql_insert_post = "INSERT INTO `post`(`title`, `description`, `stu_group`, `g_no`) VALUES ('$title','$description',null,'$g_no');";
      if(mysqli_query($conn, $sql_insert_post)){
      }
      else{
          array_push($errors_for_material,"Error in post information");
      }  
      /******end post table********/
  
      /*****to find last id in post table*******/
      $sql_last_id="SELECT MAX( p_no ) FROM post;";
      $result = $conn->query($sql_last_id);
      if ($result->num_rows == 1) {
          while($row = $result->fetch_assoc()) {
            $last_id=$row['MAX( p_no )'];
          }
      }
      /***********end find last id******************/
  
      /* for Files Table */
  
      $total_count = count($_FILES['f_name']['name']);
  
      
        for( $i=0 ; $i < $total_count ; $i++ ) {
          $tmpFilePath = $_FILES['f_name']['tmp_name'][$i];
          if ($tmpFilePath != ""){
              $newFileName=time().'_'.$_FILES['f_name']['name'][$i];
              $newFilePath = MAIN_PATH. "/sources/files/" . $newFileName;
              $r=move_uploaded_file($tmpFilePath, $newFilePath);
              if ($r) {
                  $p_no=$last_id;
                  $sql_insert_file = "INSERT INTO `file`(`f_name`, `p_no`) VALUES ('$newFileName',$p_no);";
                  if(mysqli_query($conn, $sql_insert_file)){}
                  else{
                      array_push($errors_for_material,"Error in upload files");
                  } 
              } 
              else {
                  array_push($errors_for_material,"There is an error uploading the file.");
              }
          }
          else{
            array_push($errors_for_material,"There is an error in file tmp.");
          }
        }
        /* end File Table */
    }
    
    if(count($errors_for_material)==0){
      $_SESSION['message']="The post sent successfully";
      header('location: '.BASE_URL.'/UI/teacher/add material.php');
      $conn->close();
      exit();
    }
    else{
      $title=$_POST['title'];
      $description=$_POST['description'];
    }
    
}
/*****************************************************************************/

/*****************************************************************************/
/*****************************add assignment**********************************/



/****to find stu_group*****/
function selectStu_group(){ 
    global $conn; 
    /****to get g_no****/
    if(isset($_GET["g_no"]))
    {
      $g_number = $_GET["g_no"];
    }
    /******************/
 
    $user_id=$_SESSION['user_id'];
 
 
    $sql_select_stu_id = "SELECT  stu_id FROM `student` WHERE student.user_id ='$user_id';";
    $result = $conn->query($sql_select_stu_id);
    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
          $stu_id=$row["stu_id"];
          
        }
    }

    $sql_select_stu_group = "SELECT DISTINCT stu_group FROM `student_group`,groups WHERE student_group.stu_id ='$stu_id' AND student_group.g_no ='$g_number';";
    $result = $conn->query($sql_select_stu_group);
    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
          $stu_group=$row["stu_group"];
           }
    }
     return $stu_group; 

  } 
/***************************/

if(isset($_POST['add_assignment'])){
   unset($_POST['add_assignment']);

   $files = array_filter($_FILES['f_name']['name']);

   /******for Post Table***/
   $title=htmlentities($_POST['title']);
   $description=htmlentities($_POST['description']);
   $stu_group=selectStu_group();

   if(count($files)==0){
    array_push($errors_for_material,"please choose a file.");
  }
  else{
    $sql_insert_post = "INSERT INTO `post`(`title`, `description`, `stu_group`, `g_no`) VALUES ('$title','$description','$stu_group',null);";
    if(mysqli_query($conn, $sql_insert_post)){
    }
    else{
        array_push($errors_for_assignment,"Error in post information");
    }  
      /******end post table********/

      /*****to find last id in post table*******/
      $sql_last_id="SELECT MAX( p_no ) FROM post;";
      $result = $conn->query($sql_last_id);
      if ($result->num_rows == 1) {
          while($row = $result->fetch_assoc()) {
            $last_id=$row['MAX( p_no )'];
          }
      }
      /***********end find last id******************/

    /* for Files Table */
    
    $total_count = count($_FILES['f_name']['name']);

    for( $i=0 ; $i < $total_count ; $i++ ) {
      $tmpFilePath = $_FILES['f_name']['tmp_name'][$i];
      if ($tmpFilePath != ""){
          $newFileName=time().'_'.$_FILES['f_name']['name'][$i];
          $newFilePath = MAIN_PATH. "/sources/files/" . $newFileName;
          $r=move_uploaded_file($tmpFilePath, $newFilePath);
          if ($r) {
              $p_no=$last_id;
              $sql_insert_file = "INSERT INTO `file`(`f_name`, `p_no`) VALUES ('$newFileName',$p_no);";
              if(mysqli_query($conn, $sql_insert_file)){}
              else{
                  array_push($errors_for_assignment,"Error in upload files");
              } 
          } 
          else {
              array_push($errors_for_assignment,"There is an error uploading the file.");
          }
      }
      else{
        array_push($errors_for_assignment,"There is an error in file tmp.");
      }
    }
  }
/* end File Table */

if(count($errors_for_assignment)==0){
  $_SESSION['message']="your assignment sent successfully";
  header('location: '.BASE_URL.'/UI/student/add asignment.php');
  $conn->close();
  exit();
}
else{
  $title=$_POST['title'];
  $description=$_POST['description'];
}

}