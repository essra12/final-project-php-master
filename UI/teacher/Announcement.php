<?php
include("../../path.php"); 
include(MAIN_PATH."/controls/announcement.php");
$user_id=$_SESSION['user_id'];
$table="announcement";
$announcements=selectAllAnnouncement($groupNumber);

//to get group name
$sql="SELECT g_name FROM groups Where g_no='$groupNumber';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////
$todays_date = date("Y-m-d");
$today = strtotime($todays_date);
?>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Announcements</title>
    <meta charset="utf-8">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../css/announcement.css"> 
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

 </head>

  <body>

    <!--Navigation Bar -->  
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

          <!-----students---->
          <?php   if ($_SESSION['role']=="teacher"): ?> 
          <li><a href="<?php  echo BASE_URL . '/UI/teacher/testreqest.php' ?>" style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
          <?php   endif; ?>  
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
    <!------------------->

<form>

  <h1>Announcements </h1>

  <main>
    <!-- For Errors message-->
    <?php if(count($errors)> 0): ?>
      <div class="msg error" style="color: #D92A2A; margin-bottom: 20px;"> 
        <?php foreach($errors as $error): ?>
        <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
        <?php endforeach; ?>
      </div> 
    <?php endif; ?> 
    <!------------------------>

    <!-- For Succes -->
    <?php if (isset($_SESSION['message'])): ?>
    <div class="msg success" style="color: #5a9d48;">
        <li style="list-style-type: none;"><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
        <?php
        /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
        unset($_SESSION['message']);
        ?>
    </div>
  <?php endif; ?>
  <!-------------------->  
  
  <?php foreach($announcements as $key => $announcement):?>
    <?php
        $deadline=$announcement['due_date'];
        $expiration_date = strtotime($deadline);
      ?>
    <!--------------------------------------------------Card------------------------------------------------------>  
    <div class="card" id="card"> 
       <div class="card-img">
          <?php if(empty($announcement['due_date'])):?>
            <img src="../../sources/image/ann.png" alt="">
          <?php endif;?>
          <?php if(!empty($announcement['due_date'])):?>
            <img src="../../sources/image/ass.png" alt="">
          <?php endif;?>
        </div>
      <div class="card-info">  
        <?php $datetime=strtotime($announcement['an_Datetime'])?>
        <p class="card__time"><i class="las la-clock"></i><?php echo date("d-m-Y h:i",$datetime)?></p>
        <p class="text"><?php echo $announcement['an_content']?></p>
        
        <!------------Delete/Edit announcement------------------>
        <?php if($role=="teacher"):?>
            <!--------Announcement------>
            <?php if(empty($announcement['due_date'])):?>
              <a onclick="return confirmDelete()" href="announcement.php?delete_an_no=<?php echo $announcement['an_no'];?>" ><i style="position:absolute;right: 7.5%; margin-bottom:1rem;" class="fa-solid fa-xmark tr"></i></a>
              <a href="edit_Announcment.php?textANN=<?php echo $announcement['an_no'];?>" ><i style="position:absolute;right: 9%; margin-bottom:1rem;" class="las la-pen ticon tr"></i></a>
              <div style="height: 15px;"></div>
            <?php endif;?>
            <!--------------------------->
            <!--Announcement Assignment-->
            <?php if(!empty($announcement['due_date'])):?>
              <a onclick="return confirmDelete()" href="announcement.php?delete_an_ass_no=<?php echo $announcement['an_no'];?>" ><i style="position:absolute;right: 7.5%; margin-bottom:1rem;" class="fa-solid fa-xmark tr"></i></a>
              <a href="editAnnouncement_assignment.php?textANN=<?php echo $announcement['an_no'];?>" ><i style="position:absolute;right: 9%; margin-bottom:1rem;" class="las la-pen ticon tr"></i></a>
              <div style="height: 15px;"></div>
              <!-- deu date -->
              <p id="deu_date"class="card__time due_date" >Due Date&nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y",$expiration_date)?></p>
              <!-------------->
            <!--------------------------->
          <?php endif;?>
        <?php endif;?>
        <!------------------------------------------------->

        <!------------------------------------------------Assignment Button----------------------------------------------->
        <?php if($role==""):?>
            <?php if(!empty($announcement['due_date'])):?>
              <!-- deu date -->
              <p id="deu_date"class="card__time due_date" >Due Date&nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y",$expiration_date)?></p>
              <!-------------->
              <!-------------------------deadline--------------------------------->
              <?php
              $an_no=$announcement['an_no'];

              /*--------------to know if student sent assignment-----------------*/
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
              //to get student group no
              $sql="SELECT stu_group FROM student_group,groups WHERE student_group.g_no=groups.g_no AND stu_id=$stu_id AND groups.g_no='$groupNumber';";
              $result_stu_group = $conn->query($sql);
              if ($result_stu_group->num_rows == 1) {
                  while($row = $result_stu_group->fetch_assoc()) {
                    $stu_group=$row["stu_group"];
                    /**********to get the student id in session */
                    $_SESSION['stu_group']=$stu_group;
                  }
              }

              ///////////////////////
              //to get data if its exist
              $sql_check="SELECT post.an_no FROM post,student_group,announcement WHERE post.stu_group=student_group.stu_group AND post.an_no=announcement.an_no
              AND post.stu_group='$stu_group' AND post.an_no='$an_no';";
              $result_check = $conn->query($sql_check);
              if ($result_check->num_rows > 0) {
                  while($row = $result_check->fetch_assoc()) {
                    $check=$row['an_no'];
                  }
              }
              else{
                $check=NULL;
              }
              ///////////////////////
              if ($expiration_date <= $today):?>

                <?php
                if($check!=$an_no):?>
                  <div style="text-align: right;">
                    <i class="las la-calendar-times" style="font-size: 24px;margin-right:3.5%; color:red; font-weight: bold;"></i>
                  </div>
                <?php endif;?>

                <?php if($check==$an_no):?>
                    <div style="text-align: right;">
                      <i class="las la-check" style="font-size: 24px;margin-right:3%; color:#45a72a; font-weight: bold;"></i>
                    </div> 
                <?php endif;?>

              <?php endif;

              if ($expiration_date > $today):?>

                  <?php
                  if($check!=$an_no || empty($check)):?>
                    <div style="text-align: right; margin-top: 1rem;">
                      <button class="btn-create"><a href="../student/add asignment.php?g_no=<?= $groupNumber?>&an_no=<?php echo $announcement['an_no'];?> ">+</a></button>
                    </div>
                  <?php endif;?>

                  <?php if($check==$an_no):?>
                    <div style="text-align: right;">
                      <i class="las la-check" style="font-size: 24px;margin-right:3%; color:#45a72a; font-weight: bold;"></i>
                    </div> 
                  <?php endif;?>
              <?php endif;?>

              <!--------------End to know if student sent assignment-------------->
              
              <!----------------------End deadline-------------------------------->

            <?php endif;?>
        <?php endif;?>
      </div>  
    </div>
    <!--------------------------------------------------End Card------------------------------------------------------>  
  <?php endforeach;?> 
  
  <!------------------------------------------------end Assignment Buttom------------------------------------------------>

  </main>

</form>


<script>
/*******************for delet confirm***********************/
function confirmDelete(){
    if (confirm("Are you sure you want to delete ?")){
        return true;
    } 
    else {
        return false;
    }
}


</script>

</body>
</html>