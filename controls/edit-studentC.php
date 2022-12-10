<?php 
include("../../database/db.php");

global $conn;
$errors = array();
$table2='student';


/*session_start();*/
/**  _SESSION باستخدام  profile page  احضار البيانات  من */
$id= $_SESSION['id'];
$name=$_SESSION['name'];
$spe=$_SESSION['spe'];
$password=$_SESSION['pass'];
$pass=$_SESSION['pass2'];/**كلمة مرور غير مشفرة */
$img1=$_SESSION['img1'];/**-----------profile admin  احضار الصورة من ----------- */


$error ="";
if($_SERVER['REQUEST_METHOD']=='POST')
{ 
    if($id!=$_POST['id']){
    $exisiting_teacher = selectOne($table2,['stu_id'=>$_POST['id']]);
    if($exisiting_teacher)
    {
        array_push($errors,"This Student alredy exists");
    }
    else{
        
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
/** /** حفظ القيم المدخلة في المتغيرات */
 
if(count($errors)==0){
    
    $userID= $_POST['id'];/** edit profile  في  id القيمة المدخلة في حقل  */
    $username = $_POST['name'];
    $specialization=$_POST['spe'];
    $userp1 =$_POST['pass'];/**edit profile page  داخل  password  القيمة المدخلة في حقل  */
    $userp2 = $_POST['cof-pass'];/**edit profile page  داخل  confirm_password  القيمة المدخلة في حقل  */
    
    $userpass1=password_hash($_POST['pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
    $userpass2=password_hash($_POST['cof-pass'], PASSWORD_DEFAULT);//password عمل تشفير لل

    
    $img=$_POST['u_img'];

      if(empty($specialization)) 
    {   
        $error="* please enter  specialization "; 
    }
    else
    {
    /*****************/
       /** update statment  */
        $sqln="UPDATE user,student set student.stu_id=$userID, student.stu_specialization='$specialization', user.full_name='$username', user.password='$userpass1',user.u_img='$img'
        WHERE user.user_id=student.user_id and student.stu_id=$id;";
        if(mysqli_query($conn,$sqln)){
        echo '<script type="text/javascript">alert("Record updated successfully .")</script>';
        ?>
        <script type="text/javascript">
            
        window.location.href="../group/main page for group.php" </script>
        <?php 
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
    }}
    }}

    else {

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
/** /** حفظ القيم المدخلة في المتغيرات */
 
if(count($errors)==0){
    
    $userID= $_POST['id'];/** edit profile  في  id القيمة المدخلة في حقل  */
    $username = $_POST['name'];
    $specialization=$_POST['spe'];
    $userp1 =$_POST['pass'];/**edit profile page  داخل  password  القيمة المدخلة في حقل  */
    $userp2 = $_POST['cof-pass'];/**edit profile page  داخل  confirm_password  القيمة المدخلة في حقل  */
    
    $userpass1=password_hash($_POST['pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
    $userpass2=password_hash($_POST['cof-pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
  

  /*
    $userpass1 =sha1( $_POST['pass']);/** password  encryption */
  /*  $userpass2 = sha1($_POST['cof-pass']);/** password  encryption */
    
    $img=$_POST['u_img'];

   /** empty التحقق من حقول الادخال باستحدام  */
    
    
      if(empty($specialization)) 
    {   
        $error="* please enter  specialization "; 
    }
    else
    {
    /*****************/
       /** update statment  */
        $sqln="UPDATE user,student set student.stu_id=$userID, student.stu_specialization='$specialization', user.full_name='$username', user.password='$userpass1',user.u_img='$img'
        WHERE user.user_id=student.user_id and student.stu_id=$id;";
        if(mysqli_query($conn,$sqln)){
        echo '<script type="text/javascript">alert("Record updated successfully .")</script>';
        ?>
        <script type="text/javascript">
            
        window.location.href="../group/main page for group.php" </script>
        <?php 
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }}}
    }}
    



?>