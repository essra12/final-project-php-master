<?php
/* include("../path.php");  */
include(MAIN_PATH. "/database/db.php");
$table="user";
$errors = array();

/* Insert  Admin Data*/

$full_name="";
$password="";
$conf_password="";
if(isset($_POST['add_admin'])){

  $exisiting_admin = selectOne($table,['full_name'=>$_POST['full_name']]);
  if($exisiting_admin)
  {
    array_push($errors,"This Admin alredy exists");
  }
  if(count($errors)==0){
    unset($_POST['conf_password'],$_POST['add_admin']);
    $_POST['admin']=1;
    $post_id = insertData($table,$_POST);
    $_SESSION['message']='Admin added successfully';
    header('location: ' . BASE_URL .'/UI/control_panel/admin_control_panel.php');
    $conn->close();
    exit(); 
  }
  else{
    $full_name=$_POST['full_name'];
    $password=$_POST['password'];
    $conf_password=$_POST['conf_password'];
} 
}


/* Delete Admin */
if(isset($_GET['deleteID']))
{

  $deleteAdmin=deleteAdmin($table,$_GET['deleteID']);
  $_SESSION['message']="Admin deleted successfully";
  header('location: '.BASE_URL.'/UI/control_panel/admin_control_panel.php');
  $conn->close();
  exit();
}