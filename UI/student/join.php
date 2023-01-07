<?php
include("../../path.php");  
include(MAIN_PATH."/controls/join.php");

$join_data=selectGroupNameTeacherName();  

?>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>join</title>
  <!--for logo-->
  <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
  <meta charset="utf-8">
  <!--for logo-->
  <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!--icons-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="../../css/add_materiial_assignment_join_dw.css" />
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <style>
      h1{
        margin-bottom:3% ;
      }
    </style>

  </head>

  <body>
      
    <!------Navigation Bar -------->  
    <nav class="navbar">
      <ul class="lift-side">
          <!-------back------>
          <li><div class="back"><a href="../group/main page for group.php"><i class="las la-arrow-left"></i></a></div></li>
          <!----------------->

          <!-------logo------>
          <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
          <!----------------->

      </ul>
      <div class="navbar-links">
        <ul>

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
    <!--------------------------------->

    <!--------main-container----------->
    <div class="main-container">
      
      <!-- For Errors -->
      <?php if(count($errors)> 0): ?>
                <div class="msg error" style="color: #D92A2A; margin-bottom: 20px;"> 
                    <?php foreach($errors as $error): ?>
                    <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                    <?php endforeach; ?>
                </div> 
            <?php endif; ?> 
            <!----------------->

      <div class="title">
          <h1 style="color: #222242;">Group Information</h1>
      </div>

      <form action="" method="POST" enctype='multipart/form-data'>
          
        <!-- name group name -->
        <div class="inputs name">
          <label style="color: #222242;">Group name</label>
          <input type="text" name="g_name" disabled="disabled" style=" border: none;" value="<?php  echo $join_data['group_name'];  ?>">
        </div>
        <!--------------------->

        <!-- teacher name -->
        <div class="inputs name">
          <label style="color: #222242;">Teacher name</label>
          <input type="text" name="tr_name" disabled="disabled" style=" border: none;" value="<?php  echo $join_data['tr_name'];  ?>">
        </div>
        <!--------------------->

      


          <!-- Button -->
          <div class="btn_post" style="text-align: right;">
              <button type="submit" name="conf_join" >join</button>
          </div>
          <!----------->
          
      </form>
            
    </div>
    <!-----------end main container---------->



  </body>
</html>