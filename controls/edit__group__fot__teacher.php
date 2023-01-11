
<?php
include("../../Database/Connection.php");  
global $conn;
echo $gno=$_GET['gno'];
$nameg=$_GET['name-g'];
echo $trid=$_GET['trID'];
$exisiting_group="";
$errors = array();
$table1='groups';
/**---------------Edit group in main page for teacher ------------------------------- */

if(isset($_POST['saveedit']))
        {
            $tname = $_POST['t__name'];/** inpute (name for groups)  الخاص بال name   */ 
            $gname=$_POST['g__name'];/** select  الخاص بال name   */           
            $gno=$_GET['gno'];
            $trid=$_GET['trID'];
            if(empty($gname)) 
            {
                array_push($errors," Enter Group  Name");
            } 
   /* $exisiting_group = selectOne($table,['g__name'=>$_POST['g__name'],'tr_id'=>$trid]);
     if($exisiting_group)
     {
         array_push($errors," This Group alredy exists");
           
     }*/
            else
            {
              $sqln="UPDATE groups,teacher SET groups.g_name='$gname' WHERE
              teacher.tr_id=groups.tr_id and groups.g_no='$gno';";
              /*
              $sqln="UPDATE groups,teacher,user SET groups.g_name='$gname',user.full_name='$tname' WHERE user.user_id=teacher.user_id and 
              teacher.tr_id=groups.tr_id and groups.g_no=$groupNumber;";*/
                if(mysqli_query($conn,$sqln)){
                ?>
        <script >  
        window.location.href="../group/main page for group.php" </script>
          <?php
                } else {
                echo "Error updating record: " . mysqli_error($conn);
                }
                }}


                ?>