
<?php
include("../../Database/db.php");
?>
<!DOCTYPE html>
<head>
    <title>student-profile</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="..\..\CSS\profile.css" />
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    </head>

    <!--  style for profile student -->

    <html>
        <body>
            <div class="div-photo">
            <img class="photo-tr" src="../../sources/image/1668186840_profile_man2.png" /><br> 

               

 <!-- For circular image 
 <div class="profile-pic-div"  >
                <img src="../../sources/image/create_add_photo.png" id="photo" height="120" width="120" >
                <input type="file" id="file" name="g_img">
                <label for="file" id="uploadBtn">Choose Photo</label>
            </div>
-->
            <!------------------------>

            </div>
            <div class="div-data"> 
                <form method="get" action="edit profile.php">
                <i id="img33"  class="fa-regular fa-user"></i>
                <input  class="l33" type="text" value=""  disabled/>
             <?php

                        global $conn;
                        $sqln="SELECT  `full_name`, `password`, `admin`  FROM `user` WHERE user.admin=1;";
                        $result= mysqli_query($conn,$sqln);
                        $row =mysqli_fetch_row($result);
                        $name=$row[0];
                        $pass=$row[1];


                        echo " <lable class='l33'>" .$name ."</lable>"   ;
                   /* <echo"<input  class='l33' type='text' value='$name'/>   ";*/
                        echo"<input  class='l33' type='text' value='$name'  disabled/> ";


                          
                        $_GET['name']=$name;
                        $_GET['password']=$pass;

                           $_SESSION['name']=$_GET['name'];
                           $_SESSION['pass']=$_GET['password'];



                    /* user Image 
    if (!empty($_FILES['u_img']['name'])) {
        $imgName= time() .'_' . $_FILES['u_img']['name'];// تُرجع الدالة الوقت الحالي بعدد الثواني منذ ذلك الحين time() ،  HTTP POST عبارة عن مصفوفة ارتباطية تحتوي على عناصر تم تحميلها عبر طريقة $_FILES
        
        $imgPath= " ../../sources/image/" .$imgName;
        
        $r= move_uploaded_file($_FILES['u_img']['tmp_name'],$imgPath); // تعمل الدالة  على نقل الملف الذي تم تحميله إلى وجهة جديدة.

        if ($r) {
            $_POST['u_img']=$imgName;
        } 
        else {
            array_push($errors,"There is an error uploading the image.");
        }
    }
    else if (empty($_FILES['u_img']['name'])) {
        $_POST['u_img']='blue_rectangle_with_user.JPG';
    }
*?
    /*****************/

             ?>
                <a href="edit admin.php" >
                <input name="bts" class="bt11"  type="button" value="Edit"/></a>
                <input class="bt22" name="edit" type="button" value="Logout"/>
                </form>


            </div>

<!--   ********************************************* circular image *********************************    
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
-->
        </body>
    </html>