<?php 
include("../../path.php");  
include(MAIN_PATH."/controls/students.php"); 
$studentgroup= selectStudentG();
/*
global $conn;
$sql3="SELECT * FROM `file`; ";
$result= mysqli_query($conn,$sql3);
$row =mysqli_fetch_row($result);
 $img=$row[2];
 echo $img;   */
 
/*
$students=selectAllStudentInfo(); 
*/

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/Enrollment__Requsertts.css">
        <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
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
<!-- Enrollment Requests
<h1 >Enrollment Requests</h1>
<hr >
 -->
<!--
<div class="divC">

   <?php /* foreach($students as $key => $student):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $student  -->
                <div class="ab">
               <label data-label="stu-name"><?php echo $student['full_name'] ?> </label>
               <a  name="Add_student"><i id="true1" class="fa-solid fa-circle-check"></i></a>
               <a> <i id="croos1" class="fa-solid fa-circle-xmark"></i></a>
                </div>
    <?php endforeach; */ ?> 

    </div>

<--  -->
    <h1>Students</h1>
    <hr >
    
    <div class="divC2">
    <?php foreach($studentgroup as $key => $student):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $student  -->
    <div class="ab2">
        <label data-label="stu-name"><img src="<?php echo BASE_URL . '/sources/image/' . $student['u_img']; ?>" class="tab-img" style=" margin-right:10px;  width: 25px; height: 25px; border-radius:100%;"><?php echo $student['full_name'] ?> </label>
        <a  onclick="return confirmDelete()"href="Enrollment Requests.php?deleteSTID=<?php echo $student['stu_group']; ?>&deleteSTID2=<?php echo $student['p_no']; ?>">   <i id="croos2" class="fa-solid fa-circle-xmark" ></i></a>  
    </div>
    <?php endforeach; ?> 
    </div>
  <!--          
<div>
<label > ahmed</label>
<i id="true" class="fa-solid fa-circle-check"></i>
<i id="croos" class="fa-solid fa-circle-xmark"></i>
</div>
-->
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
