
<?php
include("../../Database/Connection.php");  
include("../../controls/edit admin.php");
$img1=$_SESSION['img1'];/** profile admin  صورة تم احضارها من */

?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--using th same login and signup css page with addtional-->
    <link rel="stylesheet" href="../../CSS/login_and_singup.css"/>
    <link rel="stylesheet" href="../../CSS/editing.css"/>
    <title>Edit Profile</title>
   <html>
    <style> 
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
    background-color: #222242;
    color: #fff;
    cursor          : pointer;
    transition      : background-color 0.3s;
}

.btcansel:hover {
   color: #000000;
   font-weight: bold;
   background-color: #fff;
}
    
    </style>
<body >

  <div class="login-container">
      <p class="signup_text"><b>Edit Admin</p>
    <form class="login-form"  method="POST" name="signup_form" enctype="multipart/form-data"  onsubmit="return check_Enter(this)">

  <!-- For circular image -->
  
  <div class="profile-pic-div"  >
             <?php echo"  <img src='../../sources/image/$img1' id='photo' height='120' width='120' > ' "?>
                <input type="file" id="file" name="u_img">
                <label for="file" id="uploadBtn">Choose Photo</label> 
  </div>
            <!-- inputs  --> 
            <div class="form-field-signup">
        <input id="name" name="name" type="text"  placeholder="Full_name"  value="<?php echo $name ?>"  maxlength="25" />
       </div>
          
          <div class="form-field-signup">
            <input id="pass" name="pass" type="password" placeholder="Password"  value="<?php echo $pass ?>" maxlength="25" />  
         </div>
         <div class="form-field-signup">
          <input id="cof-pass" name="cof-pass" type="password" placeholder="Confrim Password" value="<?php echo $pass ?>" maxlength="25"/>  
         </div> 
         
         <div class="error" style="color: red; margin-left:20px;" > 
                   <?php echo $error ?>
                </div>
                
        <button type="submit" name="bts" onclick="" > Save</button>
        <a href="../control_panel/groups_control_panel.php">   <button style="margin-top: 3%;" class="btcansel" type="button" > Cansel</button></a>

    </form>
    </div>



<!-- check enter -->

  <!--   ********************************************* circular image *********************************    -->
  <script>
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

    //lets work for image showing functionality when we choose an image to upload

    //when we choose a foto to upload

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

</script>
</body>
</html>
</head>
      
      

   
