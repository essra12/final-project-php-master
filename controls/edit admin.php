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
    $userpass1 = $_POST['pass'];
    $userpass2 = $_POST['cof-pass'];
    if(empty($username)){
       $error="   *  please enter your name ";

    }else
    if($userpass1 != $userpass2) 
    {
        $error="* Password is not matching  "; 

    }
    else {

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

?>