<?php
include(MAIN_PATH. "/database/db.php");
/* $newFilePath = MAIN_PATH. "/sources/files/"; */



global $conn;
$role=$_SESSION['role'];
$post=$_SESSION['p_no'];
$query="SELECT * FROM post,file WHERE post.p_no=file.p_no AND post.p_no='".$post."'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

  $title=$row['title'];
  $des=$row['description'];

}
} 
/************************************************************************/
/**********************download section*********************************/

if(isset($_GET['file']))
 {
    global $conn;
     $id =$_GET['file'];
     $sql="SELECT * FROM file WHERE f_no=$id";
     $result = $conn->query($sql);
     $file =$result -> fetch_assoc();
    
      $filepath='../../sources/files/'.$file['f_name'];
    
      if(file_exists($filepath))
      {
        header('Content-Type: application/octet-stream');
        header ('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.basename($filepath));
        header ('Expires: 0');
         header('Cache-Control: must-revalidate');
        header ('Pragma: public');
        header ('Content-Length:'.filesize($filepath)); 
        ob_clean(); 
        @readfile($filepath); 
        exit;
      
      }    

 }
 if(isset($_GET['delete']))
 {
    global $conn;
      $id =$_GET['delete'];
     $sql="SELECT * FROM file WHERE f_no=$id";
     $result = $conn->query($sql);
     $file =$result -> fetch_assoc();
    
      $filepath='../../sources/files/'.$file['f_name'];
    
      if(file_exists($filepath))
      {
        $sqll="SELECT * FROM file WHERE p_no=$post";
        $result = $conn->query($sqll);
        $row =mysqli_num_rows($result);
        if($row >1){
          unlink($filepath);  
          $sql="DELETE  FROM file WHERE f_no=$id";
          $res=$conn->query($sql);
          $_SESSION['message']="File deleted successfully";
       
        }
      else if($row == 1){
        $_SESSION['error_message']="you should delete the whole post";
        } 
         
        }  
       
 } 

        
        






