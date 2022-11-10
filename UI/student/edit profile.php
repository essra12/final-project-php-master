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
          
            
        <button type="submit" onclick="check_Enter()">Save</button>
    </form>
   
    
</body>
</html>