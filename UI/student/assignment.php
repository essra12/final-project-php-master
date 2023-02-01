<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/assigment__.php");

$files=infoforstudent();

//to get group name
$sql="SELECT g_name FROM groups Where g_no='$group_no';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../../css/material.css"> 
     <link rel="stylesheet" href="../../css/BackToTopButton.css">
       <!--icon8-->
       <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
      <title>Assignments</title>
    <style>
     a:link, a:visited{
      text-decoration: none; 
      color:#000}
      .las.la-clock{
      font-size: 16px;
      margin-right: 5px;}
    </style>
    
</head>
<body>
 <!--------------------navigation_bar ----------------------->  
 <nav class="navbar">
  <ul class="lift-side">
      <!-------back------>
      <li><div class="back"><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $group_no?>"><i class="las la-arrow-left"></i></a></div></li>
      <!----------------->

      <!-------logo------>
      <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
      <!----------------->
  </ul>
  <div class="navbar-links">
    <ul>
      <!----group name--->
      <li><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $group_no?>" style="padding-top:.5rem;"><?php echo $g_name ?></a></li>
      <!----------------->

      <!-----students--->
      <li><a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>"  style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li> 
      <!----------------->

      <!------HOME------>
      <li><a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>" style="font-size: 1.5rem;"><i class="las la-home"></i></a></li>
      <!---------------->
      
      <!------Logout----->
      <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
      <!----------------->
    </ul>
  </div>
</nav> 
 <!---------------------------------------------------------->
 <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  <!--------------------  -------------------------> 

<div class="header-div">
 <h1>Assignments</h1>
 <div id="mybutton">
    <div>
       <a href="../teacher/announcement.php"><button class="btn-create" id="btn-create">+</button></a>
    </div>
  </div>
 </div>
 <!-----------------Dynamically Create Card-----------------> 
 <hr>
<!------------------------no data section------------------------------->
<!--------------display this section when there is no Assignments---------->
<!--------------------------------------------------------------------->
<?php if($files==null){ ?>
  <div class="nodata">
  <img src="../../sources/image/Empty state (1).png" class="nodata_image"/>
  <p>No Assignments yet,Please check the announcement section to add <br>your assignment.  </p>
</div>
<?php } ?>
<!--------------------------------------------------------------------->
<!--------------------------------------------------------------------->
 <main>
    <!-- For Succes -->
    <?php if (isset($_SESSION['message'])): ?>
      <div class="msg success" style="color: #5a9d48; margin-Top: 2em; margin-left:7em;">
          <li style="list-style-type: none;"><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
          <?php
          /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
          unset($_SESSION['message']);
          ?>
      </div>
    <?php endif; ?>
    <!-------------------->
 <div class="container">
   
  <div class="cards">
 
  <?php foreach($files as $key => $file):?>
    <div class="card">
    <?php $datetime=strtotime($file['Datatime'])?>
        <h6 class="card__time"><i class="las la-clock"></i><?php echo  date("d-m-Y h:i a",$datetime)?></h6>
        <?php if(empty($file['stu_grade']) && $file['stu_grade']!= '0'): ?>
          <h6 style="padding-top:10px;padding-left:3.5rem">Point: -- /&nbsp;&nbsp;<?php echo $file['grade'];?></h6>
        <?php endif; ?>
         
        <?php if(!empty($file['stu_grade']) || $file['stu_grade']== '0'):?>
          <h6 style="padding-top:10px;padding-left:3.5rem">Point:&nbsp;&nbsp;<?php echo $file['stu_grade'];?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo $file['grade'];?></h6>
        <?php endif; ?>
        
       <img src="../../sources/image/create_add_photo.png" class="card__image" alt="" />
       <div class="card__overlay">
       <div class="card__header">
            
          
          <div class="card__header-text">
          <h3 class="card__title child"><?php echo  html_entity_decode(substr($file['title'],0,40). '...');?></h3>
          </div>
        </div>
      
        <?php $_SESSION['p_no']=$file['p_no'];?>
          <a  href="../student/download_assignment.php?post_no=<?= $file['p_no']?>" >
        <p class="card__description">Click  to Check the Assignment</p>
        </a>
           <!--  -->
      </div>
  </div>  
    <?php endforeach; ?>    
   </div>
   
 </div>
</main>
<script>
/**************************************************************/
// Get the button
let mybutton = document.getElementById("myBtn");
let buttoncreate = document.getElementById("btn-create");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
    buttoncreate.style.display = "none";
  } else {
    mybutton.style.display = "none";
    buttoncreate.style.display = "block";
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

