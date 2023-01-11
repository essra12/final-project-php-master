<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/groups.php");
include("../../controls/edit__group__fot__teacher.php"); 
$nameg=$_GET['name-g'];
$gno=$_GET['gno'];
$trid=$_GET['trID'];


$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];
echo $groupNumber=$_SESSION['g_no'];
////////////////////

//to get group name
$sql="SELECT g_name FROM groups Where g_no='$groupNumber';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////
//to get user name
$sql="SELECT full_name,u_img FROM user Where user_id='$user_id';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $username=$row["full_name"];
      $img=$row["u_img"];
    }
}
 if($role==""):
/*to get user id from user -> student*/
$sql="SELECT stu_id FROM user,student Where user.user_id=student.user_id AND user.user_id='$user_id';";
$result= $conn->query($sql);
if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
      $stu_id=$row["stu_id"];
    
    }
}
endif;
/////////////////////////////////
if($role=="teacher"):
    /*to get user id from user -> student*/
    $sql="SELECT tr_id FROM user,teacher Where user.user_id=teacher.user_id AND user.user_id='$user_id';";
    $result= $conn->query($sql);
    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
          $stu_id=$row["tr_id"];
        
        }
    }
    endif;
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Edite Group</title>
        <!--for logo-->
        <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
        <!--stylesheet-->
        <link rel="stylesheet" href="../../css/add_group_teacher_admin.css">
        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

<body id="b-vlightblue">

<!-- menu -->

 <!----------------side bar------------------->
 <input type="checkbox" name="" id="menu-toggle">

<div class="overlay">
    <label for="menu-toggle">
        <span class="las la-cance" style="color:#222242;"></span>
    </label>
</div>

<div class="sidebar">

    <div class="sidebar-container">
       
      <!----------------back button and logo------------------->  
      <ul class="lift-side" id="lift-side">
      <!-------back------>
      <li><div class="back"><a href="../group/main page for group.php"><i class="las la-arrow-left"></i></a></div></li>
      <!----------------->

      <!-------logo------>
      <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
      <!----------------->
      </ul>
   

        <!--menu profile photo -->
        <div class="sidebar-avartar" style="margin-top:20px">
        <?php if($role==""):?>
        <div>
                <a href="..\student\student-profile.php" alt="" style="width: 70px; height:70px ;"><img src="<?php echo BASE_URL . '/sources/image/'.$img  ?>" alt=" " style="width: 70px; height:70px ;"></img></a>
            </div>
            <?php endif;?>
            <?php if($role=="teacher"):?>
            <div>
                <a href="..\teacher\profile teacher.php" alt="" style="width: 70px; height:70px ;"><img src="<?php echo BASE_URL . '/sources/image/'.$img  ?>" alt=" " style="width: 70px; height:70px ;"></img></a>
            </div>
            <?php endif;?>

            <div class="avartar-info">
                <div class="avartar-text">
                    <h4><?php echo $username;?></h4>
                    <p>Id : <?php echo $stu_id;?> </p>
                </div>
            </div>
        </div>

        <!-- menu items -->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="#">
                        <span style="font-size:20px;"><?php echo "" ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>">
                        <span class="las la-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>">
                        <span class="las la-user-friends"></span>
                        <span>Student</span>
                    </a>
                </li>     
                <li>
                    <a href="#">
                        <span class="las la-bell"></span>
                        <span>Notifications</span>
                    </a>
                </li>                
                <li>
                <a href="..\..\logout.php">
                    <span class="las la-sign-out-alt" style="color:#FFBA5F;"></span>
                    <span style="color:#FFBA5F;">LogOut</span>
                </a>
            </ul>
        </div>
    <!--*************************************************************************** -->
    <?php if($role==""):?>
    <!--leave button -->
       <div class="sidebar-card-btn">
        <form action="inside_group.php" method="POST">
        <input  class="btn btn-admin" type="button" value="Leave" name="leave" onclick="return confirmDelete()"> 
        </form>
         </div>
    <?php endif;?>
    <!--*************************************************************************** -->
