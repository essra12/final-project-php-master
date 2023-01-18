<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/groups.php");
include("../../controls/edit__group__fot__teacher.php"); 
$nameg=$_GET['name-g'];
$gno=$_GET['gno'];
$trid=$_GET['trID'];


$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];
$groupNumber=$_SESSION['g_no'];
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
    <style>
 
.navbar {
    display: flex;
    position: relative;
    justify-content: space-between;
    align-items: center;
    background-color: #222242;
    box-shadow: var(--shadow2);
    color: white;
}

ul{
    display: flex;
    margin: 0;
    padding: 0;
}

.lift-side li{
    display: block;
    text-decoration: none;
    color: white;
    padding-right: 1rem;
    margin: auto;
}

.lift-side li a {
    display: block;
    text-decoration: none;
    color: white;
    padding: 1rem;
}

.back{
    display: inline;
    margin-right: 0;
}

.back i{
    margin-left: .5rem;
    font-size: 2.2rem;
}

.brand-title {
    font-size: 1.5rem;
    margin: .5rem;
    margin-left: 0;
}

.navbar-links {
    height: 100%;
}
/******Notification*******/

.notification {
    color: white;
    text-decoration: none;
    position: relative;
    display: inline-block;
  }
  
  .notification .badge {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 1px 6px;
    border-radius: 50%;
    background: var(--orange);
    color: var(--vdarkblue);
    font-size: .7rem;
  }
/************************/
.navbar-links ul {
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar-links li {
    list-style: none;
}

.navbar-links li a {
    display: block;
    text-decoration: none;
    color: white;
    padding: 1rem;
}

.navbar-links li:hover {
    font-weight: bold;
    font-size: 18px;
}

.navbar-links li:hover i{
    font-weight: bold;
    font-size: 1.7rem;
}

a:is(:link,:active,:hover).active{
    font-weight: bold;
    font-size: 18px;
}
 
form .form-field:nth-child(2)::before {
    background-image: url(https://img.icons8.com/pastel-glyph/512/groups.png);
    width: 28px;
    height: 28px;
    top:0.4em;
    left: 27%;
}
.g_tr_admin-container group{
border: 2px solid red;
}
.g_tr_admin-containerr {
    width              : 50%;
    position:             absolute;
    left:                  50%;
    transform:translate(-50%);
    height:              64vh;
    padding            : 50px 50px;
    background-position: center;
    background-repeat  : no-repeat;
    border-radius      : 15px;
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    text-align: center;
    border: 2px solid white;
    background-color: white;
    margin-top: 5%;
}
.g_tr_admin-form{
    height: 60vh;
}
.group_titlee{
    margin-top: 4%;
    margin-bottom: 7%;
}
@media only screen and (max-width:720px) {
    .g_tr_admin-containerr {
        width              : 70%;
    }
    .input-name{
        font-size: 16px;
        padding-right: 3%;
    }

}   
@media only screen and (max-width:1200px) {
    .g_tr_admin-containerr {
        width              : 70%;
    }
    .input-name{
        font-size: 16px;
        padding-right: 3%;
    }

}    
@media only screen and (max-width:670px) {

    .g_tr_admin-containerr {
        width              : 70%;
    }
    .input-name{
        font-size: 16px;
        padding-right: 3%;
    }
} 

@media only screen and (max-width:564px) {
    .g_tr_admin-containerr {
        width              : 70%;
    }
    .input-name{
        font-size: 16px;
        padding-right: 5%;
    }
 
} 

    </style>
    </head>

<body>

<!-- menu -->
<!--------------------navigation_bar ----------------------->  
<nav class="navbar">
  <ul class="lift-side">
      <!-------back------>
      <li><div class="back"><a href="../group/main page for group.php"><i class="las la-arrow-left"></i></a></div></li>
      <!----------------->

      <!-------logo------>
      <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
      <!----------------->
  </ul>
  <div class="navbar-links">
    <ul>

     
      <!------HOME------>
      <li><a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>" style="font-size: 1.5rem;"><i class="las la-home"></i></a></li>
      <!---------------->

      <!------Logout----->
      <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
      <!----------------->
    </ul>
  </div>
</nav> 
<!-------------------------------  main content --------------------------------
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------->
<div class="main-content group">
    <div class="g_tr_admin-containerr group" >
        <form  class="g_tr_admin-form" method="POST" onsubmit="return check_Enter(this)">
        <?php
        ?>
        <div class="img_titlee">
            <h2 class="group_titlee">Edite Group</h2>
            <div class="create-g-divv">

                <div class="form-field ">
                    <input id="name" name="t__name" class="input-name" type="text"  placeholder="Group Name" value="<?php echo  $username;?>"  readonly  />
                </div>
                
                <div class="form-field group ">
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
