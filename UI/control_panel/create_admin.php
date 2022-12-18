<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/admins.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1">
    <title>Add Admin</title>
    <link rel="stylesheet" href="../../css/add_group_teacher_admin.css">
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>

<style>
/* for show password */
.form-field.admin.pass input::placeholder{
  font-size: 17px;
}
.form-field.admin.pass span{
  position: absolute;
  right: 27%;
  top: 42%;
  transform: translateY(-50%);
  font-size: 20px;
  color: #222242;
  cursor: pointer;
  display: none;
}
.form-field.admin.pass input:valid ~ span{
  display: block;
}
.form-field.admin.pass span i.hide-btn::before{
  content: "\f070";
}
</style>

<body id="b-vlightblue">

    <!-- menu -->
    <?php include(MAIN_PATH."/common/sidebar.php"); ?> 
    <!-------------------->

    <header class="main_icon">
        <div class="header-title">
            <label for="menu-toggle">
                <span class="las la-bars"></span>
            </label>
        </div>
    </header>
    <!--  main content -->

    <div class="main-content admin">
        
        
        <div class="g_tr_admin-container admin ">

        <form class="g_tr_admin-form" action="create_admin.php" method="POST" name="create_admin_form" enctype="multipart/form-data" onsubmit="return check_Enter(this)">
                
                <div  class="img_title admin">
                    <h2>Add New Admin Account</h2>

                    <!-- For circular image -->
                    <div class="profile-pic-div admin">
                        <img src="../../sources/image/blue_rectangle_with_user.JPG" id="photo" height="200" width="200">
                        <input type="file" id="file" name="u_img">
                        <label for="file" id="uploadBtn">Choose Photo</label>
                    </div>
                    <!----------------------->
                
                </div>
                
                <div class="create-g-div">

                    <div class="form-field admin ">
                    <input id="full_name" class="input-name" type="text"  placeholder="Full Name" maxlength="30" name="full_name" value="<?php echo $full_name;?>" />
                    </div>

                    <div class="form-field admin pass">
                        <input id="pass" class="input-name" type="password"  placeholder="Password" maxlength="25" name="password" value="<?php echo $password;?>" />
                        <span class="show-btn"><i id="show-btn" class="fas fa-eye"></i></span> 
                    </div>

                    <div class="form-field admin pass">
                        <input id="conf_pass" class="input-name" type="password"  placeholder="Confrim Password" maxlength="25" name="conf_password" value="<?php echo $conf_password;?>" />
                        <span class="show-btn_conf"><i id="show-btn_conf" class="fas fa-eye conf_pass"></i></span>  
                    </div>

                </div>

                <!-- For Errors -->
                <?php if(count($errors)> 0): ?>
                    <div class="msg error" style="color: #D92A2A; margin-bottom: 20px;"> 
                        <?php foreach($errors as $error): ?>
                        <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                        <?php endforeach; ?>
                    </div> 
                <?php endif; ?> 
                <!----------------->
                
                <!-- For Succes -->
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="msg success" style="color: #5a9d48; margin-bottom: 20px;">
                        <li><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
                        <?php
                        /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
                        unset($_SESSION['message']);
                        ?>
                    </div>
                <?php endif; ?>
                <!----------------->

                <button class="btn_save" type="submit"  name="add_admin">Save</button>
        </form>

    </div>

    </div>

    
    <script>
        /********************************************check enter**********************************************/
        function check_Enter() {
        const full_name = document.getElementById("full_name").value;
        const pass = document.getElementById("pass").value;
        const conf_pass = document.getElementById("conf_pass").value;

        if(full_name==""){
            alert(" Please enter Full name");
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
            alert(" the password is not equal,Please enter the correct value");
            return false;
        }
        }

        /********************************************* for sidebar items  *********************************/
        const activePage = window.location.pathname;
        const navLinks = document.querySelectorAll('.sidebar-menu a').forEach(link => {
        if(link.href.includes(`${activePage}`)){
            link.classList.add('active');
            console.log(link);
        }
        })


        /********************************************* circular image *********************************/
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

        /*************************************For show password *********************************/
        const passField = document.getElementById("pass");
        const showBtn = document.getElementById("show-btn");
        showBtn.onclick = (()=>{
        if(passField.type === "password"){
            passField.type = "text";
            showBtn.classList.add("hide-btn");
        }else{
            passField.type = "password";
            showBtn.classList.remove("hide-btn");
        }
        });
        /**********************************for show confirm password******************************/
        const confPassField = document.getElementById("conf_pass");
        const showBtn_conf = document.getElementById("show-btn_conf");
        showBtn_conf.onclick = (()=>{
        if(confPassField.type === "password"){
            confPassField.type = "text";
            showBtn_conf.classList.add("hide-btn");
        }else{
            confPassField.type = "password";
            showBtn_conf.classList.remove("hide-btn");
        }
        });
    </script>

</body>
</html>
