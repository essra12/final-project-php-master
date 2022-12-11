<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/teachers.php"); 
$teachers=selectAllTeacherInfo();  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control Panel (teachers with their groups)</title>
        <link rel="stylesheet" href="../../css/controlpanel_groups_teacher_student_files.css">
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
            <h2>Teachers Inside Groups</h2><br>
        </div>
        <img src="../../sources/image/teacher_image_3d.png" >
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
                    <td data-label="delete"><a onclick="return confirmDelete()" href="teacher_control_panel.php?delete_tr_id=<?php echo $teacher['tr_id']; ?>&deleteID=<?php echo $teacher['user_id']; ?>"><i class="las la-trash-alt ticon delet"></i></a></td>
                </tr>
            <?php endforeach; ?> 


            </tbody>
        </table>
    </div>
<!--------------------------->

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
        if (confirm("Are you sure you want to delete ?/nif you delete it,it will delete its group !!!")) {
            return true;
        } 
        else {
            return false;
        }
    }

</script>
</body>
</html>
