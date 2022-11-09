<?php 
include("path.php"); 
include(MAIN_PATH."/controls/login_path.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\login_and_singup.css" type="text/css"/>
    <script src="JavaScript\check.js"></script> 
    <title>login</title>

  
</head>
<body>
   
   
    <div class="login-container">
    <div class="circle-container"> 
    <div class="main_circle"></div>
    <img class="imagelogo" id="image" src="sources\image\singup-image.png" alt="no image"/>
    </div>
        <p class="main_text"><b>Welcome</b><br>Back! </p>
        <form method="post" action="" class="login-form" >
            <div class="form-field ">
                <input id="username" name="username" type="text"  placeholder="Full Name" size="27" maxlength="30"/>
                <div class="error"></div>
            </div>
              
            <div class="form-field">
                <input id="pass" name="pass" type="password" placeholder="Password" maxlength="25"/> 
                <div class="error"></div> 
            </div>
                
            <button type="submit" id="submit" name="submit" onclick="check_Enter()">Login</button>
        </form>
        <div class="additional-action">
            <p>Create an account <b><u>Singup</u></b></p>
        </div>
    </div>
    <form>

        <?php 
          if(isset($_POST['submit'])){
            global $conn;
                $fullname = mysqli_real_escape_string($conn,$_POST['username']);
                $password = mysqli_real_escape_string($conn,$_POST['pass']);
            
                if ($fullname != "" && $password != ""){

                    $sql_query = "SELECT full_name,password  FROM `user` WHERE full_name='".$fullname."' and password='".$password."'";
                    $result = mysqli_query($conn,$sql_query);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count = mysqli_num_rows($result);  
                    
                    if($count == 1){
                        $_SESSION['fullname'] = $fullname; 
                         header('Location: UI/group/main page for group.php'); 
                    }else{
                        header('Location: login.php');
                        $message_error = "The username or password is wrong!";
                    }
            
                }
            
            }
        
        ?>
    

</body>
</html>

