<?php 

include("../../Database/Connection.php");
include("../../Database/db.php");


?>

<!DOCTYPE html>
<head>
    <title>student-profile</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="..\..\CSS\profile.css" />
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    </head>

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
    top: 31%;

}
#img2{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 35%;
    top: 40%;
}
#img3{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 35%;
    top: 50%;
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
    top: 30%;
}
.l2{

position: absolute;
left: 45%;
top: 40%;
}
.l3{

position: absolute;
left: 45%;
top: 50%;
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
.profile-pic-div{
    width:140px ;
     height:140px  ; 
     position: absolute;
     left: 50%;
     top: 50%;  
     transform: translate(-50% ,-50%);
    border-radius: 100%;
    overflow: hidden;
    border: 1px solid grey;

}

#photo{
    height: 100%;
    width: 100%;
}

#file{
    display: none;
}

#uploadBtn{
    height: 40px;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    background: rgba(0, 0, 0, 0.7);
    color: wheat;
    line-height: 30px;
    font-family: sans-serif;
    font-size: 15px;
    cursor: pointer;
    display: none;
}

</style>





</style>
    <html>
        <body>
            <div class="div-photo">
            <form method="get" action="edit profile.php">

              <!--  <img class="photo" src="../../sources/image/user-weman.png" /><br> -->

                <!-- For circular image -->
                <div class="profile-pic-div"  >
                <img src="../../sources/image/create_add_photo.png" id="photo" height="120" width="120" >
                <input type="file" id="file" name="u_img">
                <label for="file" id="uploadBtn">Choose Photo</label>
            </div>


              <!--  <label class="lable-edit-phto">Edit Photo</label> -->
            </div>
            <div class="div-data">
                
                <i id="img1" class="fa-solid fa-id-card"></i>
                <i id="img2"  class="fa-regular fa-user"></i>
                <i id="img3" class="fa-solid fa-desktop"></i>
              
                
                <a href="edit profile.php" >
                <input name="bts" class="bt1"  type="button" value="Edit"/></a>
               <a href="..\..\logout.php"> 
                <input class="bt2" name="but_logout" type="button" value="Logout"/></a>
                </form>

               
             <?php
             

                        global $conn;
                        $name=$_SESSION['full_name'];
                        $pp=$_SESSION['pass'];
                        $sql="SELECT USER.* ,student.stu_id,student.stu_specialization 
                        FROM user,student
                        WHERE user.user_id=student.user_id and user.full_name='".$name."';";
                        $result= mysqli_query($conn,$sql);
                        $row =mysqli_fetch_row($result);
                        $id=$row[5];
                        $name=$row[1];
                        $spe=$row[6];
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
                       



                       
      /* user Image */
    if (!empty($_FILES['u_img']['name'])) {
        $imgName= time() .'_' . $_FILES['u_img']['name'];// تُرجع الدالة الوقت الحالي بعدد الثواني منذ ذلك الحين time() ،  HTTP POST عبارة عن مصفوفة ارتباطية تحتوي على عناصر تم تحميلها عبر طريقة $_FILES
        
        $imgPath= " ../../sources/image/" .$imgName;
        
        $r= move_uploaded_file($_FILES['u_img']['tmp_name'],$imgPath); // تعمل الدالة  على نقل الملف الذي تم تحميله إلى وجهة جديدة.

        if ($r) {
            $_POST['u_img']=$imgName;
        } 
        else {
            array_push($errors,"There is an error uploading the image.");
        }
    }
    else if (empty($_FILES['u_img']['name'])) {
        $_POST['u_img']='blue_rectangle_with_user.JPG';
    }

    /*****************/

   

             ?>
<a href="edit profile.php" >
<input name="bts" class="bt1"  type="button" value="Edit"/></a>
<input class="bt2" name="edit" type="button" value="Logout"/>
</form>
            </div>

                <script>
                 const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');

    //if user hover on img div 

    imgDiv.addEventListener('mouseenter', function(){
        uploadBtn.style.display = "block";
    });

    //if we hover out from img div

    imgDiv.addEventListener('mouseleave', function(){
        uploadBtn.style.display = "none";
    });

    //lets work for image showing functionality when we choose an image to upload

    //when we choose a foto to upload

    file.addEventListener('change', function(){
        //this refers to file
        const choosedFile = this.files[0];

        if (choosedFile) {

            const reader = new FileReader(); //FileReader is a predefined function of JS

            reader.addEventListener('load', function(){
                img.setAttribute('src', reader.result);
            });

            reader.readAsDataURL(choosedFile);

            //Allright is done

            //please like the video
            //comment if have any issue related to vide & also rate my work in comment section

            //And aslo please subscribe for more tutorial like this

            //thanks for watching
        }
    });
</script>
        </body>
    </html>
