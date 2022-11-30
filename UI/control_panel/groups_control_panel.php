<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/groups.php"); 
$groups=selectAllGroupInfo();

?>
<!DOCTYPE html>
<ht7;l.ml lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control Panel (Groups)</title>
        <link rel="stylesheet" href="../../css/control_panel_group_teacher_student_file.css">
        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

<body  class="b-white">

<!-- menu -->
<?php include(MAIN_PATH."/common/sidebar.php"); ?> 
<!-------------------->

<!-- header card -->
<header class="main_icon">
    <div class="header-title">
        <label for="menu-toggle">
            <span class="las la-bars"></span>
        </label>
    </div>
</header>
<!------------------->

<!--  main content -->

<div class="main-content">
    

    <!-- header card -->
    <div class="header-box">

        <div class="header-box-content">
            <h2>Add New Group</h2><br>
            <a href="<?php echo BASE_URL . '/UI/control_panel/create_group.php' ?>">
                <button class="btn-create">+</button>
            </a>
            <h4 style="margin-top: 20px;"><a href="<?php echo BASE_URL . '/UI/control_panel/teacher_with_group_control_panel.php' ?>" style="color: #222242 ;" class="show_tr_g">click here Show all teachers with their groups</a></h4>
        </div>
        <img  src="../../sources/image/groups_image_3d.png" >
    </div>
    <!----------------->

     <!-- For Succes -->
     <?php if (isset($_SESSION['message'])): ?>
                <div class="msg success" style="color: #5a9d48; margin-Top: 20px;">
                    <li><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
                    <?php
                    /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
                    unset($_SESSION['message']);
                    ?>
                </div>
              <?php endif; ?>
    <!----------------->

    <main>

  

       <!--  group cards -->
        <div class="group-cards">
            
        <?php foreach($groups as $key => $group):?>
            

                <div class="group-card">
                <a href="">
                    <div class="group-card-info">
                        <h3><?php echo $group['g_name'] ?></h3>
                        <p>Group ID:<?php echo $group['g_no'] ?></p>
                        <p>Tr Name: <?php echo $group['full_name'] ?></p>
                        

                    </div>
                    <div class="group-card-num">
                        <a onclick="return confirmDelete()" href="groups_control_panel.php?deleteID=<?php echo $group['g_no']; ?>"><i class="las la-trash-alt ticon delet" style="margin-left: 0px;padding:0px; margin-top:20px;"></i></a>
                        <a  href="edit-groups.php?name-g=<?php echo $group['g_name'] ?>&name-t=<?php echo $group['full_name'] ?>&id=<?php echo $group['g_no']?>"><i class="las la-pen ticon edit" style="margin-left: 2px;padding:0px; margin-top:5px;"></i></a>
                        <div class="group-card-icon">
                            <span class="las la-user-friends"></span>
                        </div>
                        <span class="members-num">33</span> 
                    </div>
                </a>
                </div>
            
            <?php endforeach; ?>

        </div>
        <!-------------------->

    </main>

    </form>

    
 </div>



 <script>

    /********for sidebar (highlights items after click it)**********/
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('.sidebar-menu a').forEach(link => {
    if(link.href.includes(`${activePage}`)){
        link.classList.add('active');
        console.log(link);
    }
    })

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
