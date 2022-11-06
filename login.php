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
    <img class="imagelogo" src="image\singup-image.png" alt="no image"/>
    </div>
        <p class="main_text"><b>Welcome</b><br>Back! </p>
        <form class="login-form">
            <div class="form-field ">
                <input id="username" type="text"  placeholder="Full Name" size="27" maxlength="30"/>
                <div class="error"></div>
            </div>
              
            <div class="form-field">
                <input id="pass" type="password" placeholder="Password" maxlength="25"/> 
                <div class="error"></div> 
            </div>
                
            <button type="submit" id="submit" onclick="check_Enter()">Login</button>
        </form>
        <div class="additional-action">
            <p>Create an account <b><u>Singup</u></b></p>
        </div>
    </div>
    <form>
    

</body>
</html>

