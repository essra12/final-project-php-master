<?php
include(MAIN_PATH. "/database/db.php");



function selectAllfiles()  
{global $conn;
  $group_no=$_SESSION['g_no'];
  /*******************************************************/
  $sql = "SELECT * FROM post where g_no='$group_no' ORDER BY Datatime DESC";
  $pre=$conn->prepare($sql);
  $pre->execute();
  $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

if(isset($_GET['deletePost'])){

    {
    
      $deletefile=deleteFileBy_p_no($_GET['deletePost']);
      $deletepost=deletePostBy_p_no($_GET['deletePost']);
      $_SESSION['message']="post deleted successfully"; 
  
    
    } 
   } 
?>