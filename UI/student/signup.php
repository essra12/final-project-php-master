<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/students.php");
?>

<!DOCTYPE html>
<head>
    <title>Singup</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="../../CSS/login_and_singup.css"/>
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <html>
      
<body >

  <div class="login-container">

      <p class="signup_text"><b>Singup</b><br>as student</p>

    <form class="login-form" action="signup.php" method="POST" name="signup_form" enctype="multipart/form-data" onsubmit="return check_Enter(this)">

        <div class="form-field-signup">
        <input id="id" type="text"  placeholder="ID"  maxlength="8" name="stu_id" value="<?php echo $stu_id;?>"/>
        </div>
        <div class="form-field-signup">
            <input id="full_name" type="text"  placeholder="Full Name"  maxlength="30" name="full_name" value="<?php echo $full_name;?>" />
        </div>
          
          <div class="form-field-signup">
            <input id="pass" type="password" placeholder="Password"  name="password" value="<?php echo $password;?>"/>  
         </div>
         <div class="form-field-signup">
          <input id="conf_pass" type="password" placeholder="Confrim Password"  name="conf_password" value="<?php echo $conf_password;?>"/>  
         </div>
       <div class="form-field-signup">
        <input id="spe" type="text"  placeholder="Specialization"  maxlength="25" name="stu_specialization" value="<?php echo $stu_specialization;?>"/>
       </div>
          
        <!-- For Errors -->
        <?php if(count($errors)> 0): ?>
                <div class="msg error" style="color: #D92A2A; margin-bottom: 20px; list-style-type: none; "> 
                    <?php foreach($errors as $error): ?>
                    <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                    <?php endforeach; ?>
                </div> 
            <?php endif; ?>
        <!----------------->
            
        <button type="submit" name="Add_student">Signup</button>
    </form>
    <div class="additional-action">
        <a href="<?php echo BASE_URL . '/login.php' ?>" style="text-decoration: none; color:#222242;"><p><b><u>Login</u></b></p></a>
    </div>
</div>
<form>

<!-- check enter -->

<script>
  function check_Enter() {
  const id = document.getElementById("id").value;
  const NAME = document.getElementById("full_name").value;
  const pass = document.getElementById("pass").value;
  const pass2=document.getElementById("conf_pass").value;
  const specialization=document.getElementById("spe").value;
  if(id==""){
  alert(" Please enter ID");
  return false
  }
  if(NAME==""){
  alert(" Please enter name");
  return false
  }
  const regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    if(!regName.test(NAME)){
        alert('the name is incorrect, Please rewrite your full name (first and last name).');
        document.getElementById('full_name').focus();
        return false;
    }
  else if(pass==""){
  alert(" Please enter password ");
  return false
  }
  if(pass2==""){
  alert(" Please enter password again");
  return false
  }
  if(pass != pass2){
  alert(" the password is not equal,Please enter the correct value");
  return false
  }
  if(specialization==""){
  alert(" Please enter specialization ");
  return false
  }
  }
  </script>

</body>
</html>
</head>