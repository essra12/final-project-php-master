

<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/teachers.php"); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Control_Panel_Groups</title>
        <link rel="stylesheet" href="../../css/group_tr_stu_file_control_panel.css">
        <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>

        <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

    <style>
        /* create admin form*/
        body{
            background-color: #A4D2F0;
        }


        .create-g-div{
        background-color: white;
        width: 50%;
        height: 90vh;
        border-radius: 15px;
        display: inline-block;
        position: absolute;
        left: 70%;
        top: 5%;
        transform: translate(-70%); 
        text-align: center;
        }
        .lable-create{
        
        position: absolute;
        top: 10%;
        left: 50%;
        transform: translate(-50%);
        font-size: 30px;
        
        }
        
        .img-greate{
        
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%);
        font-size: 30px; 
        width: 25%;
        height: 20%;
        
        }
        
        #user-iocn{
            position:absolute;
            top: 54.5%;
            left: 33%;
        }
        
        .input-name{
            position:absolute;
            top: 53%;
            left: 27%;
            border-radius: 25px  ; 
            padding-left: 9%;
            height: 5%;   
            width: 47%;
            margin-left: 1%;
        }
        
        
        #user-iocn1{
            position:absolute;
            top: 64%;
            left: 33%;
        }
        
        .select-t{
            position:absolute;
            top: 63%;
            left: 27%;
            border-radius: 25px; 
            padding-left: 9%;
            height: 5%;   
            width: 47%;
            margin-left: 1%;
            border-color: #222242;
        
        }
        .bt-save{
            position:absolute;
            top: 73%;
            left: 27%;
            width: 50%;
            background-color: #222242;
            height: 7%;
            color: white;
            border-radius: 25px;
        }
        .bt-save:hover{
            box-shadow: 4px 4px 4px rgb(135, 134, 134); 
        
        }
        .div-admin-footer{
        background-color: #bababa;
        width: 70%;
        height: 15vh;
        position: absolute;
        bottom: 2%;
        left: 15%;
        border-radius: 15px;
        }
        .img-ad-footer{
            width: 40%;
            height: 20%;
            position: absolute;
            bottom: 8%;
            left: 30%;
           
        }
        
        .bt-admin{
        position: absolute;
        left:  50%;
        transform: translate(-50%);
        bottom: 5%;
        border-radius: 15px;
        background-color: #A4D2F0;
        border: none;
        height: 30%;
        width: 40%;
        text-align: center;
        }
        /**media when  max-width:830px */
        
        @media(max-width:830px)
        {
        
        
        .img-greate{
            width: 29%;
           
        }
        .lable-create{
            font-size: 25px;
        }
        .create-g-div{
            width: 70%;
        }
        }
        
        

    </style>

<body  class="b-white">

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
    

 


    <main>
        <!-- GREATE GROUPS -->
       
               <!-- GREATE GROUPS -->
               <div class="create-g-div">
                <label class="lable-create">Greate Group </label>
                <img class="img-greate" src="../../sources/image/create group.png"/>

                <input id="name" class="input-name" type="text"  placeholder="Group Name"/>
                <i id="user-iocn" class="fa-solid fa-user-group"></i>

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

                <i  id="user-iocn1" class="fa-solid fa-user"></i>

                <input class="bt-save" type="button" value="Save" onclick="check_Enter()" />
         </div>

  


    </main>

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

