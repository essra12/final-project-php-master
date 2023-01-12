
<?php
$_SESSION['pass4'];
/**-------------------------------------------------Student ----------------------------------------
 * ---------------------------------------------------------------------------------------------------
 * --------------------------------------------------------------------------------- */
function stprofileimg(){
                        global $conn;
                      /*  $name=$_SESSION['full_name'];*/
                        $id=$_SESSION['user_id'];
                        $sql="SELECT USER.* ,student.stu_id,student.stu_specialization 
                        FROM user,student
                        WHERE user.user_id=student.user_id and user.user_id='".$id."';";
                        $result= mysqli_query($conn,$sql);
                        $row =mysqli_fetch_row($result);
                        $img=$row[3];
                        echo " <img class='photo' src='../../sources/image/$img' /> ";    
                        
}               
                      function informationstudent(){  
                        global $conn;
                         /* $name=$_SESSION['full_name'];*/
                        $id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
                        $id3=$_SESSION['pass4'];/** login path كلمة السر غسر مشفرة تم احضارها من  */
                       $sql="SELECT USER.* ,student.stu_id,student.stu_specialization 
                       FROM user,student
                       WHERE user.user_id=student.user_id and user.user_id='".$id."';";
                       $result= mysqli_query($conn,$sql);
                       $row =mysqli_fetch_row($result);
                       $id=$row[5];
                       $name=$row[1];
                       $spe=$row[6];
                       $pass=$row[2];
                       $img=$row[3];
                     echo"  <label class='LabelID' style='margin-left: 30%;'>&nbsp&nbsp&nbspID <br>$id</label>";
                     echo"   <label class='stname' >$name</label>";
                     echo"   <label class='stspe' >$spe</label>";
      
                     $_GET['id']=$id;           
                     $_GET['name']=$name;
                     $_GET['spe']=$spe;
                     $_GET['password']=$pass;/**كلمة مرور مشفرة */
                     $_GET['password1']=$id3;/**كلمة مرور غير مشفرة  */
                     $_GET['img']= $img;
      
                      
                    $_SESSION['id']=$_GET['id'];
                    $_SESSION['name']=$_GET['name'];
                    $_SESSION['spe']=$_GET['spe'];
                    $_SESSION['pass']=$_GET['password']; 
                    $_SESSION['pass2']= $_GET['password1'];
                    $_SESSION['img1']=$_GET['img'];
                }
                function countgroupandassinament(){
                  global $conn;
                  $user_id=$_SESSION['user_id'];
                  $sql="SELECT stu_id FROM user,student Where user.user_id=student.user_id AND user.user_id='$user_id';";
                 $result_stu_id = $conn->query($sql);
                 if ($result_stu_id->num_rows == 1) {
                  while($row = $result_stu_id->fetch_assoc()) {
                  $stu_id=$row["stu_id"];
    
                   }
                   }
                  $query="SELECT COUNT(student_group.g_no)  FROM student_group WHERE student_group.stu_id='$stu_id' ";
                   $result = $conn->query($query);
                   if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                  $idq=$row['COUNT(student_group.g_no)'];}}
                  echo"  <label class='Lablegroup'>Groups<br>&nbsp&nbsp&nbsp&nbsp&nbsp$idq</label>";
                 /** الاستعلام عن عدد الفروض الذي قام بإرسالها  الطالب  */
                  $sqlass="SELECT COUNT(post.p_no) from student_group,post,file WHERE student_group.stu_group=post.stu_group and post.p_no=file.p_no and student_group.stu_id='$stu_id' ";
                  $result = $conn->query($sqlass);
                  if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                 $idq=$row['COUNT(post.p_no)'];}}
                 echo"  <label class='LabelAssinaments' style='margin-left: 13%;'>Assinaments<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$idq</label>";
                  
                }

/**---------------------------------------------Teacher-----------------------------------------------------
 * -------------------------------------------------------------------------------------------------------------------------------
 */

