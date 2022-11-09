<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/teachers.php");
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control_Panel_add_Admin</title>
        <link rel="stylesheet" href="../../css/create_g_tr_admin.css">
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
    
    
    <div class="g_tr_admin-container tr ">

      <form class="g_tr_admin-form">
        <div>
            <h2>Add New Admin</h2>
            <img src="../../sources/image/create group.png" alt="">
        </div>
        <div class="create-g-div">

            <div class="form-field tr ">
               <input id="full_name" class="input-name" type="text"  placeholder="Full Name" maxlength="30"  />
            </div>

            <div class="form-field tr">
                <input id="pass" class="input-name" type="password"  placeholder="Password" maxlength="25"  />
             </div>

             <div class="form-field tr">
                <input id="conf_pass" class="input-name" type="password"  placeholder="Confrim Password" maxlength="25"  />
             </div>

        </div>

          <button class="btn_save" type="submit" onclick="check_Enter()">Save</button>
      </form>

  </div>

</div>

   <!-- check enter -->
   <script>
    function check_Enter() {
    const full_name = document.getElementById("full_name").value;
    const pass = document.getElementById("pass").value;
    const conf_pass = document.getElementById("conf_pass").value;
    if(full_name==""){
        alert(" pleas enter Full name");
        return false;
    }
    if(pass==""){
        alert(" pleas enter Password");
        return false;
    }
    if(conf_pass==""){
        alert(" pleas enter Password again");
        return false;
    }
    }
</script>

</body>
</html>
