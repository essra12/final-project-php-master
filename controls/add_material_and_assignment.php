<?php
include(MAIN_PATH. "/database/db.php");
global $conn;
$errors=array();

/** seesion احضار البيانات باستخدام  */
/* session_start();
$user_id=$_SESSION['user_id']; */

/*****************************Insert  material**********************************/
 function selectGroupNo(){ 
   global $conn; 
   $user_id=$_SESSION['user_id'];

   $sql_select_tr_id = "SELECT  tr_id FROM `teacher` WHERE teacher.user_id =$user_id;";
   $result = $conn->query($sql_select_tr_id);
   if ($result->num_rows == 1) {
       while($row = $result->fetch_assoc()) {
         $tr_id=$row["tr_id"];
       }
   }
   dd($tr);
 } 

if(isset($_POST['add_material'])){
   unset($_POST['add_material']);

   /* for Post Table */
    $title=$_POST['title'];
    $description=$_POST['description'];

    //////////
    $g_no=78;
    /////////

    $sql_insert_post = "INSERT INTO `post`(`title`, `description`, `stu_group`, `g_no`) VALUES ('$title','$description',null,'$g_no');";
    if(mysqli_query($conn, $sql_insert_post)){
    }
    else{
        array_push($errors,"Error in post information");
    }  
    /*******************/

    /* for Files Table */
    $files = array_filter($_FILES['f_name']['name']);
    $total_count = count($_FILES['f_name']['name']);

 
    for( $i=0 ; $i < $total_count ; $i++ ) {
    $tmpFilePath = $_FILES['f_name']['tmp_name'][$i];
    if ($tmpFilePath != ""){
        $newFileName=time().'_'.$_FILES['f_name']['name'][$i];
        $newFilePath = MAIN_PATH. "/sources/files/" . $newFileName;

        $r=move_uploaded_file($tmpFilePath, $newFilePath);
        if ($r) {
            $p_no='LAST_INSERT_ID()';
            $sql_insert_file = "INSERT INTO `file`(`f_name`, `p_no`) VALUES ('$newFileName',$p_no);";
            if(mysqli_query($conn, $sql_insert_file)){
            }
            else{
                array_push($errors,"Error in upload files");
            } 
        } 
        else {
            array_push($errors,"There is an error uploading the file.");
        }
    }
    else{
      array_push($errors,"There is an error in file tmp.");
    }
}

}


/*****************************add assignment**********************************/
if(isset($_POST['add_assignment'])){
   unset($_POST['add_assignment']);

   /* for Post Table */
   $title=$_POST['title'];
   $description=$_POST['description'];

   //////////
   $stu_group=2;
   /////////

   $sql_insert_post = "INSERT INTO `post`(`title`, `description`, `stu_group`, `g_no`) VALUES ('$title','$description',$stu_group,null);";
   if(mysqli_query($conn, $sql_insert_post)){
   }
   else{
       array_push($errors,"Error in post information");
   }  
   /*******************/


   /* Files */
   $files = array_filter($_FILES['f_name']['name']);
   // Count the number of uploaded files in array
   $total_count = count($_FILES['f_name']['name']);
   // Loop through every file
   for( $i=0 ; $i < $total_count ; $i++ ) {
      //The temp file path is obtained
      $tmpFilePath = $_FILES['f_name']['tmp_name'][$i];
      //A file path needs to be present
      if ($tmpFilePath != ""){
         //Setup our new file path
         $newFileName=time().'_'.$_FILES['f_name']['name'][$i];
         $newFilePath = BASE_URL. "/sources/files/" . $newFileName;
   
         move_uploaded_file($tmpFilePath, $newFilePath);
      }
   }
   /* end Files */
   
   }