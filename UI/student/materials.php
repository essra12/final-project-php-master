<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/materials_and_Assignments.php");
$table="post";
$group_no=$_SESSION['g_no'];
$files=selectAll($table,['g_no'=>$_SESSION['g_no']]);
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
      <title>Materials</title>
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
                 
           <h1>Materials </h1>
 </div>
 <!-----------------Dynamically Create Card-----------------> 
 <main>

    
 <div class="container">
            
     
  <div class="cards">
  <?php foreach($files as $key => $file):?>
    <div href="" class="card">
      <img src="../../sources/image/file.png" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          
          <div class="card__header-text">
            <h3 class="card__title"><?php echo $file['title'] ?></h3>            
          </div>
        </div>
        
        <?php $_SESSION['p_no']=$file['p_no']?>
        <a  href="../student/download.php?>" >
        <p class="card__description">Click  to Download</p>
        </a>
       <!--  <a href="download.php?delete=<?php echo $file['p_no'];?>" ><i id="icon2" class="fa-solid fa-xmark"></i></a></td> -->
      </div>
  </div>  
    <?php endforeach; ?>    
   </div>
 </div>
</main>


 
</body>
</html>

