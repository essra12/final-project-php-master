

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
    *{
        margin: 0;

    }
body{
    background-color: #A4D2F0;
}



/* create teacher  */
.create-t-div{
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
.lable-create-t{
position: absolute;
top: 7%;
left: 50%;
transform: translate(-50%);
font-size: 30px;

}

.img-greate-t{

    position: absolute;
top: 20%;
left: 50%;
transform: translate(-50%);
font-size: 30px; 
height: 15%;
width: 15%;
}
.img-greate-t:hover{
    cursor: pointer;
}

#user-iocn-t{
    position:absolute;
    top: 44%;
    left: 31%;
}

.input-name-t{
    position:absolute;
    top: 43%;
    left: 27%;
    border-bottom: 1px solid black;
    width: 49%;
    margin-left: 1%;
    border-radius: 25px; 
    padding-left: 9%;
    height: 5%;
    
}


#phone-icon-t{
    position:absolute;
    top: 54%;
    left: 31%;
}
.input-number-t{
    position:absolute;
    top: 53%;
    left: 27%;
    border-radius: 25px; 
    padding-left: 9%;
    height: 5%;
        border-bottom: 1px solid black;
        width: 49%;
    margin-left: 1%;

}
#pass-iocn-t{
    position: absolute;
    top: 64%;
    left: 31%;
   
}
.input-pass-t{
    position:absolute;
    top: 63%;
    left: 27%;
    border-radius: 25px; 
    padding-left: 9%;
    height: 5%;
        border-bottom: 1px solid black;
        width: 49%;
    margin-left: 1%;

}

.input-pass2-t{
    position:absolute;
    top: 73%;
    left: 27%;
    border-radius: 25px; 
    padding-left: 9%;
    height: 5%;
        border-bottom: 1px solid black;
    width: 49%;
    margin-left: 1%;

}
#pass2-iocn-t{
    position: absolute;
    top: 74%;
    left: 31%;
   
}
.check-box-t{

    position:absolute;
    top: 83%;
    left: 33%;
    width: 3%;
    height: 3%;  
}
.check-t{
    position:absolute;
    top: 83%;
    left: 37%; 
    color: #6f6f6f;
}
.bt-save-t{
    position:absolute;
    top: 89%;
    left: 27%;
    width: 49%;
    background-color: #222242;
    height: 7%;
    color: white;
    border-radius: 25px;
}
.bt-save-t:hover{
    box-shadow: 4px 4px 4px rgb(135, 134, 134); 

}


/** media when max-width:830px */
@media(max-width:830px)
{
    .create-t-div{
    width: 70%;
}
.lable-create-t{
    font-size: 20px;
}
.img-greate-t{

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
   <!-- GREATE teacher -->
   <div class="create-t-div">
                <label class="lable-create-t">Greate Teacher <br> Account </label>
                <img class="img-greate-t" src="../../sources/image/create.png"/>

                <input id="name" class="input-name-t" type="text"  placeholder="Full Name"/>
                <i  id="user-iocn-t" class="fa-solid fa-user"></i>



                <input id="number" class="input-number-t" type="number"  placeholder="Phone Number" />
                <i id="phone-icon-t" class="fa-solid fa-phone"></i>

                <input id="pass" class="input-pass-t" type="password"  placeholder="password"/>
                <i  id="pass-iocn-t" class="fa-solid fa-lock"></i>


                <input id="cof-pass" class="input-pass2-t" type="password"  placeholder="confirm password"/>
                <i  id="pass2-iocn-t" class="fa-solid fa-lock"></i>


                <input id="check" class="check-box-t" type="checkbox"  />
                <label class="check-t">Admin</label>


                <input class="bt-save-t" type="button" value="Save" onclick="check_Enter()" />
              </div>



<!-- check enter -->
<script>

    function check_Enter() {
   
    const NAME = document.getElementById("name").value;
    const number = document.getElementById("number").value;
    const pass = document.getElementById("pass").value;
    const pass2=document.getElementById("cof-pass").value;
    const check=document.getElementById("check").value;
  
   
    if(NAME==""){
    alert(" pleas enter name");
    return false
    }
    if(number==""){
    alert(" pleas enter number");
    return false
    }
    if(number.length > 10){
    alert(" the number is long");
    return false
    }
    if(number.length < 10){
    alert(" the number is short");
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
