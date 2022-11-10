<?php 
include("../../path.php"); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control_Panel_Groups</title>
        <link rel="stylesheet" href="../../css/group_tr_stu_file_control_panel.css">
        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

<body  class="b-white">

<!-- menu -->
<?php include(MAIN_PATH."/common/sidebar.php"); ?> 
<!-------------------->

<header class="main_icon">
    <div class="header-title">
        <label for="menu-toggle">
            <span class="las la-bars"></span>
        </label>
    </div>
</header>
<!--  main content -->

<div class="main-content">
    

    <!-- header card -->
    <div class="header-box">

        <div class="header-box-content">
            <h2>Create New Groups</h2><br>
            <a href="<?php echo BASE_URL . '/UI/control_panel/create_group.php' ?>">
                <button class="btn-create">+</button>
            </a>
        </div>
        <img  src="../../sources/image/groups_image_3d.png" >
    </div>


    <main>
       <!--  group cards -->
        <div class="group-cards">
            <a href="">
                <div class="group-card">
                    <div class="group-card-info">
                        <h3>Group name...</h3>
                        <p>Id....</p>
                        <p>Teacher Name...</p>
                    </div>
                    <div class="group-card-num">
                        <div class="group-card-icon">
                            <span class="las la-user-friends"></span>
                        </div>
                        <span class="members-num">33</span>
                    </div>
                </div>
            </a>

            <a href="">
                <div class="group-card">
                    <div class="group-card-info">
                        <h3>Group name...</h3>
                        <p>Id....</p>
                        <p>Teacher Name...</p>
                    </div>
                    <div class="group-card-num">
                        <div class="group-card-icon">
                            <span class="las la-user-friends"></span>
                        </div>
                        <span class="members-num">33</span>
                    </div>
                </div>
            </a>

            <a href="">
                <div class="group-card">
                    <div class="group-card-info">
                        <h3>Group name...</h3>
                        <p>Id....</p>
                        <p>Teacher Name...</p>
                    </div>
                    <div class="group-card-num">
                        <div class="group-card-icon">
                            <span class="las la-user-friends"></span>
                        </div>
                        <span class="members-num">33</span>
                    </div>
                </div>
            </a>

            <a href="">
                <div class="group-card">
                    <div class="group-card-info">
                        <h3>Group name...</h3>
                        <p>Id....</p>
                        <p>Teacher Name...</p>
                    </div>
                    <div class="group-card-num">
                        <div class="group-card-icon">
                            <span class="las la-user-friends"></span>
                        </div>
                        <span class="members-num">33</span>
                    </div>
                </div>
            </a>

            <a href="">
                <div class="group-card">
                    <div class="group-card-info">
                        <h3>Group name...</h3>
                        <p>Id....</p>
                        <p>Teacher Name...</p>
                    </div>
                    <div class="group-card-num">
                        <div class="group-card-icon">
                            <span class="las la-user-friends"></span>
                        </div>
                        <span class="members-num">33</span>
                    </div>
                </div>
            </a>

            <a href="">
                <div class="group-card">
                    <div class="group-card-info">
                        <h3>Group name...</h3>
                        <p>Id....</p>
                        <p>Teacher Name...</p>
                    </div>
                    <div class="group-card-num">
                        <div class="group-card-icon">
                            <span class="las la-user-friends"></span>
                        </div>
                        <span class="members-num">33</span>
                    </div>
                </div>
            </a>

            <a href="">
                <div class="group-card">
                    <div class="group-card-info">
                        <h3>Group name...</h3>
                        <p>Id....</p>
                        <p>Teacher Name...</p>
                    </div>
                    <div class="group-card-num">
                        <div class="group-card-icon">
                            <span class="las la-user-friends"></span>
                        </div>
                        <span class="members-num">33</span>
                    </div>
                </div>
            </a>

            <a href="">
                <div class="group-card">
                    <div class="group-card-info">
                        <h3>Group name...</h3>
                        <p>Id....</p>
                        <p>Teacher Name...</p>
                    </div>
                    <div class="group-card-num">
                        <div class="group-card-icon">
                            <span class="las la-user-friends"></span>
                        </div>
                        <span class="members-num">33</span>
                    </div>
                </div>
            </a>
            
        </div>
    </main>

 </div>

 <script>
    /* for sidebar items */
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('.sidebar-menu a').forEach(link => {
    if(link.href.includes(`${activePage}`)){
        link.classList.add('active');
        console.log(link);
    }
    })
</script>

</body>
</html>
