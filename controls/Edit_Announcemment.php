<?php
include("../../Database/Connection.php");  
global $conn;

if(isset($_GET['textANN']))
{
   $textann=$_GET['textANN'];/**   a_no  */
}else echo "no";

global $conn;

$sqln="SELECT announcement.an_content ,announcement.g_no FROM `announcement` WHERE announcement.an_no=$textann";
/** وتخزينها في متغيرات DB  احضار بيانات من  */                      
$result= mysqli_query($conn,$sqln);
$row =mysqli_fetch_row($result);
$announcment=$row[0];
$gNO=$row[1];

              $_GET['announcment']=$announcment;
              $_GET['gNO']= $gNO;

              $_SESSION['announcment']=$_GET['announcment'];
              $_SESSION['gNO']=$_GET['gNO'];

              $announcment= $_SESSION['announcment'];
              $gno=$_SESSION['gNO'];



              if($_SERVER['REQUEST_METHOD']=='POST')
              { 
                $annou= $_POST['an_content'];/** text القيمة المدخلة في حقل  */
                  if(empty($annou)) 
                {   
                    $error="* please enter  Announcment  ";
                }
                else
                {
                /*****************/
                   /** update statment  */
                     $sqln="UPDATE announcement SET announcement.an_content='$annou' WHERE  announcement.g_no='$gno' and  announcement.an_no='$textann';";
                    if(mysqli_query($conn,$sqln)){
                    echo '<script type="text/javascript">alert("Record updated successfully  $annou.")</script>';
                    ?>
                    <script type="text/javascript">
                    window.location.href="../teacher/Announcement.php." </script>
                    <?php 
                    } else {
                    echo "Error updating record: " . mysqli_error($conn);
                    }
              }}
              

?>