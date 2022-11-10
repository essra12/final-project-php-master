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
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>login</title>

  
</head>
<body>
   
    <div class="login-container">
    <div class="circle-container"> 
    <div class="main_circle"></div>
    <img class="imagelogo" id="image" src="sources\image\singup-image.png" alt="no image"/>
    </div>
        <p class="main_text"><b>Welcome</b><br>Back! </p>
        <form method="post" action="" class="login-form"  onsubmit="return check_Enter(this)">

       
            <div class="form-field ">
                <input id="username" name="username" type="text"  placeholder="Full Name" size="27" maxlength="30"  value="<?php echo $fullname;?>"/>
            </div>
              
            <div class="form-field">
                <input id="pass" name="pass" type="password" placeholder="Password" maxlength="25" /> 
            </div>


          <?php if(count($errors)> 0): ?>
                    <div class="error" style="color: #D92A2A;padding_right=30px "> 
                     <?php foreach($errors as $error): ?>
                        <li style="list-style-type: none; " ><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 16px;"></i><?php echo($error); ?></li>
                     <?php endforeach; ?>
                    </div> 
          <?php endif; ?> 
                
         <button type="submit" id="submit" name="submit">Login</button>
        </form>
        <div class="additional-action">
            <p>Create an account <b><u>Singup</u></b></p>
        </div>
    </div>
    <form>

</body>
</html>

