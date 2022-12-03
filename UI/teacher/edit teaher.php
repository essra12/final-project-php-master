<?php 
include("../../Database/Connection.php");  
include("../../controls/edit-teacher.php");
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
<body >

  <div class="login-container">
      <p class="signup_text"><b>Edit Teacher</p>
    <form class="login-form"  method="POST" name="signup_form" enctype="multipart/form-data"  onsubmit="return check_Enter(this)">

  <!-- For circular image -->
  <div class="profile-pic-div"  >
                <img src="../../sources/image/blue_rectangle_with_user.JPG" id="photo" height="120" width="120" >
                <input type="file" id="file" name="u_img">
                <label for="file" id="uploadBtn">Choose Photo</label>
  </div>
            <!-- inputs  --> 
            <div class="form-field-signup">
            <input id="name" name="name" type="text"  placeholder="Full Name"  value="<?php  echo $name  ?>"  maxlength="30" />
        </div>

        <div class="form-field-signup">
        <input  id="phone" name="phone" type="text"  placeholder="Phone" onkeypress="return onlyNumberKey(event)"  value="<?php  echo $phon  ?> "  maxlength="10" />
       </div>
          
          <div class="form-field-signup">
            <input id="pass" name="pass" type="password" placeholder="Password"  value="<?php  echo $pass  ?>"  maxlength="25" />  
         </div>
         <div class="form-field-signup">
          <input id="cof-pass" name="cof-pass" type="password" placeholder="Confrim Password" value="<?php  echo $pass  ?>" maxlength="25"/>  
         </div> 
         
         <div class="error" style="color: red; margin-left:20px;" > 
                   <?php echo $error ?>
                </div>
        <button type="submit" name="bts"  onclick=""> Save</button>
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

    /**    ---------------------------------------- check enter ---------------------------------------- */
    
    function check_Enter(){
    const full_name = document.getElementById("name").value;
    const phone = document.getElementById("phone").value;
    const pass = document.getElementById("pass").value;
    const conf_pass = document.getElementById("cof-pass").value;
    
    if(full_name==""){
        alert(" pleas enter full name");
        return false;
    }
    if(phone==""){
        alert(" pleas enter number phone");
        return false;
    }
    if(phone<10){
        alert(" pleas enter the Full Number");
        return false;
    }
    if(pass==""){
        alert(" pleas enter Password");
        return false;
    }
    if(conf_pass==""){
        alert(" pleas enter Password again");
        return false;
    }
    if(conf_pass!=pass){
        alert(" the password is not equal ");
        return false;
    }
    }

    function onlyNumberKey(evt) {
  // Only ASCII character in that range allowed
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)){
    alert(" pleas enter Just Number");
    return false;
  }
  return true;
}

</script>

</body>
</html>
</head>
      
      