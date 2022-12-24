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
      <!--icon8-->
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
          <!--icon8-->
          <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!--file icon-->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
      <title>Materials</title>
    <style>
     a:link, a:visited{
      text-decoration: none; 
      color:#000}
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
      <?php if ($_SESSION['role']=="teacher"):?> 
      <li><a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>"  style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
      <?php endif; ?>  
      <!----------------->

      <!------HOME------>
      <li><a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>" style="font-size: 1.5rem;"><i class="las la-home"></i></a></li>
      <!---------------->

      <!--Notification-->
      <li><a href="#" class="notification" style="font-size: 1.5rem;"><i class="las la-bell"></i><span class="badge">3</span></a></li>
      <!---------------->

      <!------Logout----->
      <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
      <!----------------->
    </ul>
  </div>
</nav>
<!------------------------------------>
<!-------------------- materials -------------------------> 

<div class="header-div">
                 
           <h1>Materials </h1>
 </div>
 <!-----------------Dynamically Create Card-----------------> 
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
    
 <div class="container">
            

  <div class="cards">
  <?php foreach($files as $key => $file):?>
    <div class="card">
    <?php $datetime=strtotime($file['Datatime'])?>
        <h6 class="card__time"><?php echo  date("d-m-Y h:i",$datetime)?></h6>

        <img src="../../sources/image/file.png" class="card__image" alt="" />
       <div class="card__overlay">
       <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          
          <div class="card__header-text">
          <h3 class="card__title child"><?php echo $file['title'] ?></h3>
          
          <?php if($role=="teacher"):?>
          <a class="child" href="materials.php?deletePost=<?php echo $file['p_no'];?>" onclick="return confirmDelete()"><i id="icon2" class="fa-solid fa-xmark"></i></a>
          <?php endif;?>
          </div>
        </div>
        
        <?php $_SESSION['p_no']=$file['p_no'];?>
        <a  href="../student/download.php?post_no=<?= $file['p_no']?>" > 
        <p class="card__description">Click  to Download</p>
        </a>     
           <!--  -->
      </div>
  </div>  
    <?php endforeach; ?>    
   </div>
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
  </script>
  <?php
/********************************************************************************/
/**********************delete post section for teacher*****************************/

  ?>
 
</body>
</html>

