<?php 
include("../../path.php");  
include(MAIN_PATH."/controls/testeditST.php"); 
$testpost=testposttest();
/*
$groupNO=$_SESSION['g-no'];
echo $groupNO;
*/
$role=$_SESSION['role'];
$group_no=$_SESSION['g_no'];
//to get group name
$sql="SELECT g_name FROM groups Where g_no='$groupNO';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////


?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--for logo-->
        <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
        <title>Students</title>
        <link rel="stylesheet" href="../../css/enrollment_requsertts.css">
        <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
         <!--icon8-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
     <!--icons-->
    </head>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: "Poppins", sans-serif;
}
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
.notification .badge {
            top: 9px;
            right: 9px;
}

    </style>
<body >
    
<!------------Navigation Bar --------------->  
<nav class="navbar">
  <ul class="lift-side">
      <!-------back------>
      <li><div class="back"><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $group_no?>"><i class="las la-arrow-left"></i></a></div></li>
      <!----------------->

      <!-------logo------>
      <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
      <!----------------->
  </ul>
  <div class="navbar-links">
    <ul>
      <!----group name--->
      <li><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $group_no?>" style="padding-top:.5rem;"><?php echo $g_name ?></a></li>
      <!----------------->

      <!-----students--->
      <?php if ($_SESSION['role']=="teacher"):?> 
      <li><a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>"  style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
      <?php endif; ?>  
      <!----------------->

      <!------HOME------>
      <li><a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>" style="font-size: 1.5rem;"><i class="las la-home"></i></a></li>
      <!---------------->

      <!--Notification-->
      <li><a href="#" class="notification" style="font-size: 1.5rem;"><i class="las la-bell"></i><span class="badge">3</span></a></li>
      <!---------------->

      <!------Logout----->
      <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
      <!----------------->
    </ul>
  </div>
</nav> 
  <!-------------------------------->
    <form method="POST">
    <h1>Students</h1>
    <hr >
    
    <div class="divC2">
   <?php
  
//------for table post---------

    foreach($testpost as $key => $student):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $student  -->
        <div class="ab2">
            <label data-label="stu-name"><img src="<?php echo BASE_URL . '/sources/image/' . $student['u_img']; ?>" class="tab-img" style=" margin-right:25px;  width: 25px; height: 25px; border-radius:100%;"><?php echo $student['full_name'] ?> </label>
            <?php if($role=="teacher"):?>
            <a  onclick="return confirmDelete()"href="testreqest.php?deleteSTID=<?php echo $student['g_no'];?>&deletestuid=<?php echo $student['stu_id']; ?>&group=<?php echo $student['stu_group']; ?> "><i id="croos2" class="fa-solid fa-circle-xmark" ></i></a> 
            <?php endif;?> 
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
