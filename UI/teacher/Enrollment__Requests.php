<?php 
include("../../path.php");  
include(MAIN_PATH."/controls/Enrollment-reqest.php"); 
$studentgroup= selectStudentG();/** post  */
$STG=selectstudentallG();/**  student group */
$testpost=testpost();/** just student group  عرض الطلبة الذين لم يسبق لهم اضافة ملفات   */
/*
$groupNO=$_SESSION['g-no'];
echo $groupNO;
*/
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/enrollment_requsertts.css">
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
    <h1>Students</h1>
    <hr >
    
    <div class="divC2">
   <?php
  
//------for table post---------
$sql="SELECT * FROM `post`;";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
        /** الطلبة الذين لم يضيفوا  ملفات post  */
    echo"none";

    foreach($testpost as $key => $student):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $student  -->
        <div class="ab2">
            <label data-label="stu-name"><img src="<?php echo BASE_URL . '/sources/image/' . $student['u_img']; ?>" class="tab-img" style=" margin-right:10px;  width: 25px; height: 25px; border-radius:100%;"><?php echo $student['full_name'] ?> </label>
            <a  onclick="return confirmDelete()"href="Enrollment__Requests.php?deleteSTID88=<?php echo $student['stu_group']; ?>">   <i id="croos2" class="fa-solid fa-circle-xmark" ></i></a>  
        </div>
        <?php endforeach ; 
}
else {
    echo"yseeeeeeeeeeeeee";
    /** الطلبة الذين قاموا باضافة ملفات post  */
 foreach($studentgroup as $key => $student):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $student  -->
    <div class="ab2">
        <label data-label="stu-name"><img src="<?php echo BASE_URL . '/sources/image/' . $student['u_img']; ?>" class="tab-img" style=" margin-right:10px;  width: 25px; height: 25px; border-radius:100%;"><?php echo $student['full_name'] ?> </label>
        <a  onclick="return confirmDelete()"href="Enrollment__Requests.php?deleteSTID=<?php echo $student['stu_group']; ?>&deleteSTID2=<?php echo $student['p_no']; ?>">   <i id="croos2" class="fa-solid fa-circle-xmark" ></i></a>  
    </div>
    <?php endforeach;  
      /** الطلبة الذين لم يضيفوا ملفات post  */
    foreach($STG as $key => $student):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $student  -->
    <div class="ab2">
        <label data-label="stu-name"><img src="<?php echo BASE_URL . '/sources/image/' . $student['u_img']; ?>" class="tab-img" style=" margin-right:10px;  width: 25px; height: 25px; border-radius:100%;"><?php echo $student['full_name'] ?> </label>
        <a  onclick="return confirmDelete()"href="Enrollment__Requests.php?deleteSTID55=<?php echo $student['stu_group']; ?>">   <i id="croos2" class="fa-solid fa-circle-xmark" ></i></a>  
    </div>
    <?php endforeach;
}
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
