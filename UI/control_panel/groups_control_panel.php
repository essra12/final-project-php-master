<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/groups.php"); 

////////////search///////////////
$search="";
if(isset($_POST['search_g'])){
    if(!empty($_POST['find_g']))
    {
        $search=$_POST['find_g'];
        $groups=searchGroup($search);
    }
}
else{
    $groups=selectAllGroupInfo(); 
}

/* $groups=selectAllGroupInfo(); */
?>
<!DOCTYPE html>
<ht7;l.ml lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control Panel (Groups)</title>
        <!--for logo-->
        <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
        <!--stylesheet-->
        <link rel="stylesheet" href="../../css/controlpanel_groups_teacher_student_files.css">
        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>   
    </head>

<body  id="b-vlightblue">

<!-- menu -->
<?php include(MAIN_PATH."/common/sidebar.php");  ?> 
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
            <h4 style="margin-top: 20px;"><a href="<?php echo BASE_URL . '/UI/control_panel/teacher_with_group_control_panel.php' ?>" style="color: #222242 ;" class="show_tr_g">Show all teachers with their groups</a></h4>
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

    <form action="" method="POST"  onsubmit="return check_Enter(this)">  
        <!--serch bar-->
        <div class="search group">
            <input type="text" value="<?php echo $search;?>" placeholder=" Enter Group Name" id="find_g" name="find_g" >
            <span class="clear-btn"><i id="clear-btn" class="fa-solid fa-xmark" onclick="ClearFields();"></i></span>
            <button type="submit" name="search_g">Search</button>  
        </div>
        <!------------->
    </form>
    <!-- For Errors message-->
    <?php if(count($errors)> 0): ?>
            <div class="msg error" style="color: #D92A2A; margin-bottom: 10px;  text-align: left;"> 
                <?php foreach($errors as $error): ?>
                <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php  echo($error); ?></li> 
                <?php endforeach; ?>
            </div> 
            <?php endif; ?> 
    <!------------------------>

       <!--  group cards -->
        <div class="group-cards">
            <?php if(empty($groups)): 
                $groups=selectAllGroupInfo(); 
            endif;?>
            <?php if(!empty($groups)): ?>
            <?php foreach($groups as $key => $group):?>
                
                <div class="group-card">
                    <a href="students_in_group_control_panel.php?g_no=<?= $group['g_no']?>&tr_name=<?php echo $group['full_name']?>">
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

                            <!----------------------------------------------->
                            <span class="members-num">
                                <?php
                                    $g_no=$group['g_no'];
                                    $sql="SELECT COUNT(*) FROM student_group,groups WHERE student_group.g_no=groups.g_no AND student_group.g_no='$g_no' ;";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows == 1) {
                                        while($row = $result->fetch_assoc()) {
                                        $students=$row['COUNT(*)']; 
                                        }
                                    }
                                    echo $students;
                                ?>
                            </span> 

                            <!----------------------------------------------->
                        </div>
                    </a>
                </div>
                
            <?php endforeach; ?>
            <?php endif; ?>
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
    /************************clear field************************/
    function ClearFields() {
        document.getElementById("find_g").value = "";
    }
    /***********************************************************/

</script>

</body>
</html>
