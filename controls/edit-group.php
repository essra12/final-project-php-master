<?php
include("../../Database/Connection.php");  
global $conn;
$groupNumber=$_SESSION['g_no'];

/**--------------------------------------Edit Groups in control panal ----------------------- */
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $gname = $_POST['g_id'];/** inpute (name for groups)  الخاص بال name   */ 
            $name=$_POST['tr_id'];/** select  الخاص بال name   */           
            $id=$_GET['id'];/**   الخاص بالمجموعه التي تم الدخول اليها  id  */
           
            if(empty($gname)) 
           {
                array_push($errors," Enter Group  Name");

           }else 
            {
                
              $sqln="  UPDATE  groups,teacher SET groups.g_name='$gname', groups.tr_id='$name'  WHERE
              teacher.tr_id=groups.tr_id and groups.g_no='$id';";
                if(mysqli_query($conn,$sqln)){
                ?>
        <script >  
        window.location.href="groups_control_panel.php" </script>
        <?php
                } else {
                        array_push($errors," chose teacher please");
                }
                }}



      


                
        
        
       
        


?>