
<?php
include("../../Database/Connection.php");  
include("../../controls/edit-password.php");
$img1=$_SESSION['img1'];/** profile   صورة تم احضارها من */
 $Tid=$_SESSION['tid'];
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--using th same login and signup css page with addtional-->
    <link rel="stylesheet" href="../../CSS/login_and_singup.css"/>
    <link rel="stylesheet" href="../../CSS/editing.css"/>
    <!--icon-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    <title>Edit Profile</title>

<style> 
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: "Poppins", sans-serif;
}
form .form-field-signup:nth-child(1)::before {
    background-image: url(https://img.icons8.com/material-outlined/512/lock.png);
    width: 24px;
    height: 24px;
    top:0.4em;
    left: 6%;
    }
    form .form-field-signup:nth-child(3)::before {
    background-image: url(https://img.icons8.com/material-outlined/512/lock.png);
    width: 24px;
    height: 24px;
    top:0.4em;
    left: 6%;
}
form .form-field-signup:nth-child(2)::before {
    background-image: url(https://img.icons8.com/material-outlined/512/lock.png);
    width: 24px;
    height: 24px;
    top:0.4em;
    left: 6%;
    }
  

.btcansel {
    text-align      : center;
    text-transform  : uppercase;
    font-size       : 14px;
    background-color:#fba433;
    border: none;
    color: #fff;
    cursor          : pointer;
    transition      : background-color 0.3s;
}

.btcansel:hover {
   color: #000000;
   font-weight: bold;
   background-color: #fff;
   color: #fba433;
   border: 1px solid #fba433 ;
}
/* for show password */
.form-field-signup.pass input::placeholder{
        font-size: 17px;
    }
    .form-field-signup.pass span{
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: #222242;
        cursor: pointer;
        display: none;
    }
    .form-field-signup.pass input:valid ~ span{
        display: block;
    }
    .form-field-signup.pass span i.hide-btn::before{
        content: "\f070";
    }
    .login-form{
width: 100%;
    }
  
   .login-container{
    width: 29%;
padding: 2%;
height: 93vh;
   }
   *{
    font-family: "Poppins", sans-serif;
   }

   
@media only screen and (max-width:800px) {   
    .login-container{
    width: 60%;
   } 
}
.back{
    position: absolute;
    top: 2%;
    left: 1%;
    font-size: 30px;
    z-index: 1;
}

p#demo {
    color: var(--red);
    margin-bottom: 5px;
    text-align: left;
    margin-left: 7%;
}
    </style>

<body>
<div class="back"><a href="../teacher/profile teacher.php" style="color:#222242;font-size:40px;"><i class="las la-arrow-left"></i></a></div>

    <div class="login-container">
    <p class="signup_text" style="margin-left:30% ;"><b>Edit Teacher</p>
    <form class="login-form"  method="POST" name="signup_form" enctype="multipart/form-data" onsubmit="return check_Enter(this)">

    <!-- For circular image -->
    <div class="profile-pic-div"  >
        <?php echo"  <img src='../../sources/image/$img1' id='photo' height='120' width='120' > ' "?>
    </div>

    <!-- inputs  --> 
    <div class="form-field-signup pass">
        <input id="pass1" name="pass1" type="password" placeholder="old Password"  value="<?php echo $pass ?>" maxlength="25" /> 
        <span class="show-btn"><i id="show-btn" class="fas fa-eye"></i></span>  
    </div>

    <div class="form-field-signup pass">
        <input id="pass" name="pass" type="password" placeholder="new Password"  value="<?php echo $pass ?>" maxlength="25" /> 
        <span class="show-btn"><i id="show-btn" class="fas fa-eye"></i></span>  
    </div>

    <div class="form-field-signup pass">
        <input id="conf_pass" name="cof-pass" type="password" placeholder="Confrim new Password" value="<?php echo $pass ?>" maxlength="25"/>  
        <span class="show-btn_conf"><i id="show-btn_conf" class="fas fa-eye conf_pass"></i></span>   
    </div> 
            
    <div class="error"  style="color: red; margin-left:20px;" > 
        <?php echo $error ?>
    </div>
             
    
                  <!-- For Errors message-->
                  <?php if(count($errors)> 0): ?>
                    <div class="msg error" style="color: #D92A2A; margin-bottom: 5px;"> 
                     <?php foreach($errors as $error): ?>
                        <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                     <?php endforeach; ?>
                    </div> 
                   <?php endif; ?> 
            <!----------------->
            <p id="demo"></p>

        <button type="submit" name="editTeachepass" onclick="return confirmDelete()" > Save</button>
        <a href="../group/main page for group.php">   <button style="margin-top: 3%;" class="btcansel" type="button" > Cancels</button></a>
    </form>
    </div>


 
  <script>
/**************************check for entres*******************************/
    function check_Enter(form) {
    const password = document.getElementById("pass1").value;
    const pass = document.getElementById("pass").value;
    const conf_pass = document.getElementById("conf_pass").value;
    
    if(password==""){
        /* alert(" pleas enter Group-name"); */
        document.getElementById("demo").innerHTML = "<i class='las la-exclamation-circle'></i>&nbsp;&nbsp;pleas enter your password."; 
        return false ;
    }
    if(pass==""){
        /* alert(" pleas enter Group-name"); */
        document.getElementById("demo").innerHTML = "<i class='las la-exclamation-circle'></i>&nbsp;&nbsp;pleas enter your new  password."; 
        return false ;
    }
    if(conf_pass==""){
        /* alert(" pleas Choese Teacher Name"); */
        document.getElementById("demo").innerHTML = "<i class='las la-exclamation-circle'></i>&nbsp;&nbsp;pleas enter your new  password again."; 
        return false;
    }} 
   
    
/*****************************for show password********************************/
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
/***************************for show confirm password*************************/
    const confPassField = document.getElementById("conf_pass");
    const showBtn_conf = document.getElementById("show-btn_conf");
    showBtn_conf.onclick = (()=>{
        if(confPassField.type === "password"){
        confPassField.type = "text";
        showBtn_conf.classList.add("hide-btn");
        }else{
        confPassField.type = "password";
        showBtn_conf.classList.remove("hide-btn");
        }
    });
    /***************************for show emphasis *************************/
    function confirmDelete() {
    if (confirm("Are you sure you want to Update ?")) {
        return true;
    } 
    else {
        return false;
    }}
  </script>
</body>
</html>
</head>
      
      

   
