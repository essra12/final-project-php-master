<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/teachers.php");
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control_Panel_add_Admin</title>
        <link rel="stylesheet" href="../../css/create_g_tr_admin.css">
        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

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

      <form class="g_tr_admin-form">
        <div  class="img_title admin">
            <h2>Add New Admin</h2>
            <div class="profile-pic-div">
                <img src="../../sources/image/create_add_photo.png" id="photo" height="200" width="200">
                <input type="file" id="file" name="g_img">
                <label for="file" id="uploadBtn">Choose Photo</label>
            </div>
        </div>
        <div class="create-g-div">

            <div class="form-field admin ">
               <input id="full_name" class="input-name" type="text"  placeholder="Full Name" maxlength="30"  />
            </div>

            <div class="form-field admin">
                <input id="pass" class="input-name" type="password"  placeholder="Password" maxlength="25"  />
             </div>

             <div class="form-field admin">
                <input id="conf_pass" class="input-name" type="password"  placeholder="Confrim Password" maxlength="25"  />
             </div>

        </div>

          <button class="btn_save" type="submit" onclick="check_Enter()">Save</button>
      </form>

  </div>

</div>

   <!-- check enter -->
   <script>
    function check_Enter() {
    const full_name = document.getElementById("full_name").value;
    const pass = document.getElementById("pass").value;
    const conf_pass = document.getElementById("conf_pass").value;
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
    }


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
