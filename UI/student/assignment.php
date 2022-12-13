<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/materials_and_Assignments.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <link rel="stylesheet" href="../../css/assignments-student.css"> 
      <!--icon8-->
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!--file icon-->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
      <title>Assignments</title>
    <style>
     a:link, a:visited{
      text-decoration: none; 
      color:#000}
      .ld{
    margin-left: 3%;
}

.div-files{
    height: auto;
    padding: 2%;
    margin-top: 5%;
}
.div-card{
  background-color: #A4D2F0;;
}
    </style>
    
</head>
<body>
 <!--------------------navigation_bar ----------------------->  
 <?php include(MAIN_PATH."/common/navigation.php"); ?> 
 <!---------------------------------------------------------->
  <!-------------------- Assignments -------------------------> 

<div class="header-div">
                 
           <h1>Assignments </h1>
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
    
   <?php //foreach($files as $key => $group):  ?>
     
    <div class="div-card">
      <div class="div-dawenload ">
       <label style="font-weight: bold;">hello</label>
       <a> <i id="files" class="fa-sharp fa-solid fa-file-arrow-down" style="margin-left: 70%;"></i> </a>
       </div>
                                        
         <div class="div-files">
          <a>  <i id="files" class="fa-solid fa-file"></i></a>
           <label class="ld" ></label>
           </div>
         </div>                                             
                                          
   <?php  // endforeach;   ?> 
 
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
 
</body>
</html>

