<?php 
include("../../path.php");  
include(MAIN_PATH."/controls/testeditST.php"); 
$testpost=testposttest();
/*
$groupNO=$_SESSION['g-no'];
echo $groupNO;
*/
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/Enrollment__Requsertts.css">
        <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
         <!--icon8-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
     <!--icons-->
    </head>
<style>
  h1{
    font-size: 42px;
  }
@media  (max-width:540px) {
       #croos1{
        margin-right: 0%; 
    }
h1{
    font-size: 30px;
}}
   hr{
    margin-right: 10%;
   }
.divC2{
    height: 72vh;
    overflow: auto;
}
    </style>
<body >
    
<!--------------------navigation_bar ----------------------->  
<?php include(MAIN_PATH."/common/navigation.php"); ?> 
 <!---------------------------------------------------------->
    <form method="POST">
    <h1>Students</h1>
    <hr >
    
    <div class="divC2">
   <?php
  
//------for table post---------

    foreach($testpost as $key => $student):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $student  -->
        <div class="ab2">
            <label data-label="stu-name"><img src="<?php echo BASE_URL . '/sources/image/' . $student['u_img']; ?>" class="tab-img" style=" margin-right:10px;  width: 25px; height: 25px; border-radius:100%;"><?php echo $student['full_name'] ?> </label>
            <a  onclick="return confirmDelete()"href="testreqest.php?deleteSTID=<?php echo $student['g_no'];?>&deletestuid=<?php echo $student['stu_id']; ?>&group=<?php echo $student['stu_group']; ?> "><i id="croos2" class="fa-solid fa-circle-xmark" ></i></a>  
        </div>
        <?php endforeach ; 

?>
    </div>
</form>
<script>
/*******************for delet confirm***********************/

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
