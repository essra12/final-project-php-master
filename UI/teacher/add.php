<?php
include("../../path.php"); 
include(MAIN_PATH."/controls/add.php"); 
?>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Material</title>
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
    
     <!--jQuery-->

  </head>

    <style>


    </style>

  <body>

  <!--Navigation Bar -->  
      <?php include(MAIN_PATH."/common/navigation.php"); ?> 
  <!------------------->

    <!--------main-container----------->
  <div class="main-container">

  <!-- For Errors message-->
  <?php if(count($errors_for_material)> 0): ?>
    <div class="msg error" style="color: #D92A2A; margin-bottom: 20px;"> 
      <?php foreach($errors_for_material as $errors_for_material): ?>
      <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($errors_for_material); ?></li>
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
        <h1 style="color: #222242;">Add Material</h1>
    </div>

    <form action="" method="POST" enctype='multipart/form-data' onsubmit="return check_Enter(this)">
        
      <!-- title field -->
      <div class="inputs title">
        <label style="color: #222242;">Title</label>
        <input type="text" name="title" maxlength="50" id="title" value="<?php echo $title;?>">
      </div>
      <!------------------>
      
      <!-- description field -->
      <div class="inputs description">
        <label style="color: #222242;">Description<span style="font-size: 16px;">(optional)</span></label>
        <textarea type="text" name="description" id="description" maxlength="250" rows="4"><?php echo $description;?></textarea>
      </div>
      <!------------------>

      <!-- attach field -->
      <div class="inputs attach">
        <label style="color: #222242;">Attach</label>
        
        <div class="container_wrapper">

              <div class="container" style="border-radius: 15px;">
              <div style="margin-bottom:20px"><p style="font-size:12px;">when you select more than one file, Keep pressing on Ctrl or Shift</p></div>            
              <input id="file-input" name="f_name[]" type="file" multiple="multiple" />
              <label class="lab" for="file-input">
                  <i class="fa-solid fa-arrow-up-from-bracket"></i>
              </label>
              <div id="num-of-files">No Files Choosen</div>
              <ul id="files-list" name="files-list"></ul>

          </div>   

      
          <!-- Button -->
          <div class="btn_post">
            <button type="submit" name="add_material" >POST</button>
          </div>
          <!----------->

        </div>
          
      </div>
      <!-------end attach----------->
      
    </form>
          
  </div>
  <!-------end main Container----------->
     
  <!-- Script -->
  <script src="../../javaScript/test.js"></script> 



	
	<script>
  
	</script>
       
  </body>
</html>
