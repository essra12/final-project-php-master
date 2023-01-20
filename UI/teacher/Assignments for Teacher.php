<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/assigment__.php");


/* $files=selectpostfile(); */

//to get group name
$sql="SELECT g_name FROM groups Where g_no='$group_no';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////
////////////search///////////////
$search="";
if(isset($_POST['search_stu'])){
    if(!empty($_POST['find_stu']))
    {
        $search=$_POST['find_stu'];
        $files=search($search);
    }
}
else{
  $files=selectpostfile(); 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../../css/material.css"> 
      <!-- Stylesheet -->
    <link rel="stylesheet" href="../../css/inside_reports.css" />
    <link rel="stylesheet" href="../../css/BackToTopButton.css"> 
     <!--icon8-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
     <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <title>Assignments</title>
    <style>
     a:link, a:visited{
      text-decoration: none; 
      color:#000}
      h5{
        font-size: 18px;
        color: white;
        margin-left: 9%;
      }
      .search button{
      background-color:#FFBA5F;
      color: #000;
      }
      .search button:hover{
        background-color:#A4D2F0;
    color: #fff;
      }
      #grade{
        
      }
     
    </style>
    
</head>
<body>
 <!--------------------navigation_bar ----------------------->  
 <nav class="navbar">
  <ul class="lift-side">
      <!-------back------>
      <li><div class="back"><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $group_no?>"><i class="las la-arrow-left"></i></a></div></li>
      <!----------------->

      <!-------logo------>
      <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
      <!----------------->
  </ul>
  <div class="navbar-links">
    <ul>
      <!----group name--->
      <li><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $group_no?>"><?php echo $g_name ?></a></li>
      <!----------------->

      <!-----students--->
      <li><a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>"  style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
      <!----------------->

      <!------HOME------>
      <li><a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>" style="font-size: 1.5rem;"><i class="las la-home"></i></a></li>
      <!---------------->

      <!------Logout----->
      <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
      <!----------------->
    </ul>
  </div>
</nav> 
 <!---------------------------------------------------------->
 <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
 <!-------------------- Assignments -------------------------> 

<div class="header-div">
 <h1>Assignments</h1>
 </div>
<!---------------------------------------------------------->
 <main>
 <div class="main-container">
     
 <!-------------------- search ----------------------------->
 
 <form action="" method="POST"  onsubmit="return check_Enter(this)">  
        <!--serch bar-->
        <div class="search">
            <input type="text" value="<?php echo $search;?>" placeholder=" Enter Student ID" id="find_stu" name="find_stu"  onkeypress="return onlyNumberKey(event)" >
            <span class="clear-btn"><i id="clear-btn" class="fa-solid fa-xmark" onclick="ClearFields();"></i></span>
            <button type="submit" name="search_stu">Search</button>  
        </div>
       
  </form>

  <!-- For Errors message-->
  <?php if(count($errors)> 0): ?>
    <div class="msg error" style="color: #D92A2A; margin-bottom: 20px; text-align: center;"> 
        <?php foreach($errors as $error): ?>
        <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php  echo($error); ?></li> 
        <?php endforeach; ?>
    </div> 
  <?php endif; ?> 
    <!------------------------>
    <!-- For Succes -->
    <?php if (isset($_SESSION['message'])): ?>
      <div class="msg success" style="color: #5a9d48; margin-Top: 2em; margin-left:7em;">
          <li style="list-style-type: none;"><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
          <?php
          /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
          unset($_SESSION['message']);
          ?>
      </div>
    <?php endif; ?>
  <!--------------------------------------------------------->   
  <?php if(empty($files)): 
     $files=selectpostfile(); 
  endif;?>
 <?php if(!empty($files)): ?>
 <div class="table-box">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student Id</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Post date</th>
                    <th scope="col">File Title</th>
                    <th scope="col" width="140px" style="text-align:center;">Grade</th>
                    <th scope="col" width="70px"></th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($files as $key => $file):?> 
              <tr>
              <td data-label="stu-id"><?php echo $file['stu_id'] ?></td>

              <td data-label="stu-name"><img src="<?php echo BASE_URL . '/sources/image/' . $file['u_img']; ?>" class="tab-img" style="  width: 30px; height: 30px;border-radius:100%;"><?php echo $file['full_name'] ?></td> 
              <?php $datetime=strtotime($file['Datatime'])?>
              <td data-label=""><?php echo  date("d-m-Y h:i",$datetime)?></td>
              <td data-label=""><?php echo  html_entity_decode(substr($file['title'],0,20). '...');?></td>
              
              <!------------------grade section------------------>
              <?php if(!empty($file['stu_grade'])):?>
                <!-- <td data-label=""><p id="grade" contentEditable="true" maxlength="3" size="1" class="grade"><?php /* echo $file['stu_grade'] */?></p>/<p><?php /* echo $file['grade'] */?></p></td> -->
                <td data-label="grade" class="grade"><?php echo $file['stu_grade']; ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo $file['grade'];?></td>
              <?php endif;
              if(empty($file['stu_grade'])):?>
                <!-- <td data-label=""><p id="grade" contentEditable="true" maxlength="3" size="1" class="grade">--</p>/<p><php/*  echo $file['grade'] */?></p></td> -->
                <td data-label="grade" class="grade">--&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo $file['grade'];?></td>
                <?php endif;?>
              <!-------------------------------------------------->
              <td data-label="open">
                <a  href="../student/download_assignment_for_teacher.php?post_no=<?= $file['p_no']?>&stu_id=<?= $file['stu_id']?>">Open</a>
                <!-- <a  href="" style="text-align:center;" id="edit">Edit</a> -->
              </td>

            </tr>
            <?php endforeach; ?> 
            </tbody>

        </table>
    </div>
 <?php endif;?>
  
 
   
 </div>
</main>
<script>
       /*********************check for entres**********************/
       function check_Enter() {
            const find_stu = document.getElementById("find_stu").value;
            if(find_stu==""){
            alert(" Please enter student ID");
            return false;
            }
        }
        function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)){
            alert(" please enter Just Number");
            return false;
        }
        return true;
        }
        /***********************************************************/
        /************************clear field************************/
        function ClearFields() {

        document.getElementById("find_stu").value = "";
        }
        /***********************************************************/
        input = document.querySelector('#grade');

    settings = {
      maxLen: 3,
    }

    keys = {
      'backspace': 8,
      'shift': 16,
      'ctrl': 17,
      'alt': 18,
      'delete': 46,
      // 'cmd':
      'leftArrow': 37,
      'upArrow': 38,
      'rightArrow': 39,
      'downArrow': 40,
    }

    utils = {
      special: {},
      navigational: {},
      isSpecial(e) {
        return typeof this.special[e.keyCode] !== 'undefined';
      },
      isNavigational(e) {
        return typeof this.navigational[e.keyCode] !== 'undefined';
      }
    }

    utils.special[keys['backspace']] = true;
    utils.special[keys['shift']] = true;
    utils.special[keys['ctrl']] = true;
    utils.special[keys['alt']] = true;
    utils.special[keys['delete']] = true;

    utils.navigational[keys['upArrow']] = true;
    utils.navigational[keys['downArrow']] = true;
    utils.navigational[keys['leftArrow']] = true;
    utils.navigational[keys['rightArrow']] = true;

    input.addEventListener('keydown', function(event) {
      let len = event.target.innerText.trim().length;
      hasSelection = false;
      selection = window.getSelection();
      isSpecial = utils.isSpecial(event);
      isNavigational = utils.isNavigational(event);
      
      if (selection) {
        hasSelection = !!selection.toString();
      }
      
      if (isSpecial || isNavigational) {
        return true;
      }
      
      if (len >= settings.maxLen && !hasSelection) {
        event.preventDefault();
        return false;
      }
      
    });

    /***************grade******************/
   
    /*************************************/
    // Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
 </script> 
 
</body>
</html>

