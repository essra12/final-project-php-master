<?php 
include(MAIN_PATH. "/database/connection.php");
$username=$_SESSION['full_name'];
$user_id=$_SESSION['user_id'];

$sql="SELECT u_img FROM user Where user_id ='$user_id';";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
      $img=$row["u_img"];
    }
}
?>
<!-- menu -->
<input type="checkbox" name="" id="menu-toggle">

<div class="overlay">
    <label for="menu-toggle">
        <span class="las la-cance"></span>
    </label>
</div>

<div class="sidebar">

    <div class="sidebar-container">

        <div class="brand">
            <h2>
                <img src="../../sources/image/logo_dark.png" alt="" style="width: 100px;">
            </h2>
        </div>

        <!--menu profile photo -->
        <div class="sidebar-avartar" style="margin-top:20px">
            <div>
                <a href="<?php echo BASE_URL . '/UI/admin/admin profile.php' ?>"><img src="<?php echo BASE_URL . '/sources/image/'.$img  ?> " alt=" " style="width: 70px; height:70px ;"></a>
            </div>

            <div class="avartar-info">
                <div class="avartar-text">
                    <h4><?php echo $username;?></h4>
                    <p>Id : <?php echo $user_id;?> </p>
                </div>
            </div>
        </div>

        <!-- menu items -->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo BASE_URL . '/UI/control_panel/groups_control_panel.php' ?>">
                        <span class="las la-user-friends"></span>
                        <span>Groups</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . '/UI/control_panel/teacher_control_panel.php' ?>">
                        <span class="las la-user-tie"></span>
                        <span>Teachers</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . '/UI/control_panel/student_control_panel.php' ?>">
                         <span class="las la-user-alt"></span>
                        <span>Students</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . '/UI/control_panel/file_control_panal.php' ?>">
                        <span class="lar la-file"></span>
                        <span>Files</span>
                    </a>
                </li>
              
                <li>
                <a href="..\..\logout.php">
                        <span class="las la-sign-out-alt" style="color:#FFBA5F;"></span>
                        <span style="color:#FFBA5F;">LogOut</span>
                    </a>

            </ul>
        </div>

        <!--menu admen -->
        <div class="sidebar-card">
            <img src="../../sources/image/admin_image_3d.png">  
        </div>
        <div class="sidebar-card-btn">
            <a href="<?php echo BASE_URL . '/UI/control_panel/admin_control_panel.php' ?>">
                 <button  class="btn btn-admin">Admin</button>
            </a>
        </div>

    </div>

</div>
<!-------------------->
