<!DOCTYPE html>
<head>
    <title>singup</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="../../CSS/login_and_singup.css"/>
    <html>
      
<body >

  <div class="login-container">

      <p class="signup_text"><b>Singup</b><br>as student</p>

    <form class="login-form">
        <div class="form-field-signup">
        <input id="textid" type="text"  placeholder="ID"  maxlength="8"/>
        </div>
        <div class="form-field-signup">
            <input id="username" type="text"  placeholder="Full Name"  maxlength="30" />
        </div>
          
          <div class="form-field-signup">
            <input id="pass" type="password" placeholder="Password" maxlength="25" />  
         </div>
         <div class="form-field-signup">
          <input id="pass" type="password" placeholder="Confrim Password" maxlength="25"/>  
         </div>
       <div class="form-field-signup">
        <input id="textid" type="text"  placeholder="Specialization"  maxlength="25" />
       </div>
          
            
        <button type="submit" onclick="check_Enter()">Signup</button>
    </form>
    <div class="additional-action">
        <p><b><u>Login</u></b></p>
    </div>
</div>
<form>

<!-- check enter -->

<script>
  function check_Enter() {
  const id = document.getElementById("id").value;
  const NAME = document.getElementById("name").value;
  const pass = document.getElementById("pass").value;
  const pass2=document.getElementById("cof-pass").value;
  const specialization=document.getElementById("spe").value;
  if(id==""){
  alert(" pleas enter ID");
  return false
  }
  if(NAME==""){
  alert(" pleas enter name");
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
if(pass != pass2){
alert(" the password is not equal ");
return false
  }
  if(specialization==""){
  alert(" pleas enter specialization ");
  return false
  }
  }
  </script>

</body>
</html>
</head>