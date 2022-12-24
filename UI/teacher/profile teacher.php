<?php 
include("../../Database/db.php");
include("../../controls/profiles.php");
 $user_id=$_SESSION['user_id'];
?>

<!DOCTYPE html>
<head>
    <title>Teacher-profile</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="../../CSS/profile.css"/>
     <!--icons-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    
    </head>
    <!--  style for profile student -->
<style>
    .divphoto{
        border-radius: 20px 20px 0px 0px;
    }
    .divdata{
        border-radius:0px 0px  20px 20px;
    }
</style>
<html>


<body>
<form method="get" action="edit profile.php" enctype="multipart/form-data">
<div class="container">
        <!-- container one for photo,groups,assinament data -->
    <div class="divphoto">
            <span id="group" class="las la-user-friends"></span>
            <span  id="file" style="margin-left: 15%;" class="lar la-file"></span>
            <span id="id" style="margin-left: 30%;" class="las la-id-card"></span>
            <!-- php code  -->
            <?php
             imgteacher();
            countgroupteacher();
                         ?>
    </div>
<!-- ----------------------------- container two ------------------- -->
    <div class="divdata" >
    <label class="name">Name :</label>
    <label class="spe" >Phone Number :</label>
            <!-- php code  -->
            <?php
            dataforteacher();
            ?>
            <a href="edit teaher.php" >
            <input name="bts" class="bt1"  type="button" value="Edit"/></a>
            <a href="..\..\logout.php">
            <input class="bt2"  name="edit" type="button" value="Logout"/></a>
    </div>
</div>
</form>
</body>
</html>
