<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/admins.php"); 
$table="user";
$condition=["admin"=>1];
$admins=selectAll($table,$condition);  
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
    <div class="header-box admin">

        <div class="header-box-content-table">
            <h2>Add New Admin</h2><br>
            <a href="<?php echo BASE_URL . '/UI/control_panel/create_admin.php' ?>">
                <button class="btn-create">+</button>
            </a>
        </div>
        <img class="file_image_3d" src="../../sources/image/admin_image_3d.png" >
    </div>

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

<!--  table for teacher  -->

    <div class="table-box">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Admin Id</th>
                    <th scope="col">Admin Name</th>
                    <th scope="col" width="70px">Edit</th>
                    <th scope="col" width="70px">Delete</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($admins as $key => $admin):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $teacher  -->
                <tr id="<?php echo $admin['user_id'] ?>">
                    <td data-label="tr-id"><?php echo $admin['user_id'] ?></td>
                    <td data-label="tr-name"><img src="<?php echo BASE_URL . '/sources/image/' . $admin['u_img']; ?>" class="tab-img" style="width: 30px; height: 30px;border-radius:100%;"><?php echo $admin['full_name'] ?></td>
                    <td data-label="edit"></i><i class="las la-pen ticon edit"></i></td>

                    <td data-label="delete"><a  onclick="confirmDelete()" href="admin_control_panel.php?deleteID=<?php echo $admin['user_id']; ?>"><i class="las la-trash-alt ticon delet"></i></a></td>

                    <!-- <td data-label="delete"><a href="admin_control_panel.php?deleteID=<?php  /* echo $admin['user_id']; */?>"><i class="las la-trash-alt ticon delet"></i></a></td> -->
                </tr>
            <?php endforeach; ?> 


            </tbody>
        </table>
    </div>

</div>

<script>

    /*************for sidebar items*****************/
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('.sidebar-menu a').forEach(link => {
    if(link.href.includes(`${activePage}`)){
        link.classList.add('active');
        console.log(link);
    }
    })

   /*******************for***********************/

   function confirmDelete() {
    if (confirm("Are you sure you want to delete this data?")) {
         return true;
    } 
    else {
        return false;
    }
}


</script>

</body>
</html>
