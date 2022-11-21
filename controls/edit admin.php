<?php
include("../../Database/Connection.php");  
global $conn;


session_start();
$name= $_SESSION['name'];
$password=$_SESSION['pass'];


$error ="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username = $_POST['name'];
    $userpass1 =sha1( $_POST['pass']);/** password  encryption */
    $userpass2 = sha1($_POST['cof-pass']);/** password  encryption */
   
    if($userpass1 != $userpass2) 
    {
        $error="* Password is not matching  "; 

    }
    else  if(empty($username)){
        
        $error="   *  please enter your name ";
 
     }else {

    $sqln="UPDATE user set user.full_name='$username' ,user.password='$userpass1' WHERE user.full_name='$name';";


        if(mysqli_query($conn,$sqln)){
        echo '<script type="text/javascript">alert("Record updated successfully .")</script>';
        ?>
        <script type="text/javascript">
        window.location.href="admin profile.php" </script>
        <?php 
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
        }
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
?>