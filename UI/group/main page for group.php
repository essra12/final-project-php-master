
<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/main_group_page.php");
/*include(MAIN_PATH."/controls/leave_student.php");*/
$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];

//------for get image---------
$sql="SELECT u_img FROM user Where user_id='$user_id';";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
      $img=$row["u_img"];
    }
}
//------for get stu id---------
if ($_SESSION['role']==""):
  $sql="SELECT stu_id FROM student Where user_id='$user_id';";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
      while($row = $result->fetch_assoc()) {
        $stu_id=$row["stu_id"];
        $_SESSION["stu_id"]=$stu_id;
      }
  }
endif;
  
  //----------------------
?>

<!DOCTYPE html>
<head>
    <title>Main page </title>
    <meta name="descreption " content=" " />
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <link rel="stylesheet" href="../../css/main_page_.css">
    <link rel="stylesheet" href="../../css/BackToTopButton.css">
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <!--x icon-->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!----notefication icon----->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-------------------------->
    
     <style>
        * {
      list-style-type: none;
      }
      input:focus {
    outline: none;
  }
  #icon3{
      align-content:center;
      justify-items: right;
      color: #000;
      float: right;
      margin-top: 6%;
      position: absolute;
      top: 15%;
      left: 74%;
      font-size: 16px;
    }
   #icon3:hover{
    color:orange;
   }
 
    </style>
         
</head>
   
   
<html>
<body>
   <!------------------------nav bar------------------------------>
   <nav class="navbar">
      <ul class="lift-side">
          <!-------logo------>
          <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 110px; margin-top: 5px; margin-left:10px;"/></div></li>
          <!----------------->
      </ul>
      <div class="center">
       <p style="color:#222242;">....</p>
      </div>
      <ul>
        <!------HOME------->
        <li><a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>" style="font-size: 1.5rem;"><i class="las la-home"></i></a></li>
        <!---------------->

        <!------support------->
        <li><a href="../support.php" style="font-size: 1.5rem;"><i class="lar la-question-circle"></i></a></li>
        <!---------------->

        <!---notification--->
        <?php if ($_SESSION['role']==""):?> 
        <li onclick="num(this)">
          <?php $sql1 = "SELECT announcement.*,groups.g_name FROM announcement,groups,student_announcement,student_group WHERE announcement.g_no=groups.g_no AND student_announcement.an_no=announcement.an_no AND student_group.g_no=groups.g_no AND student_announcement.stu_group=student_group.stu_group  
                         AND student_group.stu_id='$stu_id' AND status='0' ORDER BY an_Datetime DESC;";
          global $conn;
          $res = mysqli_query($conn, $sql1); ?>
          <a href="#" id="notifications">
            <label for="check">
              <i class="fa fa-bell-o" aria-hidden="true"></i>
              <span id="notification_num" class="count"><?php echo mysqli_num_rows($res);?></span>
            </label>
          </a>
          <input type="checkbox" class="dropdown-check" id="check" />
          <ul id="dropdown" class="dropdown" style="width: 300px;">
            <?php
            if (mysqli_num_rows($res) > 0) {
              foreach ($res as $item) { ?>
                <li><h5><?php echo $item["g_name"]; ?></h5><?php echo $item["an_content"]; ?></li>
            <?php 
              }
            }
            else{?>
                <li><h5>no notification</h5></li>
            <?php } ?>
          </ul>
        </li>  
        <?php endif; ?>
        <!------Logout----->
          <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
        <!------------------>
      </ul>
    </nav>
    <!-------------------------------------------------------------->
       <!-- header div-->
       <div class="header-div">
             <h5 id="date" style="font-size:24px; padding-bottom: 10px; padding-left:14px;">  </h5>
            <form class="example"  method="POST" action="" onsubmit= "return check__Enter(this)">
            <div class="full_name">
            <h1> Hello , <?php echo $full_name;?></h1>
            </div>

            <!--------------join------------------>
           <?php if($role==""):?>
            
            <div class="search">
            <input type="text" placeholder=" Enter Group Code" id="search" name="search" onkeypress="return onlyNumberKey(event)" >
            <button type="submit" name="submit">Join</button>
            </div>
            <?php search()?> 
            <?php endif;?>
            
            <?php if($role=="teacher"):?>
            
            <div class="search">
            <input type="text" placeholder=" Create New Group" id="Create" name="g_name" >
            <button type="submit" name="Create" id="btn" style="font-weight: 900;" onclick="return check__Enter(this)">+</button>
            </div>
            
            <?php endif;?>


             <!--  Errors -->
             <?php include("../../controls/errors.php")?>
            <!--********************-->
            </form> 
            <!-------------------------------------->
            
         
              <div class="photo-div">                
              <a href="..\student\student-profile.php"><img id="img" onmouseover="setNewImage1(this)" onmouseout="setOldImage()"  class="img-user" src="<?php echo BASE_URL . '/sources/image/'.$img  ?> " style="border-radius: 100%; "/></a>
              </div> 
           
            <!-- ************************************************************************************* -->
            <!-- ****************image section for teacher************************* -->
            <?php if($role=="teacher"):?>
            
                 <div class="photo-div">
                  <a href="..\teacher\profile teacher.php"><img id="imgteacher" onmouseover="setNewImage1(this)" onmouseout="setOldImage()" class="img-user" src="<?php echo BASE_URL . '/sources/image/'.$img  ?> " style="border-radius: 100%; "/></a>
                </div> 
                <section id="section_scroll" class="demo">
                 <a href="#section"><span></span></a>
               </section>
               </div>
            <?php endif;?>

          
        <section id="section_scroll" class="demo">
        <a href="#section"><span></span></a>
        </section>
        </div>

        <h1 style=" padding:3% 18% 0% 18%;"> Groups </h1>

                <!-- For Succes -->
                <?php if (isset($_SESSION['message'])): ?>
                <div class="msg success" style="color: #5a9d48; padding:3% 18% 0% 18%;">
                <li><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px; "></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
                <?php
                /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
                unset($_SESSION['message']);
                ?>
            </div>
          <?php endif; ?>
        <!----------------->
           
         <!-- ************************************************************************************* -->
         <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

 <!-- cards section-->
 <!--------------------------------------------------------------------->
