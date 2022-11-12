<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/students.php"); 
$teachers=selectAllTeacherInfo();  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control_Panel_teacher</title>
        <link rel="stylesheet" href="../../css/group_tr_stu_file_control_panel.css">
        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

<body id="b-vlightblue">

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

        <div class="header-box-content-table">
            <h2>Add New Teacher Account</h2><br>
            <a href="<?php echo BASE_URL . '/UI/control_panel/create_teacher.php' ?>">
                <button class="btn-create">+</button>
            </a>
        </div>
        <img src="../../sources/image/teacher_image_3d.png" >
    </div>

<!--  table for teacher  -->

    <div class="table-box">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Teacher Id</th>
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Group Name</th>
                    <th scope="col" width="70px">Delete</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($teachers as $key => $teacher):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $teacher  -->
                <tr>
                    <td data-label="tr-id"><?php echo $teacher['tr_id'] ?></td>
                    <td data-label="tr-name"><img src="<?php echo BASE_URL . '/sources/image/' . $teacher['u_img']; ?>" class="tab-img" style="width: 30px; height: 30px;border-radius:100%;"><?php echo $teacher['full_name'] ?></td>
                    <td data-label="tr-phone"><?php echo $teacher['tr_phone_no'] ?></td>
                    <td data-label="g-name"><?php echo $teacher['g_name'] ?></td>
                    <td data-label="delete"><i class="las la-trash-alt ticon delet"></i></td>
                </tr>
            <?php endforeach; ?> 


            </tbody>
        </table>
    </div>

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
