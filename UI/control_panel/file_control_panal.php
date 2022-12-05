<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/delete_files_from_controll_panel.php"); 
$files=selectAllFileInfo();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control Panel (Files)</title>
        <link rel="stylesheet" href="../../css/control_panel_group_teacher_student_file.css">
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
    <div class="header-box file">

        <div class="header-box-content-table">
            <h2>Files Data</h2><br>
        </div>
        <img class="file_image_3d" src="../../sources/image/file_image_3d.png" >
    </div>
    <!--------------------->

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

    <!--table for teacher  -->

    <div class="table-box">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">File Id</th>
                    <th scope="col">File Name</th>
                    <th scope="col" width="70px">Delete</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($files as $key => $file):?>
                <tr>
                    <td data-label="file-id"><?php echo $file['f_no'] ?></td>
                    <td data-label="file-name"><?php echo $file['f_name'] ?></td>
                    <td data-label="delete"><a  onclick="return confirmDelete()" href="file_control_panal.php?deletef_no=<?php echo $file['f_no']; ?>"><i class="las la-trash-alt ticon delet"></i></a></td>
                </tr>
            <?php endforeach; ?> 
            </tbody>
        </table>
    </div>
    <!------------------------->

</div>

<script>
    
    /*******for sidebar (highlights items after click it)******/
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