<!------------------------no data section------------------------------->
<!--------------display this section when there is no groups------------>
<!--------------------------------------------------------------------->
<?php if($role==""):?>
<?php

$user_id=$_SESSION['user_id'];
$query="SELECT stu_id FROM student,user WHERE student.user_id=user.user_id and user.user_id='".$user_id."'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
  $id=$row['stu_id'];
}}
$sql="SELECT * FROM groups,student_group WHERE groups.g_no=student_group.g_no and student_group.stu_id='.$id.';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $display=$row['g_no'];
    
  }
}
else{
$display=null;
}
?>
<?php if(empty($display)){ ?>
  <div class="nodata">
  <img src="../../sources/image/Empty state .png" class="nodata_image"/>
  <p>No courese yet,you need to join the group to see the items </p>
</div>
<?php } ?>
<?php endif;?>

 <!-----------------Dynamically Create Card------------------------------->
 <!-------------------for student  section--------------------------------> 
 <?php if($role==""):?>
  <!------foreach loop--------->
  <?php $groupsInfo=selectGroupName();?>
 <main>  
 <div id="section" class="container">
  <div class="cards">
  <?php foreach($groupsInfo as $key => $Info):?>
    <div href="" class="card">
        <img src="../../sources/image/background.png" class="card__image" alt="" />
          <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          
          <div class="card__header-text">
            <a href="inside_group.php?data=<?= $Info['g_name']?>&number=<?= $Info['g_no']?>"  style=" color:#000;
          text-decoration:none;"><h3 class="card__title"><?php echo $Info['g_name'] ?></h3> </a>        
          </div>
        </div>
      </div>
  </div>  
  <?php endforeach; ?>    
   </div>
 </div>
