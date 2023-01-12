<?php


include("../../database/db.php");
global $conn;
$errors = array();
$table2='teacher';
/** seesion احضار البيانات باستخدام  */
  /*session_start();*/
$name= $_SESSION['name'];
$phon=$_SESSION['phone'];
$password=$_SESSION['pass'];/**كلمة السر مشفرة  */



/***************************** to get password for teacher -----> Database ************************************ */
$Tid= $_SESSION['tid'];/**to get teacher id  */
global $conn; 
$query="SELECT user.password FROM `user`,teacher WHERE user.user_id=teacher.user_id and teacher.tr_id='$Tid';";
$result = $conn->query($query);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  $passwordTR=$row['password'];/**قيمة كلمة المرور التي تم احضارها من قاعدة البيانات وهي مشفرة  */
}} 
/*
if(isset($_POST["pass"]))
{
 $userp1=$_POST["pass"];
}
      
      if (password_verify($userp1, $passwordTR)) {
        echo $_SESSION['pass3']=$userp1;
    } else {
        echo 'Invalid password.';
    }
*/

/******************************************************************************************************* */
$pass=$_SESSION['pass3'];/**كلمة مرور غير مشفرة */
$img1=$_SESSION['img1'];/**-----------profile admin  احضار الصورة من ----------- */
$error ="";


if($_SERVER['REQUEST_METHOD']=='POST')
{ 
    $p_new=trim($_POST['phone']);
    if($phon!=$p_new){
        $exisiting_teachera = selectOne($table2,['tr_phone_no'=>$_POST['phone']]);
        if($exisiting_teachera)
        {
            array_push($errors,"This Teacher  alredy exists");
        }else{
       /* user Image */
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
 
if(count($errors)==0){
    /** حفظ القيم المدخلة في المتغيرات */
    $username = $_POST['name'];
    $phone = $p_new;
    $userp1 =$_POST['pass'];/**edit profile page  داخل  password  القيمة المدخلة في حقل  */
    $userp2 =$_POST['cof-pass'];/**edit profile page  داخل  confirm_password  القيمة المدخلة في حقل  */

    $userpass1=password_hash($_POST['pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
    $userpass2=password_hash($_POST['cof-pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
    $img=$_POST['u_img'];

   /** empty التحقق من حقول الادخال باستحدام  */
    if(empty($username)) 
   {   
       $error="* please enter  your name    "; 
   }else if(empty($phone)) 
   {   
       $error="* please enter  your phone   "; 
   }else if(empty($userp1)) 
   {   
       $error="* please enter  your password  "; 
   }else if(empty($userp2))
   {   
       $error="* please enter  your password again  "; 
   }
   else
   {
        $sqln="UPDATE user,teacher set   user.full_name='$username', user.password='$userpass1',teacher.tr_phone_no='$phone',user.u_img='$img'
        WHERE user.user_id=teacher.user_id and teacher.tr_phone_no='$phon' ;";
        if(mysqli_query($conn,$sqln)){
        ?>
        <script >
        window.location.href="../group/main page for group.php" </script>
        <?php 
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
    }}
    }}
    
    else {

       /* user Image */
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
     
    if(count($errors)==0){
        /** حفظ القيم المدخلة في المتغيرات */
        $username = $_POST['name'];
        $phone = $p_new;
        $userp1 =$_POST['pass'];/**edit profile page  داخل  password  القيمة المدخلة في حقل  */
        $userp2 =$_POST['cof-pass'];/**edit profile page  داخل  confirm_password  القيمة المدخلة في حقل  */
        $userpass1=password_hash($_POST['pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
        $userpass2=password_hash($_POST['cof-pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
        $img=$_POST['u_img'];
    
       /** empty التحقق من حقول الادخال باستحدام  */
      /** empty التحقق من حقول الادخال باستحدام  */
    if(empty($username)) 
   {   
       $error="* please enter  your name   "; 
   }else if(empty($phone)) 
   {   
       $error="* please enter  your phone   "; 
   }else if(empty($userp1)) 
   {   
       $error="* please enter  your password  "; 
   }else if(empty($userp2))
   {   
       $error="* please enter  your password again  "; 
   }else if($userp1!=$userp2)
   {   
       $error="* Password does not match  "; 
   }
   else
   {
            $sqln="UPDATE user,teacher set   user.full_name='$username', user.password='$userpass1',teacher.tr_phone_no='$phone',user.u_img='$img'
            WHERE user.user_id=teacher.user_id and teacher.tr_phone_no='$phon' ;";
            if(mysqli_query($conn,$sqln)){                
            ?>
            <script >
            window.location.href="../group/main page for group.php" </script>
            <?php 
          
            } else {
            echo "Error updating record: " . mysqli_error($conn);
            }}}
        }}
?>

