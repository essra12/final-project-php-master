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
//to get user name
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
/////////////////////////////////
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
     /*******************************************************/
  /**********************leave section*******************/
  if($role==""):
  if(isset($_POST['leave'])){
    $groupNumber=$_SESSION['g_no'];
    global $conn;
    $sql="DELETE FROM `student_group` WHERE student_group.stu_id=$stu_id  AND student_group.g_no=$groupNumber;";
    $pre=$conn->query($sql);
    if(mysqli_query($conn, $sql)){
        header('location: '.BASE_URL.'/UI/group/main page for group.php');
        $conn->close();  
        exit();}
}
endif;
   

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
       <!------------Navigation Bar ----------->  
       <nav class="navbar">  </nav>
     <!------------------------------------>
    <!----------------side bar------------------->
    <input type="checkbox" name="" id="menu-toggle">

    <div class="overlay">
        <label for="menu-toggle">
            <span class="las la-cance" style="color:#222242;"></span>
        </label>
    </div>

    <div class="sidebar">

        <div class="sidebar-container">
           
          <!----------------back button and logo------------------->  
          <ul class="lift-side" id="lift-side">
          <!-------back------>
          <li><div class="back"><a href="../group/main page for group.php"><i class="las la-arrow-left"></i></a></div></li>
          <!----------------->

          <!-------logo------>
          <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
          <!----------------->
          </ul>
       

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
        <!--*************************************************************************** -->
        <?php if($role==""):?>
        <!--leave button -->
           <div class="sidebar-card-btn">
            <form action="inside_group.php" method="POST">
            <input  class="btn btn-admin" type="button" value="Leave" name="leave" onclick="return confirmDelete()"> 
            </form>
             </div>
        <?php endif;?>
        <!--*************************************************************************** -->
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
   <a href="<?php echo BASE_URL . '/UI/student/materials.php' ?>"><div class="card">
    <h3>Materials</h3>
    </div></a>
  </div>
   
  <?php if($role==""):?>
  <div class="column">
   <a href="<?php echo BASE_URL . '/UI/student/assignment.php' ?>"><div class="card">
      <h3>Assignments</h3>
    </div></a>
  </div>
  <?php endif;?>
  <?php if($role=="teacher"):?>
  <div class="column">
  <a href="<?php echo BASE_URL . '/UI/teacher/Assignments for Teacher.php' ?>"><div class="card">
      <h3>Assignments</h3>
    </div></a>
  </div>
  <?php endif;?>
  
  <div class="column">
  <a href="<?php echo BASE_URL . '/UI/teacher/announcement.php' ?>"><div class="card">
      <h3>Announcements</h3>
    </div></a>
  </div>
  
  <?php if($role==""):?>
  <div class="column">
  <a href="<?php echo BASE_URL . '/UI/teacher/Add Enquiry .php' ?>"><div class="card">
      <h3>Enquiries</h3>
     </div></a>
  </div>
  <?php endif;?>
    
  <?php if($role=="teacher"):?>
    <div class="column">
    <a href="<?php echo BASE_URL . '/UI/teacher/Add Reply.php' ?>"><div class="card">
      <h3>Enquiries</h3>
     </div></a>
  </div>

    <div class="column">
    <a href="<?php echo BASE_URL . '/UI/teacher/reports.php' ?>"><div class="card">
        <h3>Report</h3>
        </div></a>
    </div>
   <?php endif;?>
</div>
       <main>    
        
    </div>
    <!-------------end main group----------------->

    <script>
    /*******************for delet confirm***********************/
    function confirmDelete(){
    if (confirm("Are you sure you want to Leave the group?")) {
        return true;
    } 
    else {
        return false;
    }}
    </script>
      
</body>
</html>