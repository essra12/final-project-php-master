<?php
/* include("../path.php");  */
include(MAIN_PATH. "/database/db.php");
$table="user";
$errors = array();
global $conn;
$full_name="";
$password="";
$conf_password="";


/******************Insert  Admin Data******************/
if(isset($_POST['add_admin'])){

  $exisiting_admin = selectOne($table,['full_name'=>$_POST['full_name']]);
  if($exisiting_admin)
  {
    array_push($errors,"This Admin alredy exists");
  }

  /* user Image */
  if (!empty($_FILES['u_img']['name'])) {
    $imgName= time() .'_' . $_FILES['u_img']['name'];// تُرجع الدالة الوقت الحالي بعدد الثواني منذ ذلك الحين time() ،  HTTP POST عبارة عن مصفوفة ارتباطية تحتوي على عناصر تم تحميلها عبر طريقة $_FILES
    
    $imgPath=MAIN_PATH. "/sources/image/" .$imgName;
    
    $r= move_uploaded_file($_FILES['u_img']['tmp_name'],$imgPath); // تعمل الدالة  على نقل الملف الذي تم تحميله إلى وجهة جديدة.

    if ($r) {
        $_POST['u_img']=$imgName;
    } 
    else {
        array_push($errors,"There is an error uploading the image.");
    }
  }
  else if (empty($_FILES['u_img']['name'])) {
    $_POST['u_img']='create_add_photo.png';
   }

  /*****************/

  if(count($errors)==0){  
    unset($_POST['conf_password'],$_POST['add_admin']);
    $_POST['role']='admin';
    $_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);//password عمل تشفير لل
    
    $post_id = insertData($table,$_POST);
    
    /*succes message */
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


/***********************Delete Admin***********************/
if(isset($_GET['deleteID']))
{
  $deleteAdmin=deleteAdmin($table,$_GET['deleteID']);
  $_SESSION['message']="Admin deleted successfully";
  header('location: '.BASE_URL.'/UI/control_panel/admin_control_panel.php');
  $conn->close();
  exit();
} 
