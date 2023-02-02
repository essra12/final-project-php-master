<?php
include("../../path.php");  
include(MAIN_PATH."/controls/download_materials.php");

$table="file";
$files=selectAll($table,['p_no'=>$_GET['post_no']]);

////////////////////
$groupNumber=$_SESSION['g_no'];
//to get group name
$sql="SELECT g_name FROM groups Where g_no='$groupNumber';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////
////////////////////

?>
<html>
    <head>
   
        <meta charset="UTF-8">
        <!--for logo-->
        <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Materials</title>
        <link rel="stylesheet" href="../../css/add_materiial_assignment_join_dw.css">
        <link rel="stylesheet" href="../../css/BackToTopButton.css">
          <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!--file icon-->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/> 
        <!-- to add a library -->
	      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">  
        <style>
     
     .header-div{background-color: #fff;}

     .dropdown{
         display:inline-block;
         position:relative;
     }
     .dropdown div{
         background-color:#fff;
         box-shadow:0 4px 8px rgba(0,0,0,0.2);
         z-index:1;
         visibility:hidden;
         position:absolute;
         min-width:100%;
         opacity:0;
         transition:.3s;
     }
     .dropdown:hover div{
         visibility:visible;
         opacity:1;
     }
     .dropdown div a{
         display:block;
         text-decoration:none;
         padding:8px;
         color:#000;
         transition:.1s;
         white-space:nowrap;
         margin-left:0px;
     }
     .dropdown div a:hover{
         background-color:#222242;
         color:#fff;
     }
     .main-container{
        margin: 25px 250px;
        }
        tr{
    border-left: 5px solid #222242;
    border-radius: 5px; 
  }
  

 </style>  
    </head>

    <body>
<!------------Navigation Bar ----------->  
<nav class="navbar">
      <ul class="lift-side">
          <!-------back------>
          <li><div class="back"><a href="../student/materials.php"><i class="las la-arrow-left"></i></a></div></li>
          <!----------------->

          <!-------logo------>
          <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
          <!----------------->

      </ul>
      <div class="navbar-links">
        <ul>
          <!----group name--->
          <li><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $groupNumber?>" style="padding-top:.5rem;"><?php echo $g_name ?></a></li>
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
    <!------------------------------------>
     <!---------------------------------------------------------->
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
      <!-- For Succes -->
      <?php if (isset($_SESSION['message'])): ?>
                <div class="msg success" style="color: #5a9d48; margin-Top: 2em; margin-left:7em;">
                    <li><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
                    <?php
                    /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
                    unset($_SESSION['message']);
                    ?>
                </div>
              <?php endif; ?>
    <!----------------->
      <!-- For unSucces -->
      <?php if (isset($_SESSION['error_message'])): ?>
                <div class="msg success" style="color: #D92A2A; margin-Top: 2em; margin-left:7em;">
                    <li><i class="las la-exclamation-circle" style="color: #D92A2A ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['error_message']; ?></li>
                    <?php
                    /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
                    unset($_SESSION['error_message']);
                    ?>
                </div>
              <?php endif; ?>
    <!----------------->
        
           <!--------main-container----------->
      <div class="main-container">
        <div class="title">
            <h1 style="margin-bottom: 25px;">Dwonload Materials</h1>
        </div>

        <form  >
            
          <!-- title field -->
          <div class="inputs title">
            <label >Title</label>
            <label style=" font-weight: normal;font-size: 16px; padding-top:10px;" ><?php echo $title?></label>
          </div>
          <!------------------>
          
          <!-- description field -->
          <?php if(!empty($des)):?>
          <div class="inputs description">
            <label >Description</label>
            <label style=" font-weight: normal;font-size: 16px; padding-top:10px;"><?php echo $des?></label>
          </div>
          <?php endif;?>
          <!------------------>

          <!-- attach field -->
          <div class="inputs attach">
            <label >Learning Resources</label>
                <div class="container_wrapper">
                <div class="wrapper">
                <table class="row">
                <tbody>
                <?php foreach($files as $key => $file):?>
                <tr>
                <!-- <td><i class="fa-solid fa-file-lines" id="icon3"></i></td> -->
                <td><img src="../../sources/image/google-docs.png" style="width: 50px;   padding-right: 10px;" /></td>
                <td id="file"><?php echo $file["f_name"];?></td>
                <td></td>
                <td class="td2"><a href="download.php?file=<?php echo $file['f_no'];?>"><i id="icon1" class="fa fa-download"></i></a></td>
                <!--making the delete just for teacher-->
                <?php if($role=="teacher"):?>
                <td class="td2"><a href="download.php?delete=<?php echo $file['f_no'];?>&post_no=<?php echo $file['p_no'];?>" onclick="return confirmDelete()"><i id="icon2" class="fa-solid fa-xmark"></i></a></td>
               </tr>
               <?php endif;?>
              <?php endforeach;?>
             </tbody>
             </table>
            </div>
         
          </div>
          <!------------------>

        </form>

      
      
      <!------------------------------------>
      <script>
    function confirmDelete() {
    if (confirm("Are you sure you want to delete ?")) {
        return true;
    } 
    else {
        return false;
    }
}
/***************************************************************/
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