function imgteacher(){

   global $conn;
   $id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
   $sqln="SELECT user.* ,teacher.tr_phone_no ,teacher.tr_id 	
   from user ,teacher 
   WHERE user.user_id=teacher.user_id  and user.user_id='".$id."';";
   /** وتخزينها في متغيرات DB  احضار بيانات من  */                      
   $result= mysqli_query($conn,$sqln);
   $row =mysqli_fetch_row($result);
    $img=$row[3];
    echo " <img class='photo' src='../../sources/image/$img' /> ";
}
 function countgroupteacher(){
                  $user_id=$_SESSION['user_id'];
                  global $conn;
                  $query="SELECT COUNT(groups.g_no) FROM groups,user,teacher WHERE user.user_id=teacher.user_id and teacher.tr_id=groups.tr_id and user.user_id='$user_id'";
                   $result = $conn->query($query);
                   if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                  $idq=$row['COUNT(groups.g_no)'];}}
                  echo"  <label class='Lablegroup'>Groups<br>&nbsp&nbsp&nbsp&nbsp$idq</label>";
                  /** الاستعلام عن عدد الفروض الذي قام بإرسالها  الاستاذ  */
                  $sqlass="SELECT  COUNT(announcement.an_no) FROM user,teacher,groups,announcement WHERE user.user_id=teacher.user_id and teacher.tr_id=groups.tr_id and groups.g_no=announcement.g_no and user.user_id='$user_id'";
                  $result = $conn->query($sqlass);
                  if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                  $idq=$row['COUNT(announcement.an_no)'];}}
                  echo"  <label class='LabelAssinaments' style='margin-left: 13%;'>announcement<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$idq</label>";      
                }
                function dataforteacher(){
                  global $conn;
                  $id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
                  $id3=$_SESSION['passT'];/** login path كلمة السر غسر مشفرة تم احضارها من  */
                  $sqln="SELECT user.* ,teacher.tr_phone_no ,teacher.tr_id 	
                  from user ,teacher 
                  WHERE user.user_id=teacher.user_id and user.user_id='".$id."';";
                  /** وتخزينها في متغيرات DB  احضار بيانات من  */                      
                  $result= mysqli_query($conn,$sqln);
                  $row =mysqli_fetch_row($result);
                  $id=$row[6];
                  $name=$row[1];
                  $phone=$row[5];
                  $pass=$row[2];
                  $img=$row[3];

     
                    echo"  <label class='LabelID' style='margin-left: 30%;'>&nbsp&nbsp&nbspID <br>$id</label>";
                    echo"   <label class='stname' >$name</label>";
                    echo"   <label class='stspe' >$phone</label>";

     
                    $_GET['name']=$name;
                                 $_GET['phone']=$phone;
                                 $_GET['password']=$pass;
                                 $_GET['password1']=$id3;/**كلمة مرور غير مشفرة  */
                                 $_GET['img']= $img;
                                 $_GET['id']=$id;
     
                                $_SESSION['name']=$_GET['name'];
                                $_SESSION['phone']=$_GET['phone'];
                                $_SESSION['pass']=$_GET['password'];   
                                $_SESSION['pass2']= $_GET['password1'];
                                $_SESSION['img1']=$_GET['img'];
                                $_SESSION['tid']=$_GET['id'];         
                }

/**---------------------------------------------Admin -----------------------------------------------------
 * -------------------------------------------------------------------------------------------------------------------------------
 */


 function imgadmin(){
  global $conn;
  $id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
  $sqln="  SELECT  `u_img` FROM `user` WHERE `role`='admin' and user.user_id='".$id."';";
    $result= mysqli_query($conn,$sqln);
    $row =mysqli_fetch_row($result);
    $img=$row[0];
    echo " <img class='photo' src='../../sources/image/$img' /> ";
 }

function admingroupcount(){
  $user_id=$_SESSION['user_id'];
  global $conn;
  $query="SELECT COUNT(groups.g_no) FROM `groups` ";
    $result = $conn->query($query);
   if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  $idq=$row['COUNT(groups.g_no)'];}}
  echo"  <label class='Lablegroup'>Groups<br>&nbsp&nbsp&nbsp&nbsp&nbsp$idq</label>";
}


function countTeacherforadminpage(){
 
  global $conn;
  $query=" SELECT COUNT(user.user_id) FROM `user`WHERE user.role='admin'; ";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  $idr=$row['COUNT(user.user_id)'];}}
  echo "<label class='LabelAssinaments' style='margin-left: 15%;'>&nbspAdmins<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$idr</label>  ";
}
                ?>