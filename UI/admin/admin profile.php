<?php 
include("../../Database/db.php");
include("../../controls/profiles.php");
$id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
$id3=$_SESSION['pass2'];/** login path كلمة السر غسر مشفرة تم احضارها من  */
?>

<!DOCTYPE html>
<head>
    <title>admin-profile</title>
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="../../CSS/profiless.css"/>
     <!--icons-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    </head>
    <!--  style for profile student -->
<style>
    span{
    font-size: 35px;
    position: absolute;
    top: 35%;
    left: 40.7%;
    }
.Lablegroup,.LabelAssinaments{
    font-size: 15px;
    position: absolute;
    top: 40%;
    left: 40%;  
}
@media(max-width:682px)
{     
#group{
    position: absolute;
    top: 28%;
    left: 36%;  
}
#file{
    position: absolute;
    top: 28%;
    left: 45%;
}
.LabelAssinaments{
    position: absolute;
    top: 33%;
    left: 42%; 
}
.Lablegroup{
    position: absolute;
    top: 33%;
    left: 35%; 
}}

</style>
<html>

<body>
<form method="get" action="edit profile.php" enctype="multipart/form-data">
<div class="container">
 <!-- container one for photo,groups,assinament data -->
<div class="divphoto">
            <span id="group" class="las la-user-friends"></span>
            <span  id="file" style="margin-left: 15%;" class="las la-user-tie"></span>
            <?php
              imgadmin();
              admingroupcount();
              countTeacherforadminpage();
            ?>
</div>
<!-- ----------------------------- container two ------------------- -->
<div class="divdata" >
<label class="name">Name :</label>
<label class="spe" >User_ID :</label>

            <!-- php code  -->
            <?php
             global $conn;
             $sqln="  SELECT  `full_name`,user.user_id FROM `user` WHERE `role`='admin'and user.user_id='".$id."';";
               $result= mysqli_query($conn,$sqln);
               $row =mysqli_fetch_row($result);
               $name=$row[0];
               $ida=$row[1];
               echo"   <label class='stname' >$name</label>";
               echo"   <label class='stspe' >$ida</label>";
              /** ليتم احضار الصورة ورفعها الي صفحة التعديل   */
               global $conn;
               $id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
               $sqln="  SELECT  `u_img` FROM `user` WHERE `role`='admin' and user.user_id='".$id."';";
                 $result= mysqli_query($conn,$sqln);
                 $row =mysqli_fetch_row($result);
                 $img=$row[0];
                 echo " <img class='photo' src='../../sources/image/$img' /> ";

               $_GET['name']=$name;
               $_GET['password']=$pass;
               $_GET['password1']=$id3;/**كلمة مرور غير مشفرة  */
               $_GET['img']= $img;

                  $_SESSION['name']=$_GET['name'];
                  $_SESSION['pass']=$_GET['password'];  
                  $_SESSION['pass2']= $_GET['password1'];
                  $_SESSION['img1']=$_GET['img'];
            ?>
            <a href="edit admin.php" >
            <input name="bts" class="bt1"  type="button" value="Edit"/></a>
            <a href="..\..\logout.php">
            <input class="bt2"  name="edit" type="button" value="Logout"/></a>
</div>
</div>
</form>
</body>
</html>