</div>
</div>
<header class="main_icon">
    <div class="header-title">
        <label for="menu-toggle">
            <span class="las la-bars"></span>
        </label>
    </div>
</header>
<!----------------End side bar------------------->
<!----------------------------------------------------------------------------------------------->

<header class="main_icon">
    <div class="header-title">
        <label for="menu-toggle">
            <span class="las la-bars"></span>
        </label>
    </div>
</header>
<!-------------------------------  main content --------------------------------
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------->
<div class="main-content group">
    <div class="g_tr_admin-container group" >
        <form  class="g_tr_admin-form" method="POST" onsubmit="return check_Enter(this)">
        <?php
        ?>
        <div class="img_title">
            <h2 class="group_title">Edite Group</h2>
            <div class="create-g-div">

                <div class="form-field ">
                    <input id="name" name="t__name" class="input-name" type="text"  placeholder="Group Name" value="<?php echo  $username;?>"   />
                    <input id="name" name="g__name" class="input-name" type="text"  placeholder="Group Name" value="<?php echo  $nameg;?>"  />
                </div>
            </div>
            <!-- For Errors -->
            <?php if(count($errors)> 0): ?>
                    <div class="msg error" style="color: #D92A2A; margin-bottom: 20px;"> 
                     <?php foreach($errors as $error): ?>
                        <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                     <?php endforeach; ?>
                    </div> 
            <?php endif; ?> 
            <!----------------->
            <!-- For Succes -->
            <?php if (isset($_SESSION['message'])): ?>
                <div class="msg success" style="color: #5a9d48; margin-bottom: 20px;">
                    <li><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
                    <?php
                    /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
                    unset($_SESSION['message']);
                    ?>
                </div>
              <?php endif; ?>
             <!----------------->
            <button type="submit" onclick="return confirmDelete()"  name="saveedit" >Save</button> 
</form>
</div>
</div>


   <script>

    
    /***************************for show emphasis *************************/
    function confirmDelete() {
    if (confirm("Are you sure you want to Update ?")) {
        return true;
    } 
    else {
        return false;
    }}
    
    /****************************************  check enter ********************************************/
      /****************************************  check enter ********************************************/
      function check_Enter(form) {
    const NAME = document.getElementById("name").value;
    var tr_id = document.groups.tr_id.value;
    if(tr_id==""){
        /* alert(" pleas Choese Teacher Name"); */
        document.getElementById("demo").innerHTML = "<i class='las la-exclamation-circle'></i>&nbsp;&nbsp;pleas Choese Teacher Name."; 
        return false;
    }
    } 

    /********************************************* for sidebar items  *********************************/
        const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('.sidebar-menu a').forEach(link => {
    if(link.href.includes(`${activePage}`)){
        link.classList.add('active');
        console.log(link);
    }
    })

    /********************************************* circular image *********************************/
    const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');

    //if user hover on img div 

    imgDiv.addEventListener('mouseenter', function(){
        uploadBtn.style.display = "block";
    });

    //if we hover out from img div

    imgDiv.addEventListener('mouseleave', function(){
        uploadBtn.style.display = "none";
    });

    //lets work for image showing functionality when we choose an image to upload

    //when we choose a foto to upload

    file.addEventListener('change', function(){
        //this refers to file
        const choosedFile = this.files[0];

        if (choosedFile) {

            const reader = new FileReader(); //FileReader is a predefined function of JS

            reader.addEventListener('load', function(){
                img.setAttribute('src', reader.result);
            });

            reader.readAsDataURL(choosedFile);

            //Allright is done

            //please like the video
            //comment if have any issue related to vide & also rate my work in comment section

            //And aslo please subscribe for more tutorial like this

            //thanks for watching
        }
    });
</script>

</body>
</html>
