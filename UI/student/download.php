<?php
include("../../path.php");  
?>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Add Material</title>
        <link rel="stylesheet" href="../../css/add_material_assignment_join.css">
        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
    </head>

    <body>
        
           <!--------main-container----------->
      <div class="main-container">
        <div class="title">
            <h1 style="color: #222242;">Materials</h1>
        </div>

        <form >
            
          <!-- title field -->
          <div class="inputs title">
            <label style="color: #222242;">Title</label>
            <input type="text" name="title" maxlength="50" readonly>
          </div>
          <!------------------>
          
          <!-- description field -->
          <div class="inputs description">
            <label style="color: #222242;">Description</label>
            <textarea type="text" name="description" id="description" maxlength="250" readonly ></textarea>
          </div>
          <!------------------>

          <!-- attach field -->
          <div class="inputs attach">
            <label style="color: #222242;">Files</label>
            <div class="container_wrapper">
                <div class="wrapper">
                <!-- Button -->
                <div class="btn_post">
                  <button type="submit" >Download</button>
                </div>
                <!----------->

            </div>
              
          </div>
          <!------------------>

        </form>
              
      </div>
      <!------------------------------------>

    </body>
</html>