<?php

include("../../Database/Connection.php");  
global $conn;

/** seesion احضار البيانات باستخدام  */
session_start();
$name= $_SESSION['name'];
$phon=$_SESSION['phone'];
$password=$_SESSION['pass'];

/** حفظ القيم المدخلة في المتغيرات */
$error ="";
if($_SERVER['REQUEST_METHOD']=='POST')
{   $username = $_POST['name'];
    $phone = $_POST['phone'];
    $userpass1 = $_POST['pass'];
    $userpass2 = $_POST['cof-pass'];

   /** empty التحقق من حقول الادخال باستحدام  */
   if(empty($username)) 
    {
        $error="* please enter your name   ";
       
    }else  if(empty($phon)) 
    {
        $error="* please enter your phone number  "; 
    } else  if(empty($userpass1)) 
    {
        $error="* please enter your password   ";
       
    }else
   if(empty($userpass2)) 
    {
        $error="* please enter password again  ";
       
    }else  if($userpass1 != $userpass2) 
    {
        $error="* Password is not matching  "; 
    }
    else 
    {
      
        $sqln="UPDATE user,teacher set   user.full_name='$username', user.password='$userpass1',teacher.tr_phone_no=$phone
        WHERE user.user_id=teacher.user_id and teacher.tr_phone_no=$phon ;";
        if(mysqli_query($conn,$sqln)){
        echo '<script type="text/javascript">alert("Record updated successfully .")</script>';
        ?>
        <script type="text/javascript">
        window.location.href="profile teacher.php" </script>
        <?php 
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
        }}

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


?>

