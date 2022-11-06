
<?php 
?>
<!DOCTYPE html>
<head>
    <title>main page for groub</title>
    <meta name="descreption " content=" " />
    </head>

<style>
/* style header  */
.header-div{
    box-shadow: 4px 4px 4px rgb(135, 134, 134); 
    padding: 3%;
    text-align: center;
position: relative;

}
.search{
    border: none;
    background-color: #D8E6D6;
    border-radius: 10px;
  width: 25%;
  padding: 1%;

}
.bt{
    border-radius: 10px;
    background-color:#222242;
  padding: 1%;
  color: white;
}
.bt:hover{
    box-shadow: 4px 4px 4px rgb(135, 134, 134); 

}
.photo-div{
    background-color: #222242;
    width: 20%;
   position: absolute;
  top: 0;
  right: 0%;
  bottom: 0%;
  box-shadow: 4px 4px 4px rgb(135, 134, 134); 
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    border-radius: 10px;


}
.img-user{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50% , -50%);
    height: auto;
    width: 60%;
}


/* groups style  */

.Groups{

   display: flex;
   flex-direction: row;
   justify-content: center;
   padding-top: 5%;
   flex-wrap: wrap;
   justify-content: space-around;
width: 50%;
margin-left: auto;
margin-right: auto;
}
.g-java{
background-color:#222242;
width: 200px;
height: 110px;
position: relative;
border-radius: 10px;

}
.bc{
 width: 30%;
position: absolute;
right: 10%;
bottom:  5%;

}
label{
position: absolute;
top: 10%;
left: 5%;
color: white;
font-size: 18px;
}
/* media responsive */

@media(max-width:905px)
{
.g-java{
    margin-top: 10px;
}
.Groups{
    overflow: auto;
}
}



</style>
<html>
<body>
       <!-- header div-->
       <div class="header-div">
            <h1> Hellow , mmm</h1>
            <input class="search" type="search" placeholder="Enter Code Group " /> 
            <input class="bt" type="button" value="search" />
             <div class="photo-div">
                    <img class="img-user" src="sources/image/user-man.png" />
            </div>
        </div>
           
         <!-- Groups 1 -->

       <div class="Groups">   
       <a href="">
          <div class="g-java"> 
          <label> Java </label>
          <img class="bc" src="sources/image/pc.png" />   
      </div>    
      </a>

        <a href="">
        <div class="g-java"> 
            <label> Java </label>
            <img class="bc" src="sources/image/pc.png" />   
           </div> 
        </a>
        </div>
     <!-- Groups 1 -->

       <div class="Groups"> 

       <a href="">
        <div class="g-java"> 
            <label> Java </label>
            <img class="bc" src="sources/image/pc.png" />   
           </div>  
        </a> 

        <a href="">
          <div class="g-java"> 
            <label> Java </label>
            <img class="bc" src="sources/image/pc.png" />   
          </div>  
        </a> 

        </div>
</body>
</html>