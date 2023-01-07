<?php 

include("path.php"); 
include(MAIN_PATH."/controls/login_path.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--for logo-->
    <link rel="shortcut icon" href="sources/image/logo_bar.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\login_and_singup.css" type="text/css"/>
    <script src="JavaScript\check.js"></script>
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <title>login</title>
</head>

<style>
/* for show password */
.form-field.pass input::placeholder{
  font-size: 17px;
}
.form-field.pass span{
  position: absolute;
  right: 15px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 20px;
  color: #222242;
  cursor: pointer;
  display: none;
}
.form-field.pass input:valid ~ span{
  display: block;
}
.form-field.pass span i.hide-btn::before{
  content: "\f070";
}
</style>

<body>
   
    <div class="login-container">
    <div class="circle-container"> 
    <div class="main_circle"></div>
    <img class="imagelogo" id="image" src="sources\image\logo_light.png" alt="no image"/>
    </div>
        <p class="main_text">Welcome Back :) </p>
        <form method="post" action="" class="login-form"  onsubmit="return check_Enter(this)">

       
            <div class="form-field ">
                <input id="username" name="username" type="text"  placeholder="Full Name" size="27" maxlength="30"  value="<?php echo $fullname;?>"/>
            </div>
              
            <div class="form-field pass">
                <input id="pass" name="password" type="password" placeholder="Password" maxlength="25"  /> 
                <span class="show-btn"><i id="show-btn" class="fas fa-eye"></i></span> 
            </div>
                

          <?php if(count($errors)> 0): ?>
                    <div class="error" style="color: #D92A2A;margin-bottom:20px;font-size: 15px; "> 
                     <?php foreach($errors as $error): ?>
                        <li style="list-style-type: none; " ><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 16px;padding_right=90px"></i><?php echo($error); ?></li>
                     <?php endforeach; ?>
                    </div> 
          <?php endif; ?> 
                
         <button type="submit" id="submit" name="submit">Login</button>
        </form>
        <div class="additional-action">
        <a href="<?php echo BASE_URL . '..\UI\student\signup.php' ?>" style="text-decoration: none; color:#000;"><p>Create an account <b><u>Singup</u></b></p></a>
    </div>
    </div>
    <form>

    <script>
      /**for show password**/
      const passField = document.getElementById("pass");
      const showBtn = document.getElementById("show-btn");
      showBtn.onclick = (()=>{
        if(passField.type === "password"){
          passField.type = "text";
          showBtn.classList.add("hide-btn");
        }else{
          passField.type = "password";
          showBtn.classList.remove("hide-btn");
        }
      });
    /***********************/
    </script>
 
</body>
</html>

