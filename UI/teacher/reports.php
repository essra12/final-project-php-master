<?php
include("../../path.php"); 
include(MAIN_PATH. "/database/db.php");
$groupNumber=$_SESSION['g_no'];

$reports=selectAllAnnouncement($groupNumber);

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reports</title>
    <meta charset="utf-8">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../css/reports.css" /> 
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
    <!--------------------------------->

    <div class="main-container">
        <h1 class="title">Reports</h1>
        <div class="group-cards">

            <!--------------card---------------->

            <?php foreach($reports as $key => $report):?>
                <?php if(!empty($report['due_date'])): ?>
                    <div class="group-card">
                        <div class="square-flip">
                            <div class='square'>
                                <div class="square-container">
                                    <i class="las la-user-friends"></i>
                                    <!--Number of student-->
                                    <span class="number">
                                    <?php
                                        $an_no=$report['an_no'];
                                        $sql="SELECT COUNT(*) FROM post,announcement WHERE post.an_no=announcement.an_no AND post.an_no='$an_no' ;";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows == 1) {
                                            while($row = $result->fetch_assoc()) {
                                            $students=$row['COUNT(*)']; 
                                            }
                                        }
                                        echo $students;
                                    ?></span>
                                    <!--------------------->
                                    <!--DateTime-->
                                    <?php $datetime=strtotime($report['an_Datetime'])?>
                                    <h2 class="textshadow"><?php echo date("d-m-Y",$datetime)?></h2>
                                    <!------------>
                                    <!--Text-->
                                    <p class="textshadow"><?php echo html_entity_decode(substr($report['an_content'],0,152). '...'); ?></p>
                                    <!-------->
                                </div>
                                <div class="flip-overlay"></div>
                            </div>
                            <div class='square2'>
                                <div class="square-container2">
                                    <a href="inside reports.php?an_no=<?= $an_no?>"  class="boxshadow button">View Report</a>
                                </div>
                                <div class="flip-overlay"></div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>

            <?php endforeach;?>
            <!------------------------------------>

        </div>
    </div>

    </body>

</html>