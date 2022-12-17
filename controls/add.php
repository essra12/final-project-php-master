<html>
  <head>
    <script src="../javaScript/test.js"></script> 
  </head>
<body>
<?php
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");
global $conn;
$errors_for_material=array();
$errors_for_assignment=array();
$title="";
$description="";

$groupNumber=$_SESSION['g_no'];


/*****************************************************************************/
/*****************************Insert  material*******************************/

if(isset($_POST['add_material'])){
   unset($_POST['add_material']); 

  

   $files = array_filter($_FILES['f_name']['name']);

   /******for Post Table*********/
    $title=htmlentities($_POST['title']);
    $description=htmlentities($_POST['description']);
    $g_no=$groupNumber;

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
      header('location: '.BASE_URL.'/UI/student/materials.php');
      $conn->close();
      exit();
    
    } 
    else{
      $title=$_POST['title'];
      $description=$_POST['description'];
    }
    
}
?>
</body>
</html>
  