<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/materials_and_Assignments.php");
include(MAIN_PATH."/controls/assignments.php");
include(MAIN_PATH."/DataBase/Connection.php");

/* SELECT files Info FUNCTIONS */

$groups=selectAllfilesInfo();
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
       <link rel="stylesheet" href="../../css/assignments-student.css"> 
       <link rel="stylesheet" href="../../css/matterials_and_assin.css">
        <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    </head>
<style> 
.ld{
    margin-left: 3%;
}
.div-files{
    height: auto;
    padding: 2%;
}
</style>

<body >
<!--------------------navigation_bar ----------------------->  
<?php include(MAIN_PATH."/common/navigation.php"); ?> 
 <!---------------------------------------------------------->
    <form >
<!--Assignments  -->
<h1 >Assignments</h1>

<main>

<!--

<?php  /*foreach($groups as $key => $group):  ?>
                                                
        <div class="div-card">
               <div class="div-dawenload ">
               <label style="font-weight: bold;"><?php  echo$group['title'] ; ?></label>
               <a> <i id="files" class="fa-sharp fa-solid fa-file-arrow-down" style="margin-left: 70%;"></i> </a>
               </div>

               <div class="div-files">
               <a>  <i id="files" class="fa-solid fa-file"></i></a>
               <label class="ld" ><?php echo$group['description']; ?></label>
               </div>
         </div>  
  
<?php   endforeach;   */?> 
-->



<div class="div-card">

        <div class="div-dawenload ">
        <label style="font-weight: bold;">TITEL</label>
       <a> <i id="files" class="fa-sharp fa-solid fa-file-arrow-down" style="margin-left: 70%;"></i> </a>
        </div>

        <div class="div-files">
      <a>  <i id="files" class="fa-solid fa-file"></i></a>
               <label > the descreption for this files here .....</label>
        </div>

</div>


<div class="div-card">

        <div class="div-dawenload ">
        <label style="font-weight: bold;">TITEL</label>
       <a> <i id="files" class="fa-sharp fa-solid fa-file-arrow-down" style="margin-left: 70%;"></i> </a>
        </div>

        <div class="div-files">
      <a>  <i id="files" class="fa-solid fa-file"></i></a>
               <label > the descreption for this files here .....</label>
        </div>

</div>



<div class="div-card">

        <div class="div-dawenload ">
        <label style="font-weight: bold;">TITEL</label>
       <a> <i id="files" class="fa-sharp fa-solid fa-file-arrow-down" style="margin-left: 70%;"></i> </a>
        </div>

        <div class="div-files">
      <a>  <i id="files" class="fa-solid fa-file"></i></a>
               <label > the descreption for this files here .....</label>
        </div>

</div>


</main>
</form>
</body>
</html>