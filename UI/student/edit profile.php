<?php 
include("../../Database/Connection.php");  
include("../../controls/edit-studentC.php");
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

<style> 
#file1{
    display: none;
}
#uploadBtn1{
   cursor: pointer; 
    position: absolute;
    top: 80%;
    left: 15%;
    text-align: center;
    color: white;
    line-height: 30px;
    font-family: sans-serif;
    font-size: 15px;
}
</style>
<body class="body" >
<!--using the same signup form for edit profile-->
<div class="login_container_edit">
    <div class="circle-container"> 
    <div class="main_circle"></div>

 <!--   <img class="imagelogo_edit" src="..\..\sources\image\user-weman.png" alt="no image"/>  -->

 <!-- For circular image -->
<div class="profile-pic-div" style="width:160px ; height:160px  ; position: absolute;left: 33%;  top: 12%; " >
                    <img src="..\..\sources\image\user-weman.png" id="photo" height="120" width="120">
                    <input type="file" id="file1" name="u_img">
                    <label for="file" id="uploadBtn1" >Edit Photo</label>
   </div>

   <!-- <h5>Edit photo</h5> -->
    </div>
        <p class="main_text_edit"><b>Profile</b></p>
        <form class="login-form"   method="POST">
        <div class="form-field-signup">
        <input id="id" name="id" type="text"  placeholder="ID"  value="<?php  echo $id  ?>"  maxlength="8"/>
        </div>
        <div class="form-field-signup">
            <input id="name" name="name" type="text"  placeholder="Full Name"  value="<?php  echo $name  ?>" maxlength="30" />
        </div>
          
        <div class="form-field-signup">
        <input id="spe" type="text"  name="spe" placeholder="Specialization" value="<?php  echo $spe  ?>"  maxlength="25" />
       </div>

          <div class="form-field-signup">
            <input id="pass" type="password" name="pass" placeholder="Password"  value="<?php  echo $password  ?>" maxlength="25" />  
         </div>
         <div class="form-field-signup">
          <input id="cof-pass" type="password" name="cof-pass" placeholder="Confrim Password" value="<?php  echo $password  ?>" maxlength="25"/>  
         </div>

         <div class="error" style="color: red; margin-left:30px;" > 
                   <?php echo $error ?>
                </div> 
        <button type="submit" name="bts" onclick=""> Save</button>
    </form>
   
    <script>
        
               //check inputs !

                function check__Enter() {
                const id = document.getElementById("id").value;
                const NAME = document.getElementById("name").value;
                const spe=document.getElementById("spe").value;
                const pass = document.getElementById("pass").value;
                const pass2=document.getElementById("cof-pass").value;
              
                if(id==""){
                alert(" pleas enter ID");
                return false
                }
                if(NAME==""){
                alert(" pleas enter name");
                return false
                }
                if(spe==""){
                alert(" pleas enter specialization ");
                return false
                }
                else if(pass==""){
                alert("    pleas enter password ");
                return false
                }
                if(pass2==""){
                alert(" pleas enter password again");
                return false
                }}
               
               
               </script>
</body>
</html>