</main>
<?php endif;?>
<!-------------------------------------------------------------------->
<!-------------------for Teacher  section----------------------------->
<?php if($role=="teacher"):?>
  <?php $groupsInfoForTeacher=selectGroupNameForTeacher()?>
  <main>
<div id="section" class="container">      
 <div class="cards">
 <?php foreach($groupsInfoForTeacher as $key => $Info):?>
   <div href="" class="card">       
     <img src="../../sources/image/background.png" class="card__image" alt="" />
     <div class="card__overlay">
       <div class="card__header">
         <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
         
         <div class="card__header-text">
         <?php $_SESSION['g_no']=$Info['g_no']?>
           <a href="inside_group.php?data=<?= $Info['g_name']?>&number=<?= $Info['g_no']?>"  style=" color:#000; text-decoration:none;"><h3 class="card__title"><?php echo $Info['g_name'] ?></h3> </a> 
           <a  href="editing-group.php?name-g=<?php echo $Info['g_name'] ?>&gno=<?= $Info['g_no']?>&trID=<?= $Info['tr_id']?>" id="edit">Edit<!-- <i id="icon3" class="las la-pen ticon edit" ></i> --></a>
           <!-- <a class="child" href="main page for group.php?deleteID=<?php /* echo $Info['g_no']; */ ?>" onclick="return confirmDelete()"><i id="icon2" class="fa-solid fa-xmark"></i></a> -->       
         </div>
       </div>
     </div>
 </div>  
 <?php endforeach; ?>    
  </div>
</div>
</main>
<?php endif;?>

 
<!-------------------------------------------------------------------->

<!-------------------------------------------------------------------->    
<!-- java script for current date -->
<!--------Notification--------->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
  $(document).ready(function() {
    $("#notifications").on("click", function() {
        $.ajax({
        url:'readNotifications.php',
        success:  function(res) {
        console.log(res);
        } 
        
      }); 
    });
  });

  function num() {
    document.getElementById("notification_num").innerHTML = "0";
  }
  /*****************************/

    /********for sidebar (highlights items after click it)**********/
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('.navbar-links li a').forEach(link => {
    if(link.href.includes(`${activePage}`)){
        link.classList.add('active');
        console.log(link);
    }
    })

    /****************************************************************/
    const month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
    var dt = new Date();
    let name = month[dt.getMonth()];
    /*  var date = dt.getDate()+'-'+name+'-'+dt.getFullYear(); */
    var date =name+'   '+dt.getDate()+','+dt.getFullYear();
    document.getElementById('date').innerHTML=date;

   /**********************check Enter******************************/
 function check__Enter() {
   search = document.getElementById("search").value;
   Create = document.getElementById("Create").value;
  if(search==""){
  alert(" you should Enter Group Code");
  return false
  }
  if(Create==""){
  alert(" you should Enter an Name to Create the group");
  return false
  }
}
  /* when do not enter number */
/*   function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)){
            alert(" please enter Just Number");
            return false;
        }
        return true;
    } */
  /********************************************************* */
    $(function() {
  $('a[href*=#]').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
  });
});
function setNewImage1(){  document.getElementById("img").src="../../sources/image/view.png";
  document.getElementById("imgteacher").src="../../sources/image/view.png";}

function setOldImage(){ document.getElementById("img").src="<?php echo BASE_URL . '/sources/image/'.$img  ?>";
  document.getElementById("imgteacher").src="<?php echo BASE_URL . '/sources/image/'.$img  ?>";}

    /*******************for delet confirm***********************/
    function confirmDelete() {
    if (confirm("Are you sure you want to delete ?")) {
        return true;
    } 
    else {
        return false;
    }
}
    /***********************************************************/
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
    </script>
      
</body>
</html>