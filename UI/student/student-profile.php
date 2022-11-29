<?php 

include("../../Database/Connection.php");
include("../../Database/db.php");


?>

<!DOCTYPE html>
<head>
    <title>student-profile</title>
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
            <form method="get" action="edit profile.php"  enctype="multipart/form-data">
              <?php
             
                        global $conn;
                        $name=$_SESSION['full_name'];
                        $sql="SELECT USER.* ,student.stu_id,student.stu_specialization 
                        FROM user,student
                        WHERE user.user_id=student.user_id and user.full_name='".$name."';";
                        $result= mysqli_query($conn,$sql);
                        $row =mysqli_fetch_row($result);
                        $img=$row[3];

              echo " <img class='photo' src='../../sources/image/$img' /> ";
?>
            </div>
            <div class="div-data">
                
                <i id="img1" class="fa-solid fa-id-card"></i>
                <i id="img2"  class="fa-regular fa-user"></i>
                <i id="img3" class="fa-solid fa-desktop"></i>
              
                
                <a href="edit profile.php" >
                <input name="bts" class="bt1"  type="button" value="Edit"/></a>
                <a href="..\..\logout.php">
                <input class="bt2" name="edit" type="button" value="Logout"/></a>
                </form>  
             <?php
             
                        global $conn;
                        $name=$_SESSION['full_name'];
                        $sql="SELECT USER.* ,student.stu_id,student.stu_specialization 
                        FROM user,student
                        WHERE user.user_id=student.user_id and user.full_name='".$name."';";
                        $result= mysqli_query($conn,$sql);
                        $row =mysqli_fetch_row($result);
                        $id=$row[5];
                        $name=$row[1];
                        $spe=$row[6];
                        $img=$row[3];
                     /*   $img=$row[3];*/
                     
                        /** to encryption password  */

                        echo "<lable class='l1'>". $id. "</lable>"."<lable class='l2'>" .$name ."</lable>" . "<lable class='l3'>" .$spe ."</lable>" ;
                            $_GET['id']=$id;           
                            $_GET['name']=$name;
                            $_GET['spe']=$spe;
                            $_GET['password']=$pass;
                             
                           $_SESSION['id']=$_GET['id'];
                           $_SESSION['name']=$_GET['name'];
                           $_SESSION['spe']=$_GET['spe'];
                           $_SESSION['pass']=$_GET['password'];
                       
             ?>
             
<a href="edit profile.php" > 
<input name="bts" class="bt1"  type="button" value="Edit"/></a>
                
<a href="..\..\logout.php">
<input class="bt2" name="edit" type="button" value="Logout"/></a>
</form>
            </div>
     </body>
    </html>
