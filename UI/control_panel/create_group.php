<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/groups.php");
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control_Panel_create_group</title>
        <link rel="stylesheet" href="../../css/create_group_teacher_admin.css">
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
<div class="main-content group">
    
    
    <div class="g_tr_admin-container group" >

        <form action="create_group.php" name="groups" class="g_tr_admin-form" method="POST" onsubmit="return check_Enter(this)">
        
        <div class="img_title">
            <h2 class="group_title">Create New Group</h2>

            <div class="create-g-div">

                <!-- group name field -->
                <div class="form-field ">
                    <input id="name" name="g_name" class="input-name" type="text"  placeholder="Group Name" value="<?php echo $g_name;?>"  />
                </div>
                <!---------------------->

                <!-- Select Dropdown List -->
                <div class="form-field ">
                    <?php 
                        global $conn;
                        $sql="SELECT user.full_name,teacher.tr_id from user,teacher  where user.user_id=teacher.user_id;";
                        $pre = $conn->prepare($sql);
                        $pre->execute();
                        $items = $pre->get_result()->fetch_all(MYSQLI_ASSOC);
                    ?>
                    <select class="select-t" name="tr_id">
                        <option value=""></option>

                        <?php foreach($items as $key => $item):?>
                            <?php if(!empty($tr_id) && $tr_id==$item['tr_id']):?>
                                <option selected value="<?php echo $item['tr_id'] ?>"><?php echo $item['full_name'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $item['tr_id'] ?>"><?php echo $item['full_name'] ?></option>
                            <?php endif;?>
                        <?php endforeach; ?>   
                        
                    </select>
                </div>
                <!----------------------------->

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

            <button type="submit"  name="create_group" >Save</button> 
        </form>

    </div>

</div>

 

   <script>
    
    /****************************************  check enter ********************************************/
    function check_Enter(form) {
    const NAME = document.getElementById("name").value;
    var tr_id = document.groups.tr_id.value;
    if(NAME==""){
        alert(" pleas enter Group-name");
        return false;
    }
    if(tr_id==""){
        alert(" pleas Choese Teacher Name");
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
