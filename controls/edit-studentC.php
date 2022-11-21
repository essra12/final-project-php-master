<?php 

global $conn;



session_start();
/** seesion احضار البيانات باستخدام  */
$id= $_SESSION['id'];
$name=$_SESSION['name'];
$spe=$_SESSION['spe'];
$password=$_SESSION['pass'];
$img=$_SESSION['img'];


/** حفظ القيم المدخلة في المتغيرات */
$error ="";
if($_SERVER['REQUEST_METHOD']=='POST')
{   $userID= $_POST['id'];
    $username = $_POST['name'];
    $specialization=$_POST['spe'];
    $userpass1 =sha1( $_POST['pass']);/** password  encryption */
    $userpass2 = sha1($_POST['cof-pass']);/** password  encryption */
    

   /** empty التحقق من حقول الادخال باستحدام  */
     if(empty($username)) 
    {   
        $error="* please enter your  name "; 
    } 
    else if(empty($specialization)) 
    {   
        $error="* please enter  specialization "; 
    } else if(empty($userpass1)) 
    {   
        $error="* please enter your password "; 
    } else if(empty($userpass2)) 
    {   
        $error="* please enter  password again "; 
    }
    else  if($userpass1 != $userpass2) 
    {
        $error="* Password is not matching  "; 
    }if(empty($userID)) 
    {   
        $error="* please enter your  ID "; 
    }
    else 
    {
       /** update statment  */
       

        $sqln="UPDATE user,student set student.stu_id=$userID, student.stu_specialization='$specialization', user.full_name='$username', user.password='$userpass1'
        WHERE user.user_id=student.user_id and student.stu_id=$id;";
        if(mysqli_query($conn,$sqln)){
        echo '<script type="text/javascript">alert("Record updated successfully .")</script>';
        ?>
        <script type="text/javascript">
            
        window.location.href="student-profile.php" </script>
        <?php 
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
        }
    
    
    
      /* user Image */
      if (!empty($_FILES['u_img']['name'])) {
        $imgName= time() .'_' . $_FILES['u_img']['name'];// تُرجع الدالة الوقت الحالي بعدد الثواني منذ ذلك الحين time() ،  HTTP POST عبارة عن مصفوفة ارتباطية تحتوي على عناصر تم تحميلها عبر طريقة $_FILES
        
        $imgPath= " ../../sources/image/" .$imgName;
        
        $r= move_uploaded_file($_FILES['u_img']['tmp_name'],$imgPath); // تعمل الدالة  على نقل الملف الذي تم تحميله إلى وجهة جديدة.

        if ($r) {
            $_POST['u_img']=$imgName;
        } 
        else {
            array_push($errors,"There is an error uploading the image.");
        }
    }
    else if (empty($_FILES['u_img']['name'])) {
        $_POST['u_img']='blue_rectangle_with_user.JPG';
    }

    /*****************/
    }



?>