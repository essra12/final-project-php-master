<?php 
include("../../database/db.php");

global $conn;
$errors = array();
/*$Sid= $_SESSION['id'];*/
$password= $_SESSION['pass'];
$error ="";


if (isset($_POST['editpass'])) { 
$Sid= $_SESSION['id'];/**to get student id  */

$passwordPost=$_POST['pass1'];/**password in inpute  */
$userpass1=$_POST['pass'];//password عمل تشفير لل
$userpass2=$_POST['cof-pass'];//password عمل تشفير لل
/*if(empty($passwordPost)) 
{   
    $error="* Please Enter  Your password "; 
}else 
   if(empty($userpass1)) 
 {   
     $error="* please Enter   Your new password "; 
 }else   if(empty($userpass2)) 
 {   
     $error="* Please Enter  Your new password again "; 
 }else */
 if (count($errors) == 0) {
    if(password_verify($passwordPost,$password)){
        $userpass1=password_hash($_POST['pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
        $userpass2=password_hash($_POST['cof-pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
       /** update statment  */
        $sqln="UPDATE user,student set  user.password='$userpass1'
        WHERE user.user_id=student.user_id and student.stu_id=$Sid;";
        if(mysqli_query($conn,$sqln)){
        ?>
        <script type="text/javascript">        
        window.location.href="../group/main page for group.php" </script>
        <?php 
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
    }else 
array_push($errors,"the password not matched");
 }}





 
if (isset($_POST['editTeachepass'])) { 
    $phon=$_SESSION['phone'];

    $passwordPost=$_POST['pass1'];/**password in inpute  */
    $userpass1=$_POST['pass'];//password عمل تشفير لل
    $userpass2=$_POST['cof-pass'];//password عمل تشفير لل
     if (count($errors) == 0) {
        if(password_verify($passwordPost,$password)){
            $userpass1=password_hash($_POST['pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
            $userpass2=password_hash($_POST['cof-pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
        
        
           /** update statment  */
            $sqln="UPDATE user,teacher set  user.password='$userpass1'
            WHERE user.user_id=teacher.user_id and teacher.tr_phone_no='$phon' ;";
            if(mysqli_query($conn,$sqln)){
            ?>
            <script type="text/javascript">        
            window.location.href="../group/main page for group.php" </script>
            <?php 
            } else {
            echo "Error updating record: " . mysqli_error($conn);
            }
        }else 
    array_push($errors,"the password not matched");
     }}


     
 
if (isset($_POST['editpassfotadmin'])) { 
$id= $_SESSION['idA'];
    $passwordPost=$_POST['pass1'];/**password in inpute  */
    $userpass1=$_POST['pass'];//password عمل تشفير لل
    $userpass2=$_POST['cof-pass'];//password عمل تشفير لل
     if (count($errors) == 0) {
        if(password_verify($passwordPost,$password)){
            $userpass1=password_hash($_POST['pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
            $userpass2=password_hash($_POST['cof-pass'], PASSWORD_DEFAULT);//password عمل تشفير لل
        
           /** update statment  */
            $sqln="UPDATE user set user.password='$userpass1' WHERE user.user_id='$id';";
            if(mysqli_query($conn,$sqln)){
            ?>
            <script type="text/javascript">        
            window.location.href="../control_panel/groups_control_panel.php" </script>
            <?php 
            } else {
            echo "Error updating record: " . mysqli_error($conn);
            }
        }else 
    array_push($errors,"the password not matched");
     }}
    
     
 
?>