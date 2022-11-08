<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/teachers.php");
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control_Panel_create_group</title>
        <link rel="stylesheet" href="../../css/create_group _tr_admin.css">
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
    
    
    <div class="g_tr_admin-container">

        <form class="g_tr_admin-form">
            <div>
                <h2>Create Group</h2>
                <img src="../../sources/image/create group.png" alt="">
            </div>
            <div class="create-g-div">
                <div class="form-field ">
                    <input id="name" class="input-name" type="text"  placeholder="Group Name" />
                </div>

                <div class="form-field ">
                    <?php 
                        global $conn;
                        $sql="SELECT user.full_name,teacher.tr_id from user,teacher  where user.user_id=teacher.user_id;";
                        $pre = $conn->prepare($sql);
                        $pre->execute();
                        $items = $pre->get_result()->fetch_all(MYSQLI_ASSOC);
                    ?>
                    <select class="select-t">
                        <?php foreach($items as $item): ?>
                            <option value="<?= $item['tr_id']; ?>"><?= $item['full_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <button type="submit" onclick="check_Enter()">Save</button>
        </form>

    </div>

</div>

   <!-- check enter -->
   <script>
    function check_Enter() {
    const NAME = document.getElementById("name").value;
    if(NAME==""){
    alert(" pleas enter Group-name");
    return false
    }
    }
</script>

</body>
</html>
