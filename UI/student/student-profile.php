<?php 
include("../../Database/db.php");
?>

<!DOCTYPE html>
<head>
    <title>student-profile</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="..\..\CSS\profiless.css" />
     <!--icons-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    
    </head>
    <!--  style for profile student -->
<style>

</style>
    <html>
        <body>
    <!--------------------------------------------  image for student  (Part 1) ------------------------------------>          
            <div class="div-photo">
            <form method="get" action="edit profile.php" enctype="multipart/form-data">
              <?php
                        global $conn;
                      /*  $name=$_SESSION['full_name'];*/
                        $id=$_SESSION['user_id'];
                        $sql="SELECT USER.* ,student.stu_id,student.stu_specialization 
                        FROM user,student
                        WHERE user.user_id=student.user_id and user.user_id='".$id."';";
                        $result= mysqli_query($conn,$sql);
                        $row =mysqli_fetch_row($result);
                        $img=$row[3];
                        echo " <img class='photo' src='../../sources/image/$img' /> ";    ?>
</div>
   <!--------------------------------------------  information for student  (Part 2) ------------------------------------>          
            <div class="div-data">

                <i id="img1" style="font-size: 27px;" class="las la-id-card"></i>
                <i id="img2" style="font-size: 27px;" class="las la-user"></i>
                <i id="img3" style="font-size: 27px;" class="las la-tv"></i>
              
                <a href="edit profile.php" >
                <input name="bts" class="bt1"  type="button" value="Edit"/></a>
                <a href="..\..\logout.php">
                <input class="bt2" name="edit" type="button" value="Logout"/></a>
                 
                <?php
                        global $conn;
                     /*   $password=$_SESSION['password'];*/
                       
                       /* $name=$_SESSION['full_name'];*/
                         $id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
                         $id3=$_SESSION['pass4'];/** login path كلمة السر غسر مشفرة تم احضارها من  */
                        $sql="SELECT USER.* ,student.stu_id,student.stu_specialization 
                        FROM user,student
                        WHERE user.user_id=student.user_id and user.user_id='".$id."';";
                        $result= mysqli_query($conn,$sql);
                        $row =mysqli_fetch_row($result);
                        $id=$row[5];
                        $name=$row[1];
                        $spe=$row[6];
                        $pass=$row[2];
                        $img=$row[3];
              
              /*          
               if(password_verify($id3,$pass)){
               $test=$id3;
                echo $test;

               }*/
                        /** عرض البيانات التي تم احضارها من قاعدة البيانات  */
                        echo "<lable class='l1'>".$id."</lable>"."<lable class='l2'>".$name."</lable>"."<lable class='l3'>".$spe."</lable>" ;
                            /** session  باستخدام  edit profile  ارسال البيانات الي صفحة  */
                            $_GET['id']=$id;           
                            $_GET['name']=$name;
                            $_GET['spe']=$spe;
                            $_GET['password']=$pass;/**كلمة مرور مشفرة */
                            $_GET['password1']=$id3;/**كلمة مرور غير مشفرة  */
                            $_GET['img']= $img;

                             
                           $_SESSION['id']=$_GET['id'];
                           $_SESSION['name']=$_GET['name'];
                           $_SESSION['spe']=$_GET['spe'];
                           $_SESSION['pass']=$_GET['password']; 
                           $_SESSION['pass2']= $_GET['password1'];
                           $_SESSION['img1']=$_GET['img'];

                           
                           ?>
             
<a href="edit profile.php" > 
<input name="bts" class="bt1"  type="button" value="Edit"/></a>
<a href="..\..\logout.php">
<input class="bt2" name="edit" type="button" value="Logout"/></a>

     </form>
     </div>
     </body>
     </html>
