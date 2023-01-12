<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/students.php"); 
///////////search///////////////
$search="";
if(isset($_POST['search_stu'])){
    if(!empty($_POST['find_stu']))
    {
        $search=$_POST['find_stu'];
        $students=searchStudentInGroup($search);
    }
}
else{
    $students=selectAllStudentInGroup(); 
}
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control Panel (students in group)</title>
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
    <div class="header-box">

        <div class="header-box-content-table">
            <h2>Students Inside Group</h2><br>
            <h4 style="text-align: left;">Teacher Name :
                <?php 
                if(isset($_GET['tr_name'])){
                    $tr_name=$_GET['tr_name'];
                }
                echo  $tr_name?>
            </h4>
        </div>
        <img src="../../sources/image/teacher_image_3d.png" >
    </div>
    <!------------------>

    <form action="" method="POST"  onsubmit="return check_Enter(this)">  
        <!--serch bar-->
        <div class="search">
            <input type="text" value="<?php echo $search;?>" placeholder=" Enter Student ID" id="find_stu" name="find_stu"  onkeypress="return onlyNumberKey(event)" >
            <span class="clear-btn"><i id="clear-btn" class="fa-solid fa-xmark" onclick="ClearFields();"></i></span>
            <button type="submit" name="search_stu">Search</button>  
        </div>
        <!------------->
    </form>

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

<!-- For Errors message-->
    <!--the errors-->
    <p id="demo"></p>

    <?php if(count($errors)> 0): ?>
            <div class="msg error" style="color: #D92A2A; margin-bottom: 10px; text-align: left;"> 
                <?php foreach($errors as $error): ?>
                <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php  echo($error); ?></li> 
                <?php endforeach; ?>
            </div> 
            <?php endif; ?> 
    <!------------------------>

<!--  table for teacher  -->
<?php if(empty($students)): 
        $students=selectAllStudentInGroup();  
    endif;?>
    <?php if(!empty($students)): ?>
    <div class="table-box">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student Id</th>
                    <th scope="col">Student Name</th>
                    <!-- <th scope="col" width="70px">Delete</th> -->
                </tr>
            </thead>

            <tbody>
            <?php foreach($students as $key => $student):?> <!--هذا المتغير عبارة عن سجل واحد من الجدول $teacher  -->
                <tr>
                    <td data-label="stu-id"><?php echo $student['stu_id'] ?></td>
                    <td data-label="stu-name"><img src="<?php echo BASE_URL . '/sources/image/' . $student['u_img']; ?>" class="tab-img" style="width: 30px; height: 30px;border-radius:100%;"><?php echo $student['full_name'] ?></td>
                    <!-- <td data-label="delete"><a onclick="return confirmDelete()" href="teacher_control_panel.php?delete_tr_id=<?php /* echo $teacher['tr_id']; */ ?>&deleteID=<?php /* echo $teacher['user_id']; */ ?>"><i class="las la-trash-alt ticon delet"></i></a></td> -->
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
        if (confirm("Are you sure you want to delete ?/nif you delete it,it will delete its group !!!")) {
            return true;
        } 
        else {
            return false;
        }
    }
        /***********************************************************/
        /************************clear field************************/
        function ClearFields() {
            document.getElementById("find_stu").value = "";
        }
        /***********************************************************/
</script>
</body>
</html>
