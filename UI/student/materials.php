<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/deletePost.php");

$role=$_SESSION['role'];
$table="post";
$group_no=$_SESSION['g_no'];
$files=selectAll($table,['g_no'=>$_SESSION['g_no']]);

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
        <!--file icon-->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
      <title>Materials</title>
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
<!------------Navigation Bar ----------->  
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

      <!------support------->
      <li><a href="../support.php" style="font-size: 1.5rem;"><i class="lar la-question-circle"></i></a></li>
      <!---------------->

      <!------Logout----->
      <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
      <!----------------->
    </ul>
  </div>
</nav>
<!------------------------------------>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<!-------------------- materials -------------------------> 
<div class="header-div">              
 <h1>Materials </h1>
  <?php if($role=="teacher"):?>
  <div id="mybutton">
    <div>
       <a href="../teacher/add material.php"><button class="btn-create" id="btn-create">+</button></a>
    </div>
  </div>
  <?php endif;?>
 </div>
 <hr>
<!------------------------no data section------------------------------->
<!--------------display this section when there is no materials---------->
<!--------------------------------------------------------------------->
<?php if($files==null){ ?>
  <div class="nodata">
  <img src="../../sources/image/Empty state (1).png" class="nodata_image"/>
  <p>No Materials yet,as you wait for Materials to be made available,<br> get familiar with your enviroment.  </p>
</div>
<?php } ?>
<!--------------------------------------------------------------------->
<!--------------------------------------------------------------------->
 <!-----------------Dynamically Create Card-----------------> 
 <main>
    <!-- For Succes -->
    <?php if (isset($_SESSION['message'])): ?>
      <div class="msg success" style="color: #5a9d48; margin-Top: 2em; margin-left:12em;">
          <li style="list-style-type: none;"><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i><?php echo $_SESSION['message']; ?></li>
          <?php
          /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
          unset($_SESSION['message']);
          ?>
      </div>
    <?php endif; ?>
          <div >
                <div class="container_wrapper">
                <div >
                <table class="row">
                                
                <tbody>
                 <?php foreach($files as $key => $file):
                 if(empty($file['stu_group'])):?><!--changeable--> 
                <tr>
                  
                <td><img src="../../sources/image/google-docs.png" style="width: 50px;   padding-right: 10px;" />
               </td>
                <td id="file" style=" padding: 0.25em 12em 0 0em;"><?php $datetime=strtotime($file['Datatime'])?>
                <h6 class="card__time"><i class="las la-clock"></i><?php echo  date("d-m-Y h:i a",$datetime)?></h6><?php echo  html_entity_decode(substr($file['title'],0,100). '...');?> 
               </td>
               <td style=" padding: 1em 3em;"></td>
                <td style=" padding:15px 0 0 0;"><a  href="../student/download.php?post_no=<?= $file['p_no']?>" ><p class="card__description">Click  to<br> Open</p></a>
                </td>
                 <!--making the delete just for teacher-->
                 <?php if($role=="teacher"):?>
                  <td class="td2" style="font-size: 15px;padding-top:25px"><a class="child" href="materials.php?deletePost=<?php echo $file['p_no'];?>" onclick="return confirmDelete()"><i id="icon2" class="fa-solid fa-xmark"></i></a></td>
                 <?php endif;?>
               </tr>
               <?php endif;
               endforeach;?>
             </tbody>
             </table>
            </div>
</main>

<script>
    function confirmDelete() {
    if (confirm("Are you sure you want to delete ?")) {
        return true;
    } 
    else {
        return false;
    }
}
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
  <?php
/********************************************************************************/
/**********************delete post section for teacher*****************************/

  ?>
 
</body>
</html>

