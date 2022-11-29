<?php 
include("../../path.php"); 
include(MAIN_PATH."/DataBase/db.php"); 
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

<!--  table for teacher  -->

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
