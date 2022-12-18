<?php
include("../../path.php");  
/* include(MAIN_PATH. "/database/db.php"); */
 include(MAIN_PATH."/controls/download_Assignments.php"); 
$stu_id=$_SESSION['stu_id'];
$table="file";
$files=selectAll($table,['p_no'=>$_GET['post_no']]);

?>
<html>
    <head>
   
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Assignment</title>
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

    
        
        <!--------main-container----------->
      <div class="main-container">
        <div class="title">
            <h1 style="color: #222242;">Assignment</h1>
        </div>

        <form  >

           <!-- Id field -->
           <div class="inputs id">
            <label style="color: #222242;">Student ID</label>
            <input type="text" name="stu_id" maxlength="11" disabled="disabled" style=" border: none;" value=<?php echo $stu_id?>>
          </div>
          <!------------------>
            
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
                <td class="td2"><a href="download_assignment.php?file=<?php echo $file['f_no'];?>"><i id="icon1" class="fa fa-download"></i></a></td>
                <!--making the delete just for teacher-->
                <?php if($role=="teacher"):?>
                <td class="td2"><a href="download_assignment.php?delete=<?php echo $file['f_no'];?>" onclick="return confirmDelete()"><i id="icon2" class="fa-solid fa-xmark"></i></a></td>
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