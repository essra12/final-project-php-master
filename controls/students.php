<?php
/* include("../path.php");  */ 
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");
global $conn;
$errors = array();
$table1='user';
$table2='student';
$stu_id="";
$full_name="";
$stu_specialization="";
$password="";
$conf_password="";




/********************************Add Student  (signUp)********************************/
if(isset($_POST['Add_student'])){
    $exisiting_teacher = selectOne($table2,['stu_id'=>$_POST['stu_id']]);
    if($exisiting_teacher)
    {
        array_push($errors,"Student alredy exists");
    }

    
    /* user Image */
    if (!empty($_FILES['u_img']['name'])) {
        $imgName= time() .'_' . $_FILES['u_img']['name'];// تُرجع الدالة الوقت الحالي بعدد الثواني منذ ذلك الحين time() ،  HTTP POST عبارة عن مصفوفة ارتباطية تحتوي على عناصر تم تحميلها عبر طريقة $_FILES
        
        $imgPath=MAIN_PATH. "/sources/image/" .$imgName;
        
        $r= move_uploaded_file($_FILES['u_img']['tmp_name'],$imgPath); // تعمل الدالة  على نقل الملف الذي تم تحميله إلى وجهة جديدة.

        if ($r) {
            $_POST['u_img']=$imgName;
        } 
        else {
            array_push($errors,"There is an error uploading the image.");
        }
    }
    else if (empty($_FILES['u_img']['name'])) {
        $_POST['u_img']='blue_rectangle_with_user.JPG';
    }

    /*****************/

    

    if(count($errors)==0){

    /**************for user table **************/
        global $conn;
        unset($_POST['Add_student']);
        $stu_specialization=$_POST['stu_specialization'];//تخزين قيمة المتغير قبل حدفه
        unset($_POST['stu_specialization']); 
        $stu_id=$_POST['stu_id'];
        unset($_POST['stu_id']);
        unset($_POST['conf_password']);
        $_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);//password عمل تشفير لل

        $full_name=$_POST['full_name'];
        $password=$_POST['password'];
        $u_img= $_POST['u_img'];

        $sql1="INSERT INTO user(full_name,password,u_img,role) VALUES ('$full_name','$password','$u_img','')";
        $conn->query($sql1); 
        $last_id = $conn->insert_id;
         

    /**************for student table **************/
        unset($_POST['Add_student'],$_POST['full_name'],$_POST['password'],$_POST['conf_password'],$_POST['u_img']);

        $user_id='LAST_INSERT_ID()';
        
        $sql2="INSERT INTO student(stu_id,user_id,stu_specialization) VALUES ($stu_id, $user_id,'$stu_specialization')";

         
        $conn->query($sql2); 
        $_SESSION['full_name'] = $full_name;
        $_SESSION['user_id']=$last_id;
        $_SESSION['roie']='';

       

    /*When succes add*/
        header('location: ' . BASE_URL .'/UI/group/main page for group.php');// يتم إستخدام هذه الدالة  من أجل نقل أو تحويل المستخدم للمكان الذي نُريده
        $conn->close();
        exit();
    }

    else{
        $stu_id=$_POST['stu_id'];
        $full_name=$_POST['full_name'];
        $stu_specialization=$_POST['stu_specialization'];
        $password=$_POST['password'];
        $conf_password=$_POST['conf_password'];
    } 
}



 /********************************************Delete Student from control panel**********************************************/
 if(isset($_GET['deleteID']))
 {
   $deleteStudent=deleteStudent($_GET['deleteID']);
   $_SESSION['message']="Student deleted successfully";
   header('location: '.BASE_URL.'/UI/control_panel/student_control_panel.php');
   $conn->close();
   exit();
 } 

<<<<<<< HEAD
=======

 /*********************************************   select stdents in  Enrollment Requests page  ***************************************************************** */
 
 
function selectStudentG(){ 

    global $conn;
   $sql="SELECT  user.full_name,user.u_img ,user.user_id , student_group.stu_id,student_group.stu_group ,file.p_no FROM `student_group`,user,student,file WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id;";
  /*  $sql = "SELECT  user.full_name,user.u_img ,user.user_id , student_group.stu_id,student_group.stu_group FROM `student_group`,user,student WHERE student_group.stu_id=student.stu_id and user.user_id=student.user_id;";
  */ 
  $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


 /********************************************Delete Student in  Enrollment Requests page **********************************************/


 
/*
function deleteStudentgroup2($id)
{
    global $conn;
    $sql="  DELETE FROM `file` WHERE file.p_no=?;";
    $st=executeQuery($sql,['p_no'=>$id]);
    return $st->affected_rows;
} 

 if(isset($_GET['deleteSTID2']))
 {
   $deleteStudent=deleteStudentgroup($_GET['deleteSTID2']);
   $_SESSION['message']="Student deleted successfully";
   header('location: '.BASE_URL.'/UI/teacher/Enrollment Requests.php');
   $conn->close();
   exit();
 } 
  sql="  DELETE FROM `file`;";
} 
*/



/**----------------------------------- delete sudent group -------------------------------- */
function deleteStudentgroup($id,$id1)
{
    global $conn;
    $sql="  DELETE FROM `file` WHERE file.p_no=?;";
    $st=executeQuery($sql,['p_no'=>$id1]);
    $sql1="DELETE FROM `post` WHERE post.stu_group=?;";
    $st=executeQuery($sql1,['stu_group'=>$id]);
    $sql2="DELETE FROM `student_group` WHERE student_group.stu_group=?";
    $st=executeQuery($sql2,['stu_group'=>$id]);
    return $st->affected_rows;
} 

 if(isset($_GET['deleteSTID'])&&isset($_GET['deleteSTID2']))
 {
   $deleteStudent=deleteStudentgroup($_GET['deleteSTID'],$_GET['deleteSTID2']);
   $_SESSION['message']="Student deleted successfully";
   header('location: '.BASE_URL.'/UI/teacher/Enrollment Requests.php');
   $conn->close();
   exit();
 } 
>>>>>>> fe084f05debfa26ca1e470412bee0f7389dd6937
