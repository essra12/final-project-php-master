<?php 
include("../../path.php"); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control_Panel_file</title>
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
                    <th scope="col">File Type</th>
                    <th scope="col" width="70px">Delete</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td data-label="file-id">1222</td>
                    <td data-label="file-name">MMM MMM</td>
                    <td data-label="file_type">progrmming</td>
                    <td data-label="delete"><i class="las la-trash-alt ticon delet"></i></td>
                </tr>
                <tr>
                    <td data-label="file-id">1333</td>
                    <td data-label="file-name">YYY YYY</td>
                    <td data-label="file_type">Network</td>
                    <td data-label="delete"><i class="las la-trash-alt ticon delet"></i></td>
                </tr>
                <tr>
                    <td data-label="file-id">1222</td>
                    <td data-label="file-name">MMM MMM</td>
                    <td data-label="file_type">progrmming</td>
                    <td data-label="delete"><i class="las la-trash-alt ticon delet"></i></td>
                </tr>
                <tr>
                    <td data-label="file-id">1222</td>
                    <td data-label="file-name">MMM MMM</td>
                    <td data-label="file_type">progrmming</td>
                    <td data-label="delete"><i class="las la-trash-alt ticon delet"></i></td>
                </tr>
                <tr>
                    <td data-label="file-id">1222</td>
                    <td data-label="file-name">MMM MMM</td>
                    <td data-label="file_type">progrmming</td>
                    <td data-label="delete"><i class="las la-trash-alt ticon delet"></i></td>
                </tr>
                <tr>
                    <td data-label="file-id">1222</td>
                    <td data-label="file-name">MMM MMM</td>
                    <td data-label="file_type">progrmming</td>
                    <td data-label="delete"><i class="las la-trash-alt ticon delet"></i></td>
                </tr>
                <tr>
                    <td data-label="file-id">1222</td>
                    <td data-label="file-name">MMM MMM</td>
                    <td data-label="file_type">progrmming</td>
                    <td data-label="delete"><i class="las la-trash-alt ticon delet"></i></td>
                </tr>
                <tr>
                    <td data-label="file-id">1222</td>
                    <td data-label="file-name">MMM MMM</td>
                    <td data-label="file_type">progrmming</td>
                    <td data-label="delete"><i class="las la-trash-alt ticon delet"></i></td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>
