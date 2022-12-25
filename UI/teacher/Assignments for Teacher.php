<?php 
include("../../path.php"); 
/*include(MAIN_PATH."/controls/materials_and_Assignments.php");*/
include(MAIN_PATH."/controls/assignmentss.php");
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
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: "Poppins", sans-serif;
}
.ld{
    margin-left: 3%;
}
label{
  margin-top: 1%;

}
.div-files{
    height: auto;
    padding: 2%;
    margin-top: 5%;
}
.div-card{
  
  background-color: #A4D2F0;;
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
                                   <label style="font-weight: bold;">name: <?php  echo$group['full_name'] ; ?> </label><br>
                                   <label style="font-weight: bold;">ID: <?php  echo$group['stu_id'] ; ?></label>
                                   <a> <i id="files" class="fa-sharp fa-solid fa-file-arrow-down" style="margin-left: 70%;"></i> </a>
                                   </div>
                                        
                                 <div class="div-files">
                                  <a>  <i id="files" class="fa-solid fa-file"></i></a>
                                 <label class="ld" ><?php echo$group['title']; ?></label>
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



-->




</main>
</form>
</body>
</html>
