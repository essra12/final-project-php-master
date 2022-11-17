<?php 
include("../../path.php");  
include(MAIN_PATH."/controls/stu_profile.php"); 

<<<<<<< HEAD
<?php
include("../../Database/db.php");
=======
>>>>>>> 05012fa6585c3fb6a0d9f7673c06400ed1d02a2a
?>

<!DOCTYPE html>
<head>
    <title>student-profile</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="..\..\CSS\profile.css" />
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    </head>

<<<<<<< HEAD
    <!--  style for profile student -->
<style>
body{
    background-color: #A4D2F0;
    display: flex;
    flex-direction: row;
    justify-content: center;
}

div{
    width: 40%;
    height: 500px;

}
.div-photo{
    background-color: #222242;
    border-radius: 10px 0px 0px 10px;
    box-shadow: -3px 3px 10px rgb(0 0 0 / 0.2);
    z-index: 1;
    margin-left: 5%;
    margin-top: 5%;
    text-align: center;
    color: white;
    position: relative;

}
.div-data{
    background-color: white;
    border-radius: 0px 15px 15px 0px;
    box-shadow: 3px 3px 10px rgb(0 0 0 / 0.2);
    margin-right: 5%;
    margin-top: 5%;
    z-index: 0;
    position: relative;
    text-align: center;
    

}
.photo{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50% , -50%);

}
.lable-edit-phto{
position: absolute;
top: 70%;
left: 52%;
transform: translate(-80% ,-52%);
margin-left: 4%;
}

#img1{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 35%;
    top: 21%;

}
#img2{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 35%;
    top: 30%;
}
#img3{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 35%;
    top: 40%;
}
#img4{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 35%;
    top: 50%;
}

.l1{

    position: absolute;
    left: 45%;
    top: 20%;
}
.l2{

position: absolute;
left: 45%;
top: 30%;
}
.l3{

position: absolute;
left: 45%;
top: 40%;
}
.l4{

position: absolute;
left: 45%;
top: 50%;
}
.l1,.l2,.l3,.l4{
    font-size: 22px;
}

.bt1{

position: absolute;
left: 25%;
top: 70%;
width: 20%;
border: none;
background-color: #222242;
height: 35px;
color: white;
border-radius: 25px;
text-align: center;

}
.bt1:hover{
    box-shadow: 4px 4px 4px rgb(135, 134, 134); 
    color: #222242;
    background-color: white;
    font-weight: bolder;
    border: 2px solid #222242;
    cursor: pointer;

}
.bt2{

position: absolute;
left: 55%;
top: 70%;
width: 20%;
border: none;
background-color: #e72121;
height: 35px;
color: white;
border-radius: 25px;
text-align: center;

}
.bt2:hover{
    box-shadow: 4px 4px 4px rgb(135, 134, 134); 
    color: red;
    background-color: white;
    font-weight: bolder;
    border: 2px solid red;
    cursor: pointer;

}
label{
    font-size: 25px;
}
@media(max-width:740px)
{


    label{
    font-size: 18px;
}

.bt1{

position: absolute;
left: 35%;
top: 70%;
width: 30%;
border: none;
background-color: #222242;
height: 35px;
color: white;
border-radius: 25px;
text-align: center;

}

.bt2{

position: absolute;
left: 35%;
top: 80%;
width: 30%;
border: none;
background-color: #e72121;
height: 35px;
color: white;
border-radius: 25px;
text-align: center;
}
}
@media(max-width:700px)
{
  label{
    font-size: 18px;
}
.div-data{
    width: 70%;
}
.div-photo{
    width: 30%;
}
.photo{
    width: 62%;
    height: 18vh;
}
.lable-edit-phto{
    margin-left: 11%;
}
}

#file1{
    display: none;
}
#uploadBtn1{
   cursor: pointer; 
    position: absolute;
    top: 95%;
    left: 35%;
    transform: translate(-30% ,-95%);
    text-align: center;
    color: white;
    line-height: 30px;
    font-family: sans-serif;
    font-size: 21px;
}
</style>





</style>
=======
>>>>>>> 05012fa6585c3fb6a0d9f7673c06400ed1d02a2a
    <html>
        <body>
            <div class="div-photo">
              <!--  <img class="photo" src="../../sources/image/user-weman.png" /><br> -->
                <!-- For circular image -->
                <div class="profile-pic-div" style="width:160px ; height:160px  ; position: absolute;left: 50%;  top: 50%;    transform: translate(-50% ,-50%);
 " >
                    <img src="..\..\sources\image\user-weman.png" id="photo" height="120" width="120">
                    <input type="file" id="file1" name="u_img">
                    <label for="file" id="uploadBtn1" >Edit Photo</label>
                </div>

              <!--  <label class="lable-edit-phto">Edit Photo</label> -->
            </div>
            <div class="div-data">
                
<<<<<<< HEAD
                <form method="get" action="edit profile.php">
                <i id="img1" class="fa-solid fa-id-card"></i>
=======
                <form method="post" action="edit profile.php">
                </i>
>>>>>>> 05012fa6585c3fb6a0d9f7673c06400ed1d02a2a
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

<<<<<<< HEAD
               
             <?php

                        global $conn;
                        $fullname=$_SESSION['fullname'];

                        $sql="SELECT USER.* ,student.stu_id,student.stu_specialization
                        FROM user,student
                        WHERE user.user_id=student.user_id and user.full_name='".$fullname."';";




                      /*  $sqln="SELECT user.* ,student.stu_specialization ,student.stu_id
                        from user ,student 
                        WHERE user.user_id=student.user_id and user.full_name=$name ;";*/

                        $result= mysqli_query($conn,$sql);
                        $row =mysqli_fetch_row($result);
                        $id=$row[5];
                        $name=$row[1];
                        $spe=$row[6];
                        $pass=$row[2];


                        echo "<lable class='l1'>". $id. "</lable>"."<lable class='l2'>" .$name ."</lable>" . "<lable class='l3'>" .$spe ."</lable>" ."<lable class='l4'>".$pass."</lable>" ;

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
                <input class="bt2" name="edit" type="button" value="Logout"/>
                </form>


            </div>
        </body>
    </html>
=======

            </div>
    </body>
 </html>
>>>>>>> 05012fa6585c3fb6a0d9f7673c06400ed1d02a2a
