<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/assigment__.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../../css/materials.css"> 
       <!--icon8-->
       <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
      <title>Assignments</title>
    <style>
     a:link, a:visited{
      text-decoration: none; 
      color:#000}
    </style>
    
</head>
<body>
 <!--------------------navigation_bar ----------------------->  
 <?php include(MAIN_PATH."/common/navigation.php"); ?> 
 <!---------------------------------------------------------->
  <!-------------------- materials -------------------------> 

<div class="header-div">
 <h1>Assignments</h1>
 </div>
 <!-----------------Dynamically Create Card-----------------> 
 <main>
   
 <div class="container">
   
  <div class="cards">
  <?php $files=infoforstudent();?>
  <?php foreach($files as $key => $file):?>
    <div class="card">
    <?php $datetime=strtotime($file['Datatime'])?>
        <h6 class="card__time"><?php echo  date("d-m-Y h:i",$datetime)?></h6>
      
        <img src="../../sources/image/create_add_photo.png" class="card__image" alt="" />
       <div class="card__overlay">
       <div class="card__header">
            
          
          <div class="card__header-text">
          <h3 class="card__title child"><?php echo $file['title'] ?></h3>
          </div>
        </div>
      
        <?php $_SESSION['p_no']=$file['p_no'];?>
          <a  href="../student/download_assignment.php?post_no=<?= $file['p_no']?>" >
        <p class="card__description">Click  to Check the Assignment</p>
        </a>
           <!--  -->
      </div>
  </div>  
    <?php endforeach; ?>    
   </div>
   
 </div>
</main>
 
</body>
</html>

