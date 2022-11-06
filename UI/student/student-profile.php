
<?php
?>
<!DOCTYPE html>
<head>
    <title>student-profile</title>
    <meta name="descreption " content=" " />
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>

    </head>

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
    left: 30%;
    top: 21%;

}
#img2{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 30%;
    top: 30%;
}
#img3{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 30%;
    top: 40%;
}
#img4{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 30%;
    top: 50%;
}

.l1{

    position: absolute;
    left: 40%;
    top: 20%;
}
.l2{

position: absolute;
left: 40%;
top: 30%;
}
.l3{

position: absolute;
left: 40%;
top: 40%;
}
.l4{

position: absolute;
left: 40%;
top: 50%;
}
.bt1{

position: absolute;
left: 30%;
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
}

</style>
    <html>
        <body>

       
            <div class="div-photo">
                <img class="photo" src="../../sources/image/user-weman.png" /><br>
                <label class="lable-edit-phto">Edit Photo</label>
            </div>
   

            <div class="div-data">

                <label class="l1"> 172038 </label> 
                <i id="img1" class="fa-solid fa-id-card"></i>


                <label class="l2"> TTT TTT TTT </label>
                <i id="img2"  class="fa-regular fa-user"></i>

                <label class="l3"> programing </label>
                <i id="img3" class="fa-solid fa-desktop"></i>

                <label class="l4"> ************* </label>
                <i id="img4" class="fa-solid fa-lock"></i>

                <a href="test.html" >
                <input class="bt1"  type="button" value="Edit"/></a>
                <input class="bt2" type="button" value="Logout"/>
            
                
            
                

            </div>

          

        </body>
    </html>