<?php 
include("../../Database/db.php");
include("../../controls/profiles.php");

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
.photo{
    border-radius: 100px;
}
</style>
    <html>
        <body>
    <!--------------------------------------------  image for student  (Part 1) ------------------------------------>          
            <div class="div-photo">
            <form method="get" action="edit profile.php" enctype="multipart/form-data">
              <?php
                      stprofileimg();
                      ?>
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
                       informationPR();
                           ?>
             
<a href="edit profile.php" > 
<input name="bts" class="bt1"  type="button" value="Edit"/></a>
<a href="..\..\logout.php">
<input class="bt2" name="edit" type="button" value="Logout"/></a>

     </form>
     </div>
     </body>
     </html>
