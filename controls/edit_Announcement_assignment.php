<?php
include("../../Database/Connection.php");  
global $conn;



if(isset($_GET['textANN']))
{
 echo $textann=$_GET['textANN'];
}else echo "no";

global $conn;
$id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
$id3=$_SESSION['passT'];/** login path كلمة السر غسر مشفرة تم احضارها من  */
$sqln="SELECT * FROM `announcement` WHERE announcement.an_no='$textann'";
/** وتخزينها في متغيرات DB  احضار بيانات من  */                      
$result= mysqli_query($conn,$sqln);
$row =mysqli_fetch_row($result);
  $announcment=$row[1];echo"   ";
  $Datetime=$row[2];echo"   ";
   $dueDate=$row[3];echo"   ";
  $grade=$row[4];echo"   ";
  $gNO=$row[5];echo"   ";

             $_GET['announcment']=$announcment;
               $_GET['Datetime']=$Datetime;
               $_GET['dueDate']=$dueDate;
               $_GET['grade']=$grade;
               $_GET['gNO']= $gNO;

              $_SESSION['announcment']=$_GET['announcment'];
              $_SESSION['Datetime']=$_GET['Datetime'];
              $_SESSION['dueDate']=$_GET['dueDate'];   
              $_SESSION['grade']= $_GET['grade'];
              $_SESSION['gNO']=$_GET['gNO'];

              $Announcment= $_SESSION['announcment'];
              $datatim= $_SESSION['Datetime'];
              $DUEDATE= $_SESSION['dueDate'];
              $GRADE= $_SESSION['grade'];
              $gno=  $_SESSION['gNO'];




              if($_SERVER['REQUEST_METHOD']=='POST')
              { 
                $annou= $_POST['an_content'];/** edit profile  في  id القيمة المدخلة في حقل  */
                $gradee=$_POST['an_grade'];
                $due_date=$_POST['due_date'];  

              
            
                  if(empty($annou)) 
                {   
                    $error="* please enter  Announcment "; 
                }
                else
                {
                /*****************/
                   /** update statment  */
                    $sqln="UPDATE `announcement` SET `an_content`='$annou',`due_date`='$due_date',`grade`='$gradee',`g_no`=14 WHERE announcement.an_no=$textann";
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