<?php 

global $conn;



session_start();
/** seesion احضار البيانات باستخدام  */
$id= $_SESSION['id'];
$name=$_SESSION['name'];
$spe=$_SESSION['spe'];
$password=$_SESSION['pass'];

/** حفظ القيم المدخلة في المتغيرات */
$error ="";
if($_SERVER['REQUEST_METHOD']=='POST')
{   $userID= $_POST['id'];
    $username = $_POST['name'];
    $specialization=$_POST['spe'];
    $userpass1 = $_POST['pass'];
    $userpass2 = $_POST['cof-pass'];
   

   /** empty التحقق من حقول الادخال باستحدام  */
   if(empty($userID)) 
    {   
        $error="* please enter your  ID "; 
    } else if(empty($username)) 
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
        }}
?>