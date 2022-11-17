
<?php
include("../../Database/Connection.php");  
include("../../controls/edit admin.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="../../css/create_g_tr_admin.css">-->
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
    top: 70%;
    left: 10%;
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
<!--
    <img class="imagelogo_edit" src="..\..\sources\image\user-weman.png" alt="no image"/>
-->
<!-- For circular image -->
<div class="profile-pic-div" style="width:140px ; height:140px  ; position: absolute;left: 33%;  top: 12%; " >
                    <img src="..\..\sources\image\user-weman.png" id="photo" height="100" width="100">
                    <input type="file" id="file1" name="u_img">
                    <label for="file" id="uploadBtn1" >Edit Photo</label>
   </div>


   <!-- <h5>Edit photo</h5> -->
    </div>
        <p class="main_text_edit"><b>Profile</b></p>
        <form class="login-form"  method="post">
        
       

        <div class="form-field-signup">
        <input id="name" name="name" type="text"  placeholder="Full_name"  value="<?php echo $name ?>"  maxlength="25" />
       </div>
          
          <div class="form-field-signup">
            <input id="pass" name="pass" type="password" placeholder="Password"  value="<?php  echo $password  ?>" maxlength="25" />  
         </div>
         <div class="form-field-signup">
          <input id="pass2" name="cof-pass" type="password" placeholder="Confrim Password" value="<?php  echo $password  ?>" maxlength="25"/>  
         </div> 
         
         <div class="error" style="color: red; margin-left:20px;" > 
                   <?php echo $error ?>
                </div>
                
        <button type="submit" name="bts" onclick="" > Save</button>

            
    </form>
   

    <script>
               //check inputs !

                function check_Enter() {
                const NAME = document.getElementById("name").value;
                const pass = document.getElementById("pass").value;
                const pass2=document.getElementById("pass2").value;
              
                
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
            
                }
                </script>
    
</body>
</html>