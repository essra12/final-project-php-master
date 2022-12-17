
<?php
include("../../Database/db.php");
$id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
$id3=$_SESSION['pass2'];/** login path كلمة السر غسر مشفرة تم احضارها من  */
?>
<!DOCTYPE html>
<head>
    <title>admin-profile</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="..\..\css\profiless.css" />
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
     <!--icons-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

    <!--  style for profile student -->
<style>
    .l3{
        
    position: absolute;
    left: 40%;
    top: 38%;
    font-size: 22px;
    }
     @media(max-width:740px)
        {
    .l33{
width: 50%;
    } 
}

@media(max-width:1250px)
        {
    .l33{
width: 50%;
    }}
    #img44{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 28%;
    top: 29%;
    font-size: 25px;
}
#img33{
    position: absolute;
    left: 28%;
    top: 42%;
}
.l3{
margin-left: 5%;
margin-top: 5%;
}
</style>
    <html>
        <body>
            <div class="div-photo">
<?php
            global $conn;
                      $sqln="  SELECT  `u_img` FROM `user` WHERE `role`='admin' and user.user_id='".$id."';";
                        $result= mysqli_query($conn,$sqln);
                        $row =mysqli_fetch_row($result);
                        $img=$row[0];
                        echo " <img class='photo' src='../../sources/image/$img' /> ";

?>

            <!------------------------>

            </div>
            
            <div class="div-data"> 
                <form method="get" action="edit profile.php">
                <i id="img33"  style="font-size: 35px;" class="las la-user"></i>
                <i id="img44"  style="font-size: 35px;" class="las la-id-card"></i>

             <?php

                        global $conn;
                      $sqln="  SELECT  `full_name`,user.user_id FROM `user` WHERE `role`='admin'and user.user_id='".$id."';";
                        $result= mysqli_query($conn,$sqln);
                        $row =mysqli_fetch_row($result);
                        $name=$row[0];
                        $ida=$row[1];


                   /* <echo"<input  class='l33' type='text' value='$name'/>   ";*/
<<<<<<< HEAD
                        echo"<lable  class='l3'>.$name.</lable>.<lable  class='l1'>.$ida.</lable>   ";
=======
                        echo"<lable  class='l3'>$name</lable>";
>>>>>>> 6ab8fc5bb1582b81e958ca513e548faf9bb5d97f
                        
                        


                          
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
                <input name="bts" class="bt11"  type="button" value="Edit"/></a>
                <input class="bt22" name="edit" type="button" value="Logout"/>
                </form>


            </div>
            </body>
            </html>