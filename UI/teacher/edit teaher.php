<?php
include("../../Database/Connection.php");  
global $conn;


if(isset($_GET['name']))
{
    $name= $_GET['name'];
}
if(isset($_GET['phone']))
{
    $phon= $_GET['phone'];
}
if(isset($_GET['password']))
{
    $password= $_GET['password'];
}



$error ="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username = $_POST['name'];
    $phone = $_POST['phone'];
    $userpass1 = $_POST['pass'];
    $userpass2 = $_POST['cof-pass'];

   if(empty($userpass2)) 
    {
        $error="* please enter password again  ";
       
    }else  if($userpass1 != $userpass2) 
    {
        $error="* Password is not matching  "; 
    }
    else {

$sqln="UPDATE user , teacher set   user.full_name=$username, teacher.tr_phone_no=$phone, user.password=$userpass1  WHERE user.user_id=teacher.user_id and teacher.tr_phone_no=$phon ;";
        if(mysqli_query($conn,$sqln)){
        echo '<script type="text/javascript">alert("Record updated successfully .")</script>';
        ?>
        <script type="text/javascript">
        window.location.href="profile teacher.php" </script>
        <?php 
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
        }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--using th same login and signup css page with addtional-->
    <link rel="stylesheet" href="../../CSS/login_and_singup.css"/>
    <title>Edit Profile</title>
</head>
<body class="body" >
<!--using the same signup form for edit profile-->
<div class="login_container_edit">
    <div class="circle-container"> 
    <div class="main_circle"></div>
    <img class="imagelogo_edit" src="..\..\sources\image\user-weman.png" alt="no image"/>
    <h5>Edit photo</h5>
    </div>
        <p class="main_text_edit"><b>Profile</b></p>
        <form class="login-form"  method="post">
        
        <div class="form-field-signup">
            <input id="username" name="name" type="text"  placeholder="Full Name"  value="<?php  echo $name  ?>"  maxlength="30" />
        </div>

        <div class="form-field-signup">
        <input id="phone" name="phone" type="text"  placeholder="Phone"  value="<?php  echo $phon  ?>" maxlength="25" />
       </div>
          
          <div class="form-field-signup">
            <input id="pass" name="pass" type="password" placeholder="Password"  value="<?php  echo $password  ?>" maxlength="25" />  
         </div>
         <div class="form-field-signup">
          <input id="pass2" name="cof-pass" type="password" placeholder="Confrim Password" value="<?php  echo $password  ?>" maxlength="25"/>  
         </div> 
         
         <div class="error"> 
                   <?php echo $error ?>
                </div>
                
        <button type="submit" name="bts" onclick="check_Enter()" > Save</button>

            
    </form>
   

    <script>
               //check inputs !

                function check_Enter() {
                const NAME = document.getElementById("username").value;
                const phone=document.getElementById("phone").value;
                const pass = document.getElementById("pass").value;
                const pass2=document.getElementById("pass2").value;
              
                
                if(NAME==""){
                alert(" pleas enter name");
                return false
                }
                
                if(phone==""){
                alert(" pleas enter phone ");
                return false
                }
                else if(pass==""){
                alert("    pleas enter password ");
                return false
                
                }
                if(pass2==""){
                alert(" pleas enter password again");
                return false
                }
            
                }
                </script>
    
</body>
</html>