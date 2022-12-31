<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/inside_group.php");
/////////////////////
$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];
$groupNumber=$_SESSION['g_no'];
////////////////////

//to get group name
$sql="SELECT g_name FROM groups Where g_no='$groupNumber';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////
//to get group name
$sql="SELECT full_name,u_img FROM user Where user_id='$user_id';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $username=$row["full_name"];
      $img=$row["u_img"];
    }
}
 if($role==""):
/*to get user id from user -> student*/
$sql="SELECT stu_id FROM user,student Where user.user_id=student.user_id AND user.user_id='$user_id';";
$result= $conn->query($sql);
if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
      $stu_id=$row["stu_id"];
    
    }
}
endif;
///////////////////////////
if($role=="teacher"):
    /*to get user id from user -> student*/
    $sql="SELECT tr_id FROM user,teacher Where user.user_id=teacher.user_id AND user.user_id='$user_id';";
    $result= $conn->query($sql);
    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
          $stu_id=$row["tr_id"];
        
        }
    }
    endif;
    ///////////////////////////

?>

<!DOCTYPE html>
<head>
    <title>Group</title>
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <meta name="descreption " content=" " />
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <!--stylesheet-->
    <link rel="stylesheet" href="../../css/inside_groups.css">
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<!-- to add a library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    <style>
     
         .dropdown{
            display:inline-block;
            position:relative;
        }
        .dropdown div{
            background-color:#fff;
            box-shadow:0 4px 8px rgba(0,0,0,0.2);
            z-index:1;
            visibility:hidden;
            position:absolute;
            min-width:100%;
            opacity:0;
            transition:.3s;
        }
        .dropdown:hover div{
            visibility:visible;
            opacity:1;
        }
        .dropdown div a{
            display:block;
            text-decoration:none;
            padding:8px;
            color:#000;
            transition:.1s;
            white-space:nowrap;
            margin-left:0px;
        }
        .dropdown div a:hover{
            background-color:#FFBA5F;
            color:#fff;
        }

    </style>

    </head>    
<html>
<body>
    <!----------------side bar------------------->
    <input type="checkbox" name="" id="menu-toggle">

    <div class="overlay">
        <label for="menu-toggle">
            <span class="las la-cance" style="color:#222242;"></span>
        </label>
    </div>

    <div class="sidebar">

        <div class="sidebar-container">
              
          <!----------------->
            <div class="brand">
                <h2>
                    <img src="../../sources/image/logo_dark.png" alt="" style="width: 100px;">
                </h2>
            </div>

            <!--menu profile photo -->
            <div class="sidebar-avartar" style="margin-top:20px">
                <div>
                    <a href="..\teacher\profile teacher.php" alt="" style="width: 70px; height:70px ;"><img src="<?php echo BASE_URL . '/sources/image/'.$img  ?>" alt=" " style="width: 70px; height:70px ;"></img></a>
                </div>

                <div class="avartar-info">
                    <div class="avartar-text">
                        <h4><?php echo $username;?></h4>
                        <p>Id : <?php echo $stu_id;?> </p>
                    </div>
                </div>
            </div>

            <!-- menu items -->
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="#">
                            <span style="font-size:20px;"><?php echo $g_name ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>">
                            <span class="las la-home"></span>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>">
                            <span class="las la-user-friends"></span>
                            <span>Student</span>
                        </a>
                    </li>     
                    <li>
                        <a href="#">
                            <span class="las la-bell"></span>
                            <span>Notifications</span>
                        </a>
                    </li>                
                    <li>
                    <a href="..\..\logout.php">
                        <span class="las la-sign-out-alt" style="color:#FFBA5F;"></span>
                        <span style="color:#FFBA5F;">LogOut</span>
                    </a>
                </ul>
            </div>

        </div>
    </div>
    <header class="main_icon">
        <div class="header-title">
            <label for="menu-toggle">
                <span class="las la-bars"></span>
            </label>
        </div>
    </header>
    <!----------------End side bar------------------->
    <div class="vertical_line"></div>

    <!----------------------------main container---------------------------->
    <div class="main-content">
       <!-- header div-->
       <div class="header-div">
			 
            <h1><?php echo $data ?></h1>
			<div class="group_info">
             <h3>Teacher Name: <?php echo  $teacher_name ?></h3>
			 <h3>Group Code: EFWL<?php echo $group_no ?></h3>
			</div>
            
            <div class="button-div"> 
            <!-------------------- (+) button------------------------------->
            <?php if($role==""):?>
                
            <a href="../student/add asignment.php?g_no=<?= $group_no?>">  </a>
                <div class="dropdown">
                <button class="btn-create">+</button>
                <div>
                    <a href="<?php echo BASE_URL . '/UI/teacher/announcement.php' ?>">Assignment</a>
                    <a href="<?php echo BASE_URL . '/UI/teacher/Add Enquiry .php' ?>">Enquiry</a>
                </div>
                </div>
          
            <?php endif;?>
            
            <?php if($role=="teacher"):?>
                <div class="dropdown">
                    <button class="btn-create">+</button>
                    <div>
                        <a href="../teacher/add.php?g_no=<?= $group_no?>">Material</a>
                        <a href="../teacher/add announcement.php?g_no=<?= $group_no?>">Announcement</a>
                        <a href="../teacher/add_announcement_assignment.php?g_no=<?= $group_no?>">Assignment</a>
                    </div>
                </div>
            <?php endif;?>    
            <!------------------------------------------------------------->
            </div>
        </div>
     
         <!-- ************************************************************************************* -->
		 <main>
	
       <div class="row">
  <div class="column">
    <div class="card">
    <h3><a href="<?php echo BASE_URL . '/UI/student/materials.php' ?>">Materials</a></h3>
    </div>
  </div>
       
  <div class="column">
    <div class="card">
      <h3><a href="<?php echo BASE_URL . '/UI/student/assignment.php' ?>">Assignments</a></h3>
  
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3><a href="<?php echo BASE_URL . '/UI/teacher/announcement.php' ?>">Announcements</a></h3>
    </div>
  </div>
  
  <?php if($role==""):?>
  <div class="column">
    <div class="card">
      <h3><a href="<?php echo BASE_URL . '/UI/teacher/Add Enquiry .php' ?>">Enquiries</a></h3>
     </div>
  </div>
  <?php endif;?>
    
  <?php if($role=="teacher"):?>
    <div class="column">
    <div class="card">
      <h3><a href="<?php echo BASE_URL . '/UI/teacher/Add Reply.php' ?>">Enquiries</a></h3>
     </div>
  </div>

    <div class="column">
        <div class="card">
        <h3><a href="<?php echo BASE_URL . '/UI/teacher/reports.php' ?>">Report</a></h3>
        </div>
    </div>
   <?php endif;?>
</div>
       <main>    
        
    </div>
    <!-------------end main group----------------->

<!-- java script for current date -->
<!---js section for image slider--->
    <script>
    </script>
      
</body>
</html>