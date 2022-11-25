<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/materials_and_Assignments.php");
$table="files";
$files=selectAll($table);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../../css/material_and_assignment.css"> 
      <!--icon8-->
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Materials</title>
    
</head>
<body>
 <!--------------------navigation_bar ----------------------->  
 <?php include(MAIN_PATH."/common/navigation.php"); ?> 
 <!---------------------------------------------------------->
  <!-------------------- materials -------------------------> 

<div class="header-div">
                 
           <h1>Materials </h1>
 </div>
 <!-----------------Dynamically Create Card-----------------> 
 <main>

    
 <div class="container">
            
   
   
  <div class="cards">
  <?php foreach($files as $key => $file):?>
    <div href="" class="card">
      <img src="https://img.freepik.com/free-psd/3d-rendering-ui-icon_23-2149182288.jpg?w=740&t=st=1669226686~exp=1669227286~hmac=4b27df99da7eb07ff889f94e6fc1feb676b3efc3a002f6e85677394696d49f70" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          
          <div class="card__header-text">
            <h3 class="card__title"><?php echo $file['title'] ?></h3>            
          </div>
        </div>
        <p class="card__description" onclick="openFunction()">Click  to Download</p>
      </div>
  </div>  
    <?php endforeach; ?>    
   </div>
  

 </div>
</main>

<script>
function openFunction() {
  window.open("http://localhost/final-project-php-master/UI/student/download.php", "anotherWindow", "scrollbars=yes,top=200,left=400,width=600,height=400,status=no,menubar=no");
}
</script>
 
</body>
</html>

