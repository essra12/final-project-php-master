<?php 
include("../../path.php"); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control_Panel_Groups</title>
        <link rel="stylesheet" href="../../css/group_tr_stu_file_control_panel.css">
        <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>

        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

    <style>
        /* create admin form*/
        body{
            background-color: #A4D2F0;
        }

.create-g-div{
    background-color: white;
    width: 50%;
height: 90vh;
border-radius: 15px;
display: inline-block;
position: absolute;
left: 70%;
top: 5%;
transform: translate(-70%); 
text-align: center;
}
.lable-create{

position: absolute;
top: 7%;
left: 50%;
transform: translate(-50%);
font-size: 30px;

}
.img-greate{

    position: absolute;
top: 20%;
left: 50%;
transform: translate(-50%);
font-size: 30px; 
height: 15%;
width: 15%;
}
.img-greate:hover{

  cursor: pointer;

}
#user-iocn{
    position:absolute;
    top: 46%;
    left: 33%;
}
.input-name{
    position:absolute;
    top: 45%;
    left: 30%;
   border-bottom: 1px solid black;
    width: 40%;
    margin-left: 1%;

    border-radius: 25px; 
    padding-left: 9%;
    height: 5%; 
}
#pass-iocn{
    position: absolute;
    top: 56%;
    left: 33%;
   
}
.input-pass{
    position:absolute;
    top: 55%;
    left: 30%;
    border-bottom: 1px solid black;
    width: 40%;
    margin-left: 1%;
    border-radius: 25px; 
    padding-left: 9%;
    height: 5%;

}
.input-pass2{
    position:absolute;
    top: 65%;
    left: 30%;
    border-radius: 25px; 
    padding-left: 9%;
    height: 5%;
        border-bottom: 1px solid black;
    width: 40%;
    margin-left: 1%;
}
#pass2-iocn{
    position: absolute;
    top: 66%;
    left: 33%;
   
}

.check-box-admiin{

    position:absolute;
    top: 75%;
    left: 33%;
    width: 3%;
    height: 3%;  
}
.lb{
    position:absolute;
    top: 75%;
    left: 38%; 
    color: #6f6f6f;
}
.bt-save{
    position:absolute;
    top: 85%;
    left: 30%;
    width: 47%;
    background-color: #222242;
    height: 7%;
    color: white;
    border-radius: 25px;
}
.bt-save:hover{
    box-shadow: 4px 4px 4px rgb(135, 134, 134); 

}
.div-admin-footer{
background-color: #bababa;
width: 70%;
height: 15vh;
position: absolute;
bottom: 2%;
left: 15%;
border-radius: 15px;
}
.img-ad-footer{
    width: 40%;
    height: 20%;
    position: absolute;
    bottom: 8%;
    left: 30%;
   
}

.bt-admin{
position: absolute;
left:  50%;
transform: translate(-50%);
bottom: 5%;
border-radius: 15px;
background-color: #A4D2F0;
border: none;
height: 30%;
width: 40%;
text-align: center;
}

@media(max-width:800px)
{

.create-g-div{
    width: 60%;
}

.lable-create{
    font-size: 25px;
  
}
.img-greate{
    padding-top: 5%;
}
.input-name,.input-pass,.input-pass2{
    width: 50%;
}
.bt-save{
    width: 50%;
   
}
}
    </style>

<body  class="b-white">

<!-- menu -->
<?php include(MAIN_PATH."/common/sidebar.php"); ?> 
<!-------------------->

<header class="main_icon">
    <div class="header-title">
        <label for="menu-toggle">
            <span class="las la-bars"></span>
        </label>
    </div>
</header>
<!--  main content -->

<div class="main-content">
    

 


    <main>
        <!-- GREATE GROUPS -->
        <div class="create-a-div">
                <label class="lable-create">Greate Teacher <br> Account </label>
                <img class="img-greate" src="../../sources/image/create.png"/>

                <input id="name" class="input-name" type="text"  placeholder="Full Name"/>
                <i  id="user-iocn" class="fa-solid fa-user"></i>


                <input id="pass" class="input-pass" type="password"  placeholder="password"/>
                <i  id="pass-iocn" class="fa-solid fa-lock"></i>

                <input id="cof-pass" class="input-pass2" type="password"  placeholder="confirm password"/>
                <i  id="pass2-iocn" class="fa-solid fa-lock"></i>

                <input id="check" class="check-box-admiin" type="checkbox"  />
                <label class="lb">Admin</label>

                <input class="bt-save" type="button" value="Save" onclick="check_Enter()" />
              
               </div>


    </main>

 </div>


<!-- check enter -->
<script>

    function check_Enter() {
   
    const NAME = document.getElementById("name").value;
    const pass = document.getElementById("pass").value;
    const pass2=document.getElementById("cof-pass").value;
    const check=document.getElementById("check").value;
  
   
    if(NAME==""){
    alert(" pleas enter name");
    return false
    }
    
    else if(pass==""){
    alert("    pleas enter password ");
    return false
    }
    if(pass2==""){
    alert(" pleas enter password again");
    return false
    }
  if(pass != pass2){
  alert(" the password is not equal ");
  return false
    }
    if (!document.getElementById('check').checked) {
        alert("You didn't check it!");
        return false     
            }
    }
    </script>
</body>
</html>
