
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
<style>



</style>
    <html>
        <body>
            <div class="div-photo">
            <form method="get" action="edit teacher.php">
            <img class="photo-tr" src="../../sources/image/1668182399_profile_woman2.png" /><br> 

                 <!-- photo 
                <div class="profile-pic-div"  >
                <img src="../../sources/image/create_add_photo.png" id="photo" height="120" width="120" >
                <input type="file" id="file" name="u_img">
                <label for="file" id="uploadBtn">Choose Photo</label>
            </div>
-->
            <!-- icons -->
            </div>
            <div class="div-data">
                <i id="img1" class="fa-solid fa-id-card"></i>
                <i id="img3" class="fa-sharp fa-solid fa-phone"></i>
                <i id="img2"  class="fa-regular fa-user"></i>

             <?php
                        global $conn;
                        $sqln="SELECT user.* ,teacher.tr_phone_no ,teacher.tr_id 	
                        from user ,teacher 
                        WHERE user.user_id=teacher.user_id;";
                        /** وتخزينها في متغيرات DB  احضار بيانات من  */                      
                        $result= mysqli_query($conn,$sqln);
                        $row =mysqli_fetch_row($result);
                        $id=$row[6];
                        $name=$row[1];
                        $phone=$row[5];
                        $pass=$row[2];
                           
                        
                            /** BD عرض البيانات التي تم احضارها من  */
                         echo " <lable class='l1'>". $id. "</lable>. <lable class='l2'>" .$name ."</lable>" . "<lable class='l3'>" .$phone ."</lable>"  ;
                        
                         /** SESSION نقل البيانات الي صحة اخري باستخدام  */
                            $_GET['name']=$name;
                            $_GET['phone']=$phone;
                            $_GET['password']=$pass;

                           $_SESSION['name']=$_GET['name'];
                           $_SESSION['phone']=$_GET['phone'];
                           $_SESSION['pass']=$_GET['password'];    
                           /*

                            $u_img=$_GET['u_img'];
                            global $conn;
                            $sql="INSERT INTO user(u_img) VALUES ('$u_img')";
                            $result= mysqli_query($conn,$sql);

                         */
                          /* user Image */
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
    /*****************/
             ?>   
                       
                <a href="edit teaher.php" >
                <input name="bts" class="bt1"  type="button" value="Edit"/></a>
                <a href="..\..\logout.php">
                <input class="bt2" name="edit" type="button" value="Logout"/></a>
                </form>
            </div>


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
</script>
        </body>
    </html>