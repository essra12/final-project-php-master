<?php 
include("../../Database/Connection.php");  
include("../../controls/edit-studentC.php");
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
      <p class="signup_text"><b>Edit Student</p>
    <form class="login-form"  method="POST" name="signup_form" enctype="multipart/form-data"  onsubmit="return check_Enter(this)">

  <!-- For circular image -->
  <div class="profile-pic-div"  >
                <img src="../../sources/image/blue_rectangle_with_user.JPG" id="photo" height="120" width="120" >
                <input type="file" id="file" name="u_img">
                <label for="file" id="uploadBtn">Choose Photo</label>
  </div>
            <!-- inputs  --> 
        <div class="form-field-signup">
        <input id="id" name="id" type="text"  placeholder="ID"  value="<?php  echo $id  ?>"  maxlength="8"/>
        </div>
        <div class="form-field-signup">
            <input id="name" name="name" type="text"  placeholder="Full Name"  value="<?php  echo $name  ?>" maxlength="30" />
        </div>
          
        <div class="form-field-signup">
        <input id="cof-pass" type="password"  name="pass" placeholder="password"   maxlength="25" value="<?php  echo $pass  ?>" />
       </div>

          <div class="form-field-signup">
            <input id="pass" type="password" name="cof-pass" placeholder="Confirm Password"  value="<?php  echo $pass  ?>" maxlength="25" />  
         </div>
         <div class="form-field-signup">
          <input id="spe" type="text" name="spe" placeholder="Specialization" value="<?php  echo $spe  ?>"maxlength="25"/>  
         </div>

         <div class="error" style="color: red; margin-left:30px;" > 
                   <?php echo $error ?>
                </div> 
        <button type="submit" name="bts" onclick=""> Save</button>
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


    function check_Enter() {
    const userID = document.getElementById("id").value;
    const full_name = document.getElementById("name").value;
    const spe = document.getElementById("spe").value;
    const pass = document.getElementById("pass").value;
    const conf_pass = document.getElementById("cof-pass").value;
    
    if(userID==""){
        alert(" pleas enter UserID");
        return false;
    }
    if(full_name==""){
        alert(" pleas enter Full name");
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
</script>


</body>
</html>
</head>