<?php
include("../../path.php");  
/* include(MAIN_PATH. "/database/db.php"); */
 include(MAIN_PATH."/controls/download_Assignments.php"); 
 if($role==""){ $stu_id=$_SESSION['stu_id'];}
if($role=="teacher"){ $stu_id=$_GET['stu_id']; }
$table="file";
$files=selectAll($table,['p_no'=>$_GET['post_no']]);

//to get group name
$sql="SELECT g_name FROM groups Where g_no='$group_no';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
////////////////////

?>
<html>
    <head>
        <meta charset="UTF-8">
        <!--for logo-->
        <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Assignment</title>
        <link rel="stylesheet" href="../../css/add_materiial_assignment_join_dw.css">
          <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!--file icon-->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>     
    </head>
    <style>
      .main-container{
        margin: 25px 250px;
      }
    </style>  

    <body>
 <!--------------------navigation_bar ----------------------->  
 <nav class="navbar">
  <ul class="lift-side">
      <?php if($role==""):?>
      <!-------back------>
      <li><div class="back"><a href="assignment.php"><i class="las la-arrow-left"></i></a></div></li>
      <!----------------->
      <?php endif;?>
      <?php if($role=="teacher"):?>
        <!-------back------>
      <li><div class="back"><a href="../../UI/teacher/Assignments for Teacher.php"><i class="las la-arrow-left"></i></a></div></li>
      <!----------------->
      <?php endif;?>

      <!-------logo------>
      <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
      <!----------------->
  </ul>
  <div class="navbar-links">
    <ul>
      <!----group name--->
      <li><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $group_no?>" style="padding-top:1rem;"><?php echo $g_name ?></a></li>
      <!----------------->

      <!-----students--->
      <li><a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>"  style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
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
 <!---------------------------------------------------------->

    
        
        <!--------main-container----------->
      <div class="main-container">
        <div class="title">
            <h1 style="color: #222242;margin-bottom: 25px;">Assignment</h1>
        </div>

        <form  >

           <!-- Id field -->
           <div class="inputs id">
            <label style="color: #222242;">Student ID</label>
            <input type="text" name="stu_id" maxlength="11" disabled="disabled" style=" border: none; font-size: 16px;" value=<?php echo $stu_id?>>
          </div>
          <!------------------>
            
          <!-- title field -->
          <div class="inputs title">
            <label style="color: #222242; font-size: 20px;">Title</label>
            <label style=" font-weight: normal; font-size: 16px; padding-top:10px;" ><?php echo $title?></label>
          </div>
          <!------------------>
          
          <!-- description field -->
          <?php if(!empty($des)):?>
          <div class="inputs description">
            <label style="color: #222242; font-size: 20px;">Description</label>
            <label style=" font-weight: normal; font-size: 16px; padding-top:10px;"><?php echo $des?></label>
          </div>
          <?php endif;?>
          <!------------------>

          <!-- attach field -->
          <div class="inputs attach">
            <label style="color: #222242; font-size: 20px;">Files</label>
                <div class="container_wrapper">
                <div class="wrapper">
                <table class="row">
                <tbody>
                <?php foreach($files as $key => $file):?>
                <tr>
                <td><i class="fa-solid fa-file-lines" id="icon3"></i></td>
                <td id="file"><?php echo $file["f_name"];?></td>
                <td></td>
                <td class="td2"><a href="download_assignment.php?file=<?php echo $file['f_no'];?>"><i id="icon1" class="fa fa-download"></i></a></td>
               <!--  -making the delete just for teacher
                <?php if($role=="teacher"):?>
                <td class="td2"><a href="download_assignment.php?delete=<?php echo $file['f_no'];?>" onclick="return confirmDelete()"><i id="icon2" class="fa-solid fa-xmark"></i></a></td>
               </tr> -->
               <?php endif;?>
              <?php endforeach;?>
             </tbody>
             </table>
            </div>
         
          </div>
          <!------------------>

        </form>

      
      
      <!------------------------------------>
      <script>
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