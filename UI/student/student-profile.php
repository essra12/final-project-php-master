<?php 
include("../../path.php");  
include(MAIN_PATH."/controls/stu_profile.php"); 

?>

<!DOCTYPE html>
<head>
    <title>student-profile</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="..\..\CSS\profile.css" />
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    </head>

    <html>
        <body>
            <div class="div-photo">
                <img class="photo" src="../../sources/image/user-weman.png" /><br>
                <label class="lable-edit-phto">Edit Photo</label>
            </div>
            <div class="div-data">
                
                <form method="post" action="edit profile.php">
                </i>
                <i id="img2"  class="fa-regular fa-user"></i>
                <i id="img3" class="fa-solid fa-desktop"></i>
                <i id="img4" class="fa-solid fa-lock"></i>
              
                <?php if ($data): ?>
         <ul>
         <?php foreach($data as $row): ?>
         <li><?= $row['u_img'] ?></li>
        <li><?=  $row['stu_id'] ?></li>
        <li><?= $row['full_name'] ?></li>
        <li><?= $row['password'] ?></li>
        <li><?= $row['stu_specialization'] ?></li>
        <?php endforeach ?>
         </ul>
         <?php else: ?>
          No data found
         <?php endif ?>
                
                <a href="edit profile.php" >
                <input name="bts" class="bt1"  type="button" value="Edit"/></a>
               <a href="..\..\logout.php"> 
                <input class="bt2" name="but_logout" type="button" value="Logout"/></a>
                </form>


            </div>
    </body>
 </html>