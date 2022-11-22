<?php
include("../../path.php");  
?>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Add Assignment</title>
        <link rel="stylesheet" href="../../css/add_material_and_assignment.css">
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

        <form onsubmit="return check_Enter(this)">
            
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
            <input type="text" name="title" maxlength="50">
          </div>
          <!------------------>
          
          <!-- description field -->
          <div class="inputs description">
            <label style="color: #222242;">Description<span style="font-size: 20px;">(optional)</span></label>
            <textarea type="text" name="description" id="description" maxlength="250" ></textarea>
          </div>
          <!------------------>

          <!-- attach field -->
          <div class="inputs attach">
            <label style="color: #222242;">Attach</label>
            <div class="container_wrapper">
                <div class="wrapper">

                  <div class="icon youtube">
                  <div class="tooltip">
                      Youtube
                  </div>
                  <a href="#"><span><i class="lab la-youtube"></i></span></a>
                  </div>

                  <div class="icon upload">
                  <div class="tooltip">
                      Upload
                  </div>
                  <a href="#"><span><i class="las la-upload"></i></span></a>
                  </div>

                  <div class="icon google_drive">
                  <div class="tooltip">
                      Drive
                  </div>
                  <a href="#"><span><i class="lab la-google-drive"></i></span></a>
                  </div>
                </div>

                <!-- Button -->
                <div class="btn_post">
                  <button type="submit" >Post</button>
                </div>
                <!----------->

            </div>
              
          </div>
          <!------------------>

        </form>
              
      </div>
      <!------------------------------------>

<script>
    /********************************************* check enter *********************************/
    function check_Enter() {
    const title = document.getElementById("title").value;
    if(title==""){
        alert(" pleas enter Title");
        return false;
    }
    }

    function onlyNumberKey(evt) {
  // Only ASCII character in that range allowed
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)){
    alert(" pleas enter Just Number");
    return false;
  }
  return true;
}
/****************************************************************************************** */
</script>


    </body>
</html>