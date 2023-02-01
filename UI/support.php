<?php
include("../path.php");  

?>
<html>
    <head>
        <meta charset="UTF-8">
        <!--for logo-->
        <link rel="shortcut icon" href="../sources/image/logo_bar.png">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Support</title>
        <link rel="stylesheet" href="../css/support.css">
          <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!--file icon-->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>     
    </head>
    <style>
      .main-container{
        margin: 25px 250px;
      }
    </style>  

    <body>
 <!--------------------navigation_bar ----------------------->  
 <nav class="navbar">
  <ul class="lift-side">
      
    <!-------back------>
<!--     <li><div class="back"><a href="../group/inside_group.php?data=<?php $g_name?>&number=<?php $groupNumber?>"><i class="las la-arrow-left"></i></a></div></li> -->
    <!----------------->

      <!-------logo------>
       <li><div class="brand-title"><img src="../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
       <!----------------->
  </ul>
  <div class="navbar-links">
    <ul>
      <!----group name--->
      <!-- <li><a href="../group/inside_group.php?data=<?php /* $g_name */?>&number=<?php /* $group_no */?>" style="padding-top:1rem;"><?php /* echo $g_name */ ?></a></li> -->
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
        <!-- header div-->
        <section class="first">
            <div class="left_pc">
                <img src="../sources/image/support_left.png" style="width: 100%;" />
            </div>
            <div class="center_info">
                <img src="../sources/image/google-docs.png" style="width: 64px; margin-bottom:20px;" />
                <h1> Get started with Study Board </h1>
                <p> Learn how to use Study Board to foster group collaboration, manage syllabuses, and more. </p>
                <div class="watch">
                    <p style="margin-top:20px; font-size:20px; color:#507def;"><a><i class="las la-play"></i>Watch video</a></p>
                </div>
            </div>
            <div class="right_pc">
                <img src="../sources/image/support_right.png" style="width: 100%;" />
            </div>
        </section>
        <!---------------------------->
        
    <!--------main-container----------->
    <div class="main-container">
        

    <!------------------------------------>
    </div>
     
</body>
</html>