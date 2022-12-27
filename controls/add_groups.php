<?php
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");
$table="groups";
$groupNumber=$_SESSION['g_no'];
$errors = array();
global $conn;

/***to get tr_id****/
$query="SELECT teacher.tr_id FROM teacher,groups WHERE teacher.tr_id=groups.tr_id and groups.g_no='$groupNumber';";
  $result = $conn->query($query);
  if ($result->num_rows == 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $tr_id=$row['tr_id'];
     
    }
  } 

/*************************Insert Group Data************************/
$new_g_name=""; 
if(isset($_POST['add_group'])){
   $exisiting_group = selectOne($table,['g_name'=>$_POST['g_name'],'tr_id'=>$tr_id]);
   if($exisiting_group)
   {
       array_push($errors,"This Group alredy exists");
   }
   
   if(count($errors)==0){
       unset($_POST['add_group']);
       $_POST['tr_id']=$tr_id;
       $post_id = insertData($table,$_POST);    
       $_SESSION['message']='Group created successfully';
       header('location: ' . BASE_URL .'/UI/group/main page for group.php');// يتم إستخدام هذه الدالة  من أجل نقل أو تحويل المستخدم للمكان الذي نُريده
       $conn->close();
       exit(); 
   }
   else{
       $new_g_name=$_POST['g_name'];
   } 
}