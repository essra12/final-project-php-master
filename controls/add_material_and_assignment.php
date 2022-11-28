<?php

include(MAIN_PATH. "/database/db.php");
global $conn;

/** seesion احضار البيانات باستخدام  */
/* session_start();
$user_id=$_SESSION['user_id']; */

/*****************************Insert  material**********************************/
if(isset($_POST['add_material'])){
   unset($_POST['add_material']);

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
      $newFilePath = MAIN_PATH. "/sources/files/" . $newFileName;

      $r=move_uploaded_file($tmpFilePath, $newFilePath);
      if ($r) {
         $_POST['f_name']=$newFileName;
     } 
     else {
         array_push($errors,"There is an error uploading the file.");
     }
   }
}


/* end Files */
}

/*****************************add assignment**********************************/
if(isset($_POST['add_assignment'])){
   unset($_POST['add_material']);


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
         $newFilePath = MAIN_PATH. "/sources/files/" . $newFileName;
   
         $r=move_uploaded_file($tmpFilePath, $newFilePath);
         if ($r) {
            $_POST['f_name']=$newFileName;
        } 
        else {
            array_push($errors,"There is an error uploading the file.");
        }
      }
   }
   /* end Files */
   
   }