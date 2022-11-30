<?php 
include(MAIN_PATH. "/database/connection.php");
?>


<nav class="navbar">
    <div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div>
    <div class="navbar-links">
        <ul>
        <li><a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>"><i class="las la-home"></i>&nbsp;&nbsp;Home</a></li>

        <!--students-->
        <?php if ($_SESSION['role']=="teacher"):?> 
            <li><a href="<?php echo BASE_URL . '/UI/teacher/Enrollment Requests.php' ?>"><i class="las la-user-friends"></i>&nbsp;&nbsp;Students</a></li>
        <?php endif; ?>  
        <!------------>

        <!-- <li><a href="<?php /* echo BASE_URL . '/UI/teacher/Enrollment Requests.php'  */?>"><i class="las la-user-friends"></i>&nbsp;&nbsp;Students</a></li> -->
        <li><a href="..\..\logout.php" style="color:#FFBA5F;"><i class="las la-sign-out-alt"></i>&nbsp;&nbsp;LogOut</a></li>
        </ul>
    </div>
</nav>