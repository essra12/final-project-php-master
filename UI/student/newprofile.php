<?php 
include("../../Database/db.php");
include("../../controls/profiles.php");
 $id=$_SESSION['id'];

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
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: "Poppins", sans-serif;
}
.photo{
    border-radius: 100px;
}
.containerimg{
    background-color: #D8E6D6;
    width: 80%;
    height: 40vh;
    position: absolute;
    top: 5%;
    left: 10%;
    right: 10%;
}

.containerdata{
    background-color: #2A3D6C;
    width: 80%;
    height: 50vh;
    position: absolute;
    top: 45%;
    left: 10%;
    right: 10%;
}
.grouplable{
    position: absolute;
    top: 70%;
    left: 20%
}
.asslable{
    position: absolute;
    top: 70%;
right: 21%;
}
.groupnumber{
    position: absolute;
    top: 80%;
    left: 23%  
}
.assnumber{
    position: absolute;
    top: 80%;
    right: 26%;  
}
.bts{
    position: absolute;
    top: 85%;
    left: 25%;
}
</style>
    <html>
        <body>
            <form method="get" action="edit profile.php" enctype="multipart/form-data">

            <div class="containerimg">
            <?php
                      stprofileimg();

                ?>
                <label class="grouplable">Group </label>
                <label class="asslable">Assignment </label>

                <label class="groupnumber">6 </label>
                <label class="assnumber">22 </label>

            </div>
            <div class="containerdata">

            <i id="img1" style="font-size: 27px;" class="las la-id-card"></i>
                <i id="img2" style="font-size: 27px;" class="las la-user"></i>
                <i id="img3" style="font-size: 27px;" class="las la-phone"></i>

            <?php
                      informationPR();
                           ?>

<a href="edit teaher.php" >
                <input name="bts" class="bt1" style="background-color: #D8E6D6;" type="button" value="Edit"/></a>
                <a href="..\..\logout.php">
                <input class="bt22"  name="edit" type="button" value="Logout"/></a>
              <?php
        
           
                    /*  stprofileimg();*/

                ?>
</div>
   <!--------------------------------------------  information for student  (Part 2) ------------------------------------>          
          
                <?php
                     /*  informationPR();*/
                           ?>


     </form>
     </body>
     </html>
