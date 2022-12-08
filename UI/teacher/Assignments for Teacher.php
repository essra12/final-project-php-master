<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/materials_and_Assignments.php");
include(MAIN_PATH."/controls/assignments.php");
include(MAIN_PATH."/DataBase/Connection.php");

/* SELECT files Info FUNCTIONS */
$files=selectAllfilesInfo();
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
       <link rel="stylesheet" href="../../css/assignments-student.css"> 
        <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
        
    </head>
<style>
.ld{
    margin-left: 3%;
}

.div-files{
    height: auto;
    padding: 2%;
    margin-top: 5%;
}
  /**
  .div-files{
    margin-top: 5%;
height: 13vh;
  }
  */
</style>
<body >
<!--------------------navigation_bar ----------------------->  
<?php include(MAIN_PATH."/common/navigation.php"); ?> 
 <!---------------------------------------------------------->
    <form>
<!--Assignments  -->
<h1>Assignments</h1>

<main>

<?php foreach($files as $key => $group):  ?>
                                                
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
                                          
<?php   endforeach;   ?> 
<!--
<div class="div-card">

        <div class="div-dawenload ">
        <label style="font-weight: bold;">TITEL</label>
       <a> <i id="files" class="fa-sharp fa-solid fa-file-arrow-down" style="margin-left: 70%;"></i> </a>
        </div>

        <div class="div-files">
      <a>  <i id="files" class="fa-solid fa-file"></i></a>
            <label>this is one files for works </label>
        </div>

</div>


<div class="div-card">

        <div class="div-dawenload ">
        <label style="font-weight: bold;">TITEL</label>
       <a> <i id="files" class="fa-sharp fa-solid fa-file-arrow-down" style="margin-left: 70%;"></i> </a>
        </div>

        <div class="div-files">
      <a>  <i id="files" class="fa-solid fa-file"></i></a>
            <label>this is one files for works </label>
        </div>

</div>

<div class="div-card">

        <div class="div-dawenload ">
        <label style="font-weight: bold;">TITEL</label>
       <a> <i id="files" class="fa-sharp fa-solid fa-file-arrow-down" style="margin-left: 70%;"></i> </a>
        </div>

        <div class="div-files">
      <a>  <i id="files" class="fa-solid fa-file"></i></a>
            <label>this is one files for works </label>
        </div>

</div>


-->




</main>
</form>
</body>
</html>
