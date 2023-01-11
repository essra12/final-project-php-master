<?php
include("../../Database/Connection.php");  
global $conn;


session_start();
$name= $_SESSION['name'];
$password=$_SESSION['pass'];
$pass=$_SESSION['pass2'];/**كلمة مرور غير مشفرة */
$img1=$_SESSION['img1'];/**-----------profile admin  احضار الصورة من ----------- */
$error ="";
if($_SERVER['REQUEST_METHOD']=='POST')
{


      /*---------------------- user Image--------------------------------- */
   if (!empty($_FILES['u_img']['name'])) {
    $imgName= time() .'_' . $_FILES['u_img']['name'];// تُرجع الدالة الوقت الحالي بعدد الثواني منذ ذلك الحين time() ،  HTTP POST عبارة عن مصفوفة ارتباطية تحتوي على عناصر تم تحميلها عبر طريقة $_FILES
    
    $imgPath= "../../sources/image/" .$imgName;
    
    $r= move_uploaded_file($_FILES['u_img']['tmp_name'],$imgPath); // تعمل الدالة  على نقل الملف الذي تم تحميله إلى وجهة جديدة.

    if ($r) {
        $_POST['u_img']=$imgName;
    } 
    else {
        array_push($errors,"There is an error uploading the image.");
    }
}
else if (empty($_FILES['u_img']['name'])) {
    $_POST['u_img']=$img1;/** profile admin  وضع الصورة التي تم احضارها من   */
}

/**************/

    $username = $_POST['name'];
    $userp1 =$_POST['pass'];/**edit profile page  داخل  password  القيمة المدخلة في حقل  */
    $userp2 =$_POST['cof-pass'];/**edit profile page  داخل  confirm_password  القيمة المدخلة في حقل  */
    $userpass1=password_hash($_POST['pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
    $userpass2=password_hash($_POST['cof-pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
    $img=$_POST['u_img'];

    
    if(empty($username)) 
    {   
        $error="* please enter  your name   "; 
    }else if(empty($userp1)) 
    {   
        $error="* please enter  your password   "; 
    }else if(empty($userp2)) 
    {   
        $error="* please enter  your password again  "; 
    }else if($userp1!=$userp2)
    {   
        $error="* Password does not match  "; 
    }
    else
    {

    $sqln="UPDATE user set user.full_name='$username' ,user.password='$userpass1', user.u_img='$img' WHERE user.full_name='$name';";


        if(mysqli_query($conn,$sqln)){
        ?>
        <script >
        window.location.href="../control_panel/groups_control_panel.php" </script>
        <?php 
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
        }
}
/** UI/control_panel/groups_control_panel.php */


?>