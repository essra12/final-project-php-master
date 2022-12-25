<?php
include("../../Database/Connection.php");  
global $conn;

if(isset($_GET['textANN']))
{
  $textann=$_GET['textANN'];
}else echo "no";

global $conn;
$id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
$id3=$_SESSION['passT'];/** login path كلمة السر غسر مشفرة تم احضارها من  */
$sqln="SELECT announcement.an_content ,announcement.g_no FROM `announcement` WHERE announcement.an_no=";
/** وتخزينها في متغيرات DB  احضار بيانات من  */                      
$result= mysqli_query($conn,$sqln);
$row =mysqli_fetch_row($result);
$announcment=$row[0];
$gNO=$row[1];echo"   ";



              $_GET['announcment']=$announcment;
              $_GET['gNO']= $gNO;


              $_SESSION['announcment']=$_GET['announcment'];
              $_SESSION['gNO']=$_GET['gNO'];


              $Announcment= $_SESSION['announcment'];
              $gno=$_SESSION['gNO'];





              if($_SERVER['REQUEST_METHOD']=='POST')
              { 
                $annou= $_POST['an_content'];/** edit profile  في  id القيمة المدخلة في حقل  */
               
              
            
                  if(empty($annou)) 
                {   
                    $error="* please enter  Announcment "; 
                }
                else
                {
                /*****************/
                   /** update statment  */
                    $sqln="UPDATE `announcement` SET  announcement.an_content='$annou' WHERE announcement.an_no=3 and announcement.g_no='$gno';";
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