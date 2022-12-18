<?php
include("../../path.php");  
include(MAIN_PATH."/controls/add_material_and_assignment.php");

$user_id=$_SESSION['user_id'];

//to get student id
$sql="SELECT stu_id FROM user,student Where user.user_id=student.user_id AND user.user_id='$user_id';";
$result_stu_id = $conn->query($sql);
if ($result_stu_id->num_rows == 1) {
    while($row = $result_stu_id->fetch_assoc()) {
      $stu_id=$row["stu_id"];
      /**********to get the student id in session */
      $_SESSION['stu_id']=$stu_id;
    }
}
///////////////////////

//to get group name
$sql="SELECT g_name FROM groups Where g_no='$groupNumber';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////
?>
<html>
    <head>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Assignment</title>
    <meta charset="utf-8">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_dark-without_bc.png">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../css/add_assignment_material_join.css" />
     <!--icon8-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
    </head>

    <body>
        
    <!------Navigation Bar -------->  
    <nav class="navbar">
      <ul class="lift-side">
          <!-------back------>
          <li><div class="back"><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $groupNumber?>"><i class="las la-arrow-left"></i></a></div></li>
          <!----------------->

          <!-------logo------>
          <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
          <!----------------->

      </ul>
      <div class="navbar-links">
        <ul>
          <!----group name--->
          <li><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $groupNumber?>"><?php echo $g_name ?></a></li>
          <!----------------->

          <!-----students--->
          <?php if ($_SESSION['role']=="teacher"):?> 
          <li><a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>" style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
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
    <!--------------------------------->

    <!--------main-container----------->
    <div class="main-container">

    <!-- For Errors message-->
    <?php if(count($errors_for_assignment)> 0): ?>
      <div class="msg error" style="color: #D92A2A; margin-bottom: 20px;"> 
        <?php foreach($errors_for_assignment as $errors_for_assignment): ?>
        <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($errors_for_assignment); ?></li>
        <?php endforeach; ?>
      </div> 
    <?php endif; ?> 
    <!------------------------>

    <!-- For Succes message -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg success" style="color: #5a9d48; margin-Top: 20px;">
            <li><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
            <?php
            /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>
    <!------------------------->
        <div class="title">
            <h1 style="color: #222242;">Add Assignment</h1>
        </div>

        <form action="" method="POST" enctype='multipart/form-data' onsubmit="return check_Enter(this)">
            
          <!-- Id field -->
          <div class="inputs id">
            <label style="color: #222242;">Student ID</label>
            <input type="text" name="stu_id" maxlength="11" disabled="disabled" style=" border: none;" value=<?php echo $stu_id?>>
          </div>
          <!------------------>

          <!-- title field -->
          <div class="inputs title">
            <label style="color: #222242;">Title</label>
            <input type="text" name="title" maxlength="50" id="title" value="<?php echo $title;?>">
          </div>
          <!------------------>
          
          <!-- description field -->
          <div class="inputs description">
            <label style="color: #222242;">Description<span style="font-size: 20px;">(optional)</span></label>
            <textarea type="text" name="description" id="description" maxlength="250" style="font-size: 20px;" ><?php echo $description;?></textarea>
          </div>
          <!------------------>

          <!-- attach field -->
          <div class="inputs attach">
            <label style="color: #222242;">Attach</label>
            
            <div class="container_wrapper">

              <div class="container" style="border-radius: 15px;">
                  <div style="margin-bottom:20px"><p style="font-size:12px;">when you select more than one file, Keep pressing on Ctrl or Shift</p></div>            
                  <input id="file-input" name="f_name[]" type="file" multiple="multiple" />
                  <label class="lab" for="file-input">
                      <i class="fa-solid fa-arrow-up-from-bracket"></i>
                  </label>
                  <div id="num-of-files">No Files Choosen</div>
                  <ul id="files-list"></ul>
              </div>

              <!-- Button -->
              <div class="btn_post">
                <button type="submit" name="add_assignment" >POST</button>
              </div>
              <!----------->

            </div>
            
          </div>
        <!-------end attach----------->

        </form>
              
      </div>
      <!-----------end main container---------->

      <!-- Script -->
      <script src="../../javaScript/upload_files.js"></script>

    </body>
</html>