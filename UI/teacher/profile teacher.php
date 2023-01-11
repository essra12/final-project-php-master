<?php 
include("../../Database/db.php");
include("../../controls/profiles.php");
 $user_id=$_SESSION['user_id'];
?>

<!DOCTYPE html>
<head>
    <title>Teacher-profile</title>
    <meta name="descreption " content=" " />
     <!--for logo-->
     <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <link rel="stylesheet" href="../../CSS/allprofiles.css"/>
     <!--icons-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    
    </head>
    <!--  style for profile student -->
<style>
    .back{
    position: absolute;
    top: 2%;
    left: 1%;
    font-size: 30px;
}
.LabelAssinaments,.Lablegroup{
    font-size: 20px;
}
.LabelAssinaments{
    font-size: 20px;
}


@media(max-width:582px)
{ 
    .LabelAssinaments,.Lablegroup{
    font-size: 16px;
}
}
</style>
<html>


<body>
    
<form method="get" action="edit profile.php" enctype="multipart/form-data">
<div class="back"><a href="../group/main page for group.php"><i class="las la-arrow-left"></i></a></div>

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
