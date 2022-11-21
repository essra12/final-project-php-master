<?php
include("../../Database/Connection.php");  
include("../../controls/edit-teacher.php");
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

.profile-pic-div{
    width:140px ;
     height:140px  ; 
     position: absolute;
     left: 50%;
     top: 50%;  
     transform: translate(-50% ,-50%);
    border-radius: 100%;
    overflow: hidden;
    border: 1px solid grey;

}

#photo{
    height: 100%;
    width: 100%;
}

#file{
    display: none;
}

#uploadBtn{
    height: 40px;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    background: rgba(0, 0, 0, 0.7);
    color: wheat;
    line-height: 30px;
    font-family: sans-serif;
    font-size: 15px;
    cursor: pointer;
    display: none;
}
</style>
<body class="body" >
<!--using the same signup form for edit profile-->
<div class="login_container_edit">
    <div class="circle-container"> 
    <div class="main_circle"></div>
  <!--   <img class="imagelogo_edit" src="..\..\sources\image\user-weman.png" alt="no image"/> -->
  <!-- For circular image 
<div class="profile-pic-div" style="width:160px ; height:160px  ; position: absolute;left: 33%;  top: 8%; " >
                    <img src="..\..\sources\image\user-weman.png" id="photo" height="120" width="120">
                    <input type="file" id="file1" name="u_img">
                    <label for="file" id="uploadBtn1" >Edit Photo</label>
   </div>  -->


  <!-- For circular image -->
  <div class="profile-pic-div"  >
                <img src="../../sources/image/create_add_photo.png" id="photo" height="120" width="120" >
                <input type="file" id="file" name="u_img">
                <label for="file" id="uploadBtn">Choose Photo</label>
            </div>
   <!-- <h5>Edit photo</h5> -->
    </div>
        <p class="main_text_edit"><b>Profile</b></p>
        <form class="login-form"  method="post">
        
        <div class="form-field-signup">
            <input id="username" name="name" type="text"  placeholder="Full Name"  value="<?php  echo $name  ?>"  maxlength="30" />
        </div>

        <div class="form-field-signup">
        <input  id="phone" name="phone" type="text"  placeholder="Phone"  value="<?php  echo $phon  ?> "  maxlength="10" />
       </div>
          
          <div class="form-field-signup">
            <input id="pass" name="pass" type="password" placeholder="Password"  value="" maxlength="25" />  
         </div>
         <div class="form-field-signup">
          <input id="pass2" name="cof-pass" type="password" placeholder="Confrim Password" value="" maxlength="25"/>  
         </div> 
         
         <div class="error" style="color: red; margin-left:20px;" > 
                   <?php echo $error ?>
                </div>
        <button type="submit" name="bts" onclick="check_Enter()" > Save</button> 
    </form>
   

    <script>
               /*  check inputs !
                function check_Enter() {
                const NAME = document.getElementById("username").value;
                const phone=document.getElementById("phone").value;
                const pass = document.getElementById("pass").value;
                const pass2=document.getElementById("pass2").value;
                if(NAME==""){
                alert(" pleas enter name");
                return false
                }
                
                if(phone==""){
                alert(" pleas enter phone ");
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

                */
                </script>

                
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

            //Allright is done

            //please like the video
            //comment if have any issue related to vide & also rate my work in comment section

            //And aslo please subscribe for more tutorial like this

            //thanks for watching
        }
    });
</script>
    
</body>
</html>