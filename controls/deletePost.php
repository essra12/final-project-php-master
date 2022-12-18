<?php
include(MAIN_PATH. "/database/db.php");


global $conn;

if(isset($_GET['deletePost'])){

    {
    
      $deletefile=deleteFileBy_p_no($_GET['deletePost']);
      $deletepost=deletePostBy_p_no($_GET['deletePost']);
      $_SESSION['message']="post deleted successfully"; 
  
    
    } 
   } 
?>