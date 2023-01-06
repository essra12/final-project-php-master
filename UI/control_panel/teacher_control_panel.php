<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/teachers.php");

////////////search///////////////
$search="";
if(isset($_POST['search_tr'])){
    if(!empty($_POST['find_tr']))
    {
        $search=$_POST['find_tr'];
        $teachers=searchTeacher($search);
    }
}
else{
    $teachers=selectAllteacher(); 
}

/* $teachers=selectAllteacher();  */ 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control Panel (Teachers)</title>
        <!--for logo-->
        <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
        <!--stylesheet-->
        <link rel="stylesheet" href="../../css/controlpanel_groups_teacher_student_files.css">
        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>            
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
    <div class="header-box tr">

        <div class="header-box-content-table">
            <h2>Add Teacher Account</h2><br>
            <a href="<?php echo BASE_URL . '/UI/control_panel/create_teacher.php' ?>">
                <button class="btn-create">+</button>
            </a>
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


    <form action="" method="POST"  onsubmit="return check_Enter(this)">  
        <!--serch bar-->
        <div class="search">
            <input type="text" value="<?php echo $search;?>" placeholder=" Enter Teacher Name" id="find_tr" name="find_tr" >
            <span class="clear-btn"><i id="clear-btn" class="fa-solid fa-xmark" onclick="ClearFields();"></i></span>
            <button type="submit" name="search_tr">Search</button>  
        </div>
        <!------------->
    </form>
    <!-- For Errors message-->
    <?php if(count($errors)> 0): ?>
            <div class="msg error" style="color: #D92A2A; margin-bottom: 10px; text-align: left;"> 
                <?php foreach($errors as $error): ?>
                <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php  echo($error); ?></li> 
                <?php endforeach; ?>
            </div> 
            <?php endif; ?> 
    <!------------------------>

    <!--  table for teacher  -->
    <?php if(empty($teachers)): 
            $teachers=selectAllteacher(); 
    endif;?>
    <?php if(!empty($teachers)): ?>
    <div class="table-box">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Teacher Id</th>
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col" width="70px">Delete</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($teachers as $key => $teacher):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $teacher  -->
                <tr>
                    <td data-label="tr-id"><?php echo $teacher['tr_id'] ?></td>
                    <td data-label="tr-name"><img src="<?php echo BASE_URL . '/sources/image/' . $teacher['u_img']; ?>" class="tab-img" style="width: 30px; height: 30px;border-radius:100%;"><?php echo $teacher['full_name'] ?></td>
                    <td data-label="tr-phone"><?php echo $teacher['tr_phone_no'] ?></td>
                    <td data-label="delete"><a onclick="return confirmDelete()" href="teacher_control_panel.php?delete_tr_id=<?php echo $teacher['tr_id']; ?>&deleteID=<?php echo $teacher['user_id']; ?>"><i class="las la-trash-alt ticon delet"></i></a></td>
                </tr>
            <?php endforeach; ?> 


            </tbody>
        </table>
    </div>
    <?php endif;?>
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
        if (confirm("Are you sure you want to delete teacher?\ndelete it causes its group to be deleted !!!")) {
            return true;
        } 
        else {
            return false;
        }
    }
    /************************clear field************************/
    function ClearFields() {
        document.getElementById("find_tr").value = "";
    }
    /***********************************************************/
</script>
</body>
</html>
