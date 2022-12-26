<?php
include("../../Database/Connection.php");  
global $conn;

/**get عن طريق Announcment.php من صفحة  an_no  احضار  */
if(isset($_GET['textANN']))
{
 $textann=$_GET['textANN'];
}else echo "no";


global $conn;
$sqln="SELECT announcement.an_content ,announcement.g_no FROM `announcement` WHERE announcement.an_no='$textann'";
/** وتخزينها في متغيرات DB  احضار بيانات من  */                      
$result=mysqli_query($conn,$sqln);
$row=mysqli_fetch_row($result);
$announcment=$row[0];
$gNO=$row[1];
              $_GET['announcment']=$announcment;
              $_GET['gNO']= $gNO;

              $_SESSION['announcment']=$_GET['announcment'];
              $_SESSION['gNO']=$_GET['gNO'];

              $announcment= $_SESSION['announcment'];
              $gno=$_SESSION['gNO'];

             /** الوقت و التاريخ الحالي  */
date_default_timezone_set('libya');
$date = date ('Y-m-d H:i:s');

               /**edit  تنفيذ امر التعديل عند الضغط علي  */
if(isset($_POST['edit_announcement']))
{ 
$annou= $_POST['an_content'];/** text القيمة الجديدةالمدخلة في حقل  */
if(empty($annou)) 
{   
$error="* please enter  Announcment  ";
}
else
{
  /*****************/               
  /** update statment  */
  /*  $sqln="UPDATE announcement SET announcement.an_content='$annou' WHERE  announcement.g_no='$gno' and  announcement.an_no='$textann';";*/
  /*  $sqln= "UPDATE `announcement` SET `an_content`='$annou',`an_Datetime`='$date',announcement.g_no='$gno' ,announcement.an_no='$textann' WHERE announcement.an_no='$textann' and announcement.g_no='$gno'";*/
     $sqln="UPDATE `announcement` SET `an_content`='$annou',`an_Datetime`='$date',announcement.g_no='$gno' WHERE announcement.an_no='$textann';"; 
       if(mysqli_query($conn,$sqln)){
        echo '<script type="text/javascript">alert("Record updated successfully .")</script>';
        ?>
        <script type="text/javascript">
         window.location.href="../teacher/Announcement.php." </script>
         <?php 
          } else {
          echo "Error updating record: " . mysqli_error($conn);
           }
}}
?>