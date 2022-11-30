<?php
include("../../path.php");  
include(MAIN_PATH."/controls/add_material_and_assignment.php");

?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>join</title>
    <meta charset="utf-8">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_dark-without_bc.png">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
     <!--icons-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../css/add_material_assignment_join.css" />
     <!--icon8-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    </head>

    <body>
        
      <!--Navigation Bar -->  
      <?php include(MAIN_PATH."/common/navigation.php"); ?> 
      <!------------------->

      <!--------main-container----------->
      <div class="main-container">
        <!-- For Errors message-->
        <?php if(count($errors_for_assignment)> 0): ?>
        <div class="msg error" style="color: #D92A2A; margin-bottom: 20px;"> 
            <?php foreach($errors_for_assignment as $errors_for_assignment): ?>
            <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($errors_for_assignment); ?></li>
            <?php endforeach; ?>
        </div> 
        <?php endif; ?> 
        <!------------------------>

        <!-- For Succes message -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="msg success" style="color: #5a9d48; margin-Top: 20px;">
                <li><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
                <?php
                /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>
        <!------------------------->
        <div class="title">
            <h1 style="color: #222242;">Group Information</h1>
        </div>

        <form action="" method="POST" enctype='multipart/form-data' onsubmit="return check_Enter(this)">
            
          <!-- name group name -->
          <div class="inputs name">
            <label style="color: #222242;">Group name</label>
            <input type="text" name="g_name" disabled="disabled" style=" border: none;">
          </div>
          <!--------------------->

          <!-- teacher name -->
          <div class="inputs name">
            <label style="color: #222242;">Teacher name</label>
            <input type="text" name="tr_name" disabled="disabled" style=" border: none;">
          </div>
          <!--------------------->

          <!-- Student name -->
          <div class="inputs name">
            <label style="color: #222242;">Student name</label>
            <input type="text" name="full_name" disabled="disabled" style=" border: none;">
          </div>
          <!------------------>


            <!-- Button -->
            <div class="btn_post">
                <button type="submit" name="conf_join" style="  text-align: right;  " >POST</button>
            </div>
            <!----------->
            
        </form>
              
      </div>
      <!-----------end main container---------->

      <!-- Script -->
      <script src="../../javaScript/upload_files.js"></script>

    </body>
</html>