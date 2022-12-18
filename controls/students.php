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
        array_push($errors,"This Student alredy exists");
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
        $_SESSION['role']='';
        $_SESSION['password']=$password; 
        ////
        $_SESSION['pass2']=$password;
       ////

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

/*****************************************************************************************************************************/
/***********************************************Select All Student Inside Group***********************************************/

function selectAllStudentInGroup(){ 
    global $conn; 
    if(isset($_GET['g_no'])){
        $sql = "SELECT user.full_name,user.u_img,student.stu_id FROM user,student, student_group WHERE user.user_id=student.user_id AND student.stu_id=student_group.stu_id AND student_group.g_no ='$_GET[g_no]';";
        $pre=$conn->prepare($sql);
        $pre->execute();
        $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

    
}
/****************************************************************************************************************************/
 /********************************************Delete Student from control panel**********************************************/
/*  if(isset($_GET['deleteID']))
 {
   $deleteStudent=deleteStudent($_GET['deleteID']);
   $_SESSION['message']="Student deleted successfully";
   header('location: '.BASE_URL.'/UI/control_panel/student_control_panel.php');
   $conn->close();
   exit();
 }  */

 if(isset($_GET['deleteID'])&& isset($_GET['deletestu_id']))
 {

    $user_id_delete=$_GET['deleteID'];
    $stu_id_delete=$_GET['deletestu_id'];

    //to get g_no 
    $array_g_no=array();
    $select_g_no="SELECT DISTINCT  groups.g_no FROM groups,student_group,student WHERE student_group.g_no=groups.g_no AND student.stu_id=student_group.stu_id AND student.stu_id='$stu_id_delete';";
    $result = $conn->query($select_g_no);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $g_no=$row['g_no'];
        array_push($array_g_no,$g_no);
      }
    }//

    //to get p_no 
    $array_p_no=array();
    foreach($array_g_no as $g_no){
        $group_number=$g_no;
        $select_p_no="SELECT DISTINCT post.p_no FROM post,student_group,groups WHERE student_group.g_no=groups.g_no AND student_group.stu_group=post.stu_group AND groups.g_no='$group_number';";
        $result = $conn->query($select_p_no);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $p_no=$row['p_no'];
              array_push($array_p_no,$p_no);
            } 
          }
    }

    /**delete from file table**/
    if(count($array_p_no)>0){
        for($i=0;$i<count($array_p_no);$i++){
            //delete from file table by p_no
            $deletefile_by_p_no=deleteFileBy_p_no($array_p_no[$i]);
        }
    }

    /**delete from post table**/
    for($i=0;$i<count($array_p_no);$i++){
        //delete from post table by p_no
        $deletepost_by_p_no=deletePostBy_p_no($array_p_no[$i]);
    }

    /**delete from post table**/
    $deleteStudent=deleteStudentGroup($stu_id_delete);


    /**delete from student/user tables**/
    $deleteStudent=deleteStudentUser($user_id_delete);

    /*for successfully message */ 
    $_SESSION['message']="Student deleted successfully";
    header('location: '.BASE_URL.'/UI/control_panel/student_control_panel.php');
    $conn->close();
    exit();

 }
