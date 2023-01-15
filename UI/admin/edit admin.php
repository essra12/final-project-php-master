
<?php
include("../../Database/Connection.php");  
include("../../controls/edit admin.php");
$img1=$_SESSION['img1'];/** profile admin  صورة تم احضارها من */

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
    form .form-field-signup:nth-child(3)::before {
    background-image: url(https://img.icons8.com/material-outlined/512/lock.png);
    width: 24px;
    height: 24px;
    top:0.4em;
    left: 6%;
}
form .form-field-signup:nth-child(2)::before {
    background-image: url(https://img.icons8.com/small/512/user.png);
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
height: 90vh;
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
    </style>

<body>
<div class="back"><a href="../admin/admin profile.php" style="color:#222242;font-size:40px;"><i class="las la-arrow-left"></i></a></div>

    <div class="login-container">
    <p class="signup_text" style="margin-left:30% ;"><b>Edit Admin</p>
    <form class="login-form"  method="POST" name="signup_form" enctype="multipart/form-data"  onsubmit="return check_Enter(this)">

    <!-- For circular image -->
    <div class="profile-pic-div"  >
        <?php echo"  <img src='../../sources/image/$img1' id='photo' height='120' width='120' > ' "?>
        <input type="file" accept="image/*" id="file" name="u_img">
        <label for="file" id="uploadBtn">Choose Photo</label> 
    </div>

    <!-- inputs  --> 
    <div class="form-field-signup">
        <input id="name" name="name" type="text"  placeholder="Full_name"  value="<?php echo $name ?>"  maxlength="25" />
    </div>
            
    <div class="form-field-signup pass">
        <input id="pass" name="pass" type="password" placeholder="Password"  value="<?php echo $pass ?>" maxlength="25" /> 
        <span class="show-btn"><i id="show-btn" class="fas fa-eye"></i></span>  
    </div>

    <div class="form-field-signup pass">
        <input id="conf_pass" name="cof-pass" type="password" placeholder="Confrim Password" value="<?php echo $pass ?>" maxlength="25"/>  
        <span class="show-btn_conf"><i id="show-btn_conf" class="fas fa-eye conf_pass"></i></span>   
    </div> 
            
    <div class="error" style="color: red; margin-left:20px;" > 
        <?php echo $error ?>
    </div>
                
        <button type="submit" name="bts" onclick="return confirmDelete()" > Save</button>
        <a href="../control_panel/groups_control_panel.php">   <button style="margin-top: 3%;" class="btcansel" type="button" > Cancels</button></a>

    </form>
    </div>

<!-- check enter -->

 
  <script>
    /************************************ circular image *********************************/
    const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');

    //if user hover on img div 

    imgDiv.addEventListener('mouseenter', function(){
        uploadBtn.style.display = "block";
    });

    //if we hover out from img div

    imgDiv.addEventListener('mouseleave', function(){
        uploadBtn.style.display = "none";
    });

    file.addEventListener('change', function(){
        //this refers to file
        const choosedFile = this.files[0];

        if (choosedFile) {

            const reader = new FileReader(); //FileReader is a predefined function of JS

            reader.addEventListener('load', function(){
                img.setAttribute('src', reader.result);
            });

            reader.readAsDataURL(choosedFile);
        }
    });

/**************************check for entres*******************************/
    function check_Enter(){
    const full_name = document.getElementById("name").value;
    const pass = document.getElementById("pass").value;
    const conf_pass = document.getElementById("cof-pass").value;
    
    if(full_name==""){
        alert(" Please enter full name");
        return false;
    }
    const regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    if(!regName.test(full_name)){
        alert('the name is incorrect, Please rewrite your full name (first and last name).');
        document.getElementById('full_name').focus();
        return false;
    }

    if(pass==""){
        alert(" Please enter Password");
        return false;
    }
    if(conf_pass==""){
        alert(" Please enter Password again");
        return false;
    }
    if(conf_pass!=pass){
        alert(" the password is not equal ");
        return false;
    }
    }
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
      
      

   
