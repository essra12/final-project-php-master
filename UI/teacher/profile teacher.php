
<?php
include("../../Database/db.php");
?>
<!DOCTYPE html>
<head>
    <title>teacher-profile</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="..\..\CSS\Profiless.css" />
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    </head>

    <!--  style for profile student -->
<style>



</style>
    <html>
        <body>
            <div class="div-photo">
            <form method="get" action="edit teacher.php">
<!-- select image for teacher -->
            <?php
             global $conn;
             $id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/

                        $sqln="SELECT user.* ,teacher.tr_phone_no ,teacher.tr_id 	
                        from user ,teacher 
                        WHERE user.user_id=teacher.user_id  and user.user_id='".$id."';";
                        /** وتخزينها في متغيرات DB  احضار بيانات من  */                      
                        $result= mysqli_query($conn,$sqln);
                        $row =mysqli_fetch_row($result);
                         $img=$row[3];

   echo " <img class='photo' src='../../sources/image/$img' /> ";
   ?>
            <!-- icons -->
            </div>
            <div class="div-data">
                <i id="img1" class="fa-solid fa-id-card"></i>
                <i id="img3" class="fa-sharp fa-solid fa-phone"></i>
                <i id="img2"  class="fa-regular fa-user"></i>
<!-- select data for taecher  -->
             <?php
                        global $conn;
                        $id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
                        $sqln="SELECT user.* ,teacher.tr_phone_no ,teacher.tr_id 	
                        from user ,teacher 
                        WHERE user.user_id=teacher.user_id and user.user_id='".$id."';";
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
                  ?>   
                       
                <a href="edit teaher.php" >
                <input name="bts" class="bt1"  type="button" value="Edit"/></a>
                <a href="..\..\logout.php">
                <input class="bt2" name="edit" type="button" value="Logout"/></a>
                </form>
            </div>
           </body>
           </html>