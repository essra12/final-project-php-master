<?php
include("../../Database/Connection.php");  
global $conn;
/* UPDATE  groups,teacher SET groups.g_name='java1', groups.tr_id=12201  WHERE
 teacher.tr_id=groups.tr_id and groups.g_name='java';
*/

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $gname = $_POST['g_id'];/** inpute (name for groups)  الخاص بال name   */ 
            $name=$_POST['tr_id'];/** select  الخاص بال name   */           
            $id=$_GET['id'];/**   الخاص بالمجموعه التي تم الدخول اليها  id  */
           
            if($gname != "") 
            {
              $sqln="  UPDATE  groups,teacher SET groups.g_name='$gname', groups.tr_id='$name'  WHERE
              teacher.tr_id=groups.tr_id and groups.g_no='$id';";
                if(mysqli_query($conn,$sqln)){
                echo '<script type="text/javascript">alert("Record updated successfully .")</script>';
                ?>
        <script type="text/javascript">
            
        window.location.href="groups_control_panel.php" </script>
        <?php
                } else {
                echo "Error updating record: " . mysqli_error($conn);
                }
                }}



      


                
        
        
       
        


?>