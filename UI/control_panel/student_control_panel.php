<?php 
include("../../path.php");  
include(MAIN_PATH."/controls/students.php"); 
$students=selectAllStudentInfo();  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control Panel (Students)</title>
        <!--for logo-->
        <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
        <!--stylesheet-->
        <link rel="stylesheet" href="../../css/controlpanel_groups_teacher_student_files.css">
        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

<body id="b-vlightblue">

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

        <div class="header-box-content-table">
            <h2>Students Data</h2>
        </div>
        <img src="../../sources/image/stu_3d.png"  >
    </div>
    <!------------------>

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

   <!--  table for teacher  -->
    <div class="table-box">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student Id</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">specialization</th>
                    <th scope="col" width="70px">Delete</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($students as $key => $student):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $student  -->
                            <tr>
                                <td data-label="stu-id"><?php echo $student['stu_id'] ?></td>
                                <td data-label="stu-name"><img src="<?php echo BASE_URL . '/sources/image/' . $student['u_img']; ?>" class="tab-img" style="  width: 30px; height: 30px;border-radius:100%;"><?php echo $student['full_name'] ?></td>
                                <td data-label="stu_specialization"><?php echo $student['stu_specialization'] ?></td>
                                <td data-label="delete"><a onclick="return confirmDelete()" href="student_control_panel.php?deleteID=<?php echo $student['user_id']; ?>&deletestu_id=<?php echo $student['stu_id']; ?>"><i class="las la-trash-alt ticon delet"></a></i></td>
                            </tr>
            <?php endforeach; ?> 
              
            </tbody>
        </table>
    </div>
    <!------------------------>

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
