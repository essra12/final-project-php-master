<?php
include("../../path.php");  
include(MAIN_PATH."/controls/add_material_and_assignment.php");
?>
<html>
    <head>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Assignment</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
     <!--icons-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../css/add_material_and_assignment.css" />
     <!--icon8-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
    </head>

    <body>
        
      <!--Navigation Bar -->  
      <?php include(MAIN_PATH."/common/navigation.php"); ?> 
      <!------------------->

      <!--------main-container----------->
      <div class="main-container">
        <div class="title">
            <h1 style="color: #222242;">Add Assignment</h1>
        </div>

        <form action="" method="POST" enctype='multipart/form-data' onsubmit="return check_Enter(this)">
            
          <!-- name field -->
          <div class="inputs name">
            <label style="color: #222242;">Name</label>
            <input type="text" name="full_name" maxlength="25" disabled="disabled" style=" border: none;">
          </div>
          <!------------------>

          <!-- Id field -->
          <div class="inputs id">
            <label style="color: #222242;">ID</label>
            <input type="text" name="stu_id" maxlength="11" onkeypress="return onlyNumberKey(event)" disabled="disabled" style=" border: none;">
          </div>
          <!------------------>

          <!-- title field -->
          <div class="inputs title">
            <label style="color: #222242;">Title</label>
            <input type="text" name="title" maxlength="50" id="title">
          </div>
          <!------------------>
          
          <!-- description field -->
          <div class="inputs description">
            <label style="color: #222242;">Description<span style="font-size: 20px;">(optional)</span></label>
            <textarea type="text" name="description" id="description" maxlength="250" style="font-size: 20px;"></textarea>
          </div>
          <!------------------>

          <!-- attach field -->
          <div class="inputs attach">
            <label style="color: #222242;">Attach</label>
            
            <div class="container_wrapper">

              <div class="container" style="border-radius: 15px;">
                  <div style="margin-bottom:20px"><p style="font-size:12px;">when you select more than one file, Keep clicking on Ctrl or Shift</p></div>            
                  <input id="file-input" name="f_name[]" type="file" multiple="multiple" />
                  <label class="lab" for="file-input">
                      <i class="fa-solid fa-arrow-up-from-bracket"></i>
                  </label>
                  <div id="num-of-files">No Files Choosen</div>
                  <ul id="files-list"></ul>
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
      <!-----------end main container---------->

      <!-- Script -->
      <script src="../../javaScript/upload_files.js"></script>

    </body>
</html>