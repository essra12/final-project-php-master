

<?php
?>
<!DOCTYPE html>
<head>
    <title>edit profile</title>
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
/** photo section  */
.div-photo{
background-color: #222242;    
border-radius: 15px 0px 0px 15px;
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

/** information section  */

.l1{

    position: absolute;
    left: 27%;
    top: 21%;
    width: 40%;
    border-radius: 25px; 
    padding-left: 10%;
    height: 5%;
}
#user-iocn{
    position:absolute;
    top: 22.5%;
    left: 29.5%;
}
.l2{

position: absolute;
left: 27%;
top: 31%;
width: 40%;
border-radius: 25px; 
padding-left: 10%;
    height: 5%;
}
#user-iocn1{
    position:absolute;
    top: 32.5%;
    left: 29.5%;
}
.l3{

position: absolute;
left: 27%;
top: 41%;
width: 40%;
border-radius: 25px; 
    padding-left: 10%;
    height: 5%;
}
#pc-icon{
    position:absolute;
    top: 42.5%;
    left: 29.5%;   
}
.l4{

position: absolute;
left: 27%;
top: 51%;
width: 40%;
border-radius: 25px; 
padding-left: 10%;
    height: 5%;
}
#pass-iocn{
    position: absolute;
    top: 52.5%;
    left: 29.5%;
   
}
.l5{

position: absolute;
left: 27%;
top: 61%;
width: 40%;
border-radius: 25px; 
padding-left: 10%;
    height: 5%;
}
#pass2-iocn{
    position: absolute;
    top: 62.5%;
    left: 29.5%;
   
}

.bt1{

position: absolute;
left: 28%;
top: 75%;
width: 50%;
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

label{
    font-size: 25px;
}
/** media when max-width:700px */

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

                <input id="id" class="l1" type="text" placeholder="ID"/>  <br>
                <i id="user-iocn" class="fa-solid fa-id-card"></i>

                <input id="name" class="l2" type="text"  placeholder="Full Name "/> <br>
                <i  id="user-iocn1" class="fa-regular fa-user"></i>


                <input id="spe" class="l3"  type="text"   placeholder="specialization"/> <br>
                <i id="pc-icon" class="fa-solid fa-desktop"></i>

                <input id="pass" class="l4" type="password" placeholder="Password" /><br>
                <i  id="pass-iocn" class="fa-solid fa-lock"></i>

                <input id="cof-pass" class="l5" type="password" placeholder="confirm password" /><br>
                <i  id="pass2-iocn" class="fa-solid fa-lock"></i>
               
                <input class="bt1"  type="button" value="Save"  onclick="check__Enter()" />
 
            </div>

        
            <script>
               //check inputs !

                function check__Enter() {
                const id = document.getElementById("id").value;
                const NAME = document.getElementById("name").value;
                const pass = document.getElementById("pass").value;
                const pass2=document.getElementById("cof-pass").value;
                const specialization=document.getElementById("spe").value;
              
                if(id==""){
                alert(" pleas enter ID");
                return false
                }
                if(NAME==""){
                alert(" pleas enter name");
                return false
                }
                
                if(specialization==""){
                alert(" pleas enter specialization ");
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
                }
                </script>

        </body>
    </html>