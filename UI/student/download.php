<?php
include("../../path.php");  

include(MAIN_PATH."/controls/materials_and_Assignments.php");

$table="file";
$files=selectAll($table,['p_no'=>$_GET['post_no']]);
?>
<html>
    <head>
   
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Materials</title>
        <link rel="stylesheet" href="../../css/add_material_assignment_join_page.css">
          <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!--file icon-->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>     
    </head>

    <body>
  <!--------------------navigation_bar ----------------------->  
 <?php include(MAIN_PATH."/common/navigation.php"); ?> 
 <!---------------------------------------------------------->

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
            <h1 style="color: #222242;">Materials</h1>
        </div>

        <form  >
            
          <!-- title field -->
          <div class="inputs title">
            <label style="color: #222242;">Title</label>
            <label style=" font-weight: normal;font-size: 20px; padding-top:20px;" ><?php echo $title?></label>
          </div>
          <!------------------>
          
          <!-- description field -->
          <div class="inputs description">
            <label style="color: #222242;">Description</label>
            <label style=" font-weight: normal;font-size: 20px; padding-top:20px;"><?php echo $des?></label>
          </div>
          <!------------------>

          <!-- attach field -->
          <div class="inputs attach">
            <label style="color: #222242;">Files</label>
                <div class="container_wrapper">
                <div class="wrapper">
                <table class="row">
                <tbody>
                <?php foreach($files as $key => $file):?>
                <tr>
                <td><i class="fa-solid fa-file-lines" id="icon3"></i></td>
                <td id="file"><?php echo $file["f_name"];?></td>
                <td></td>
                <td class="td2"><a href="download.php?file=<?php echo $file['f_no'];?>"><i id="icon1" class="fa fa-download"></i></a></td>
                <!--making the delete just for teacher-->
                <?php if($role=="teacher"):?>
                <td class="td2"><a href="download.php?delete=<?php echo $file['f_no'];?>" onclick="return confirmDelete()"><i id="icon2" class="fa-solid fa-xmark"></i></a></td>
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
  </script>
</body>
</html>