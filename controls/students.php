<?php
/* include("../path.php");  */
include(MAIN_PATH. "/database/db.php");

global $conn;
$errors = array();
$table1='user';
$table2='student';
$stu_id="";
$full_name="";
$stu_specialization="";
$password="";
$conf_password="";




/********************************Insert Student Data (signUp)********************************/
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
        $_POST['u_img']='create_add_photo.png';
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
        $_POST['admin']=0;
        $_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);//password عمل تشفير لل

        $full_name=$_POST['full_name'];
        $password=$_POST['password'];
        $u_img= $_POST['u_img'];
        $admin=$_POST['admin'];

        $sql1="INSERT INTO user(full_name,password,u_img,admin) VALUES ('$full_name','$password','$u_img','$admin')";
        $conn->query($sql1); 
        $last_id = $conn->insert_id;

/*         $_SESSION['user_id']=$last_id['user_id'];
        $_SESSION['full_name']=$last_id['full_name']; */
         

    /**************for student table **************/
        unset($_POST['Add_student'],$_POST['full_name'],$_POST['password'],$_POST['conf_password'],$_POST['u_img']);

        $user_id='LAST_INSERT_ID()';
        
        $sql2="INSERT INTO student(stu_id,user_id,stu_specialization) VALUES ($stu_id, $user_id,'$stu_specialization')";

        $conn->query($sql2); 
        $_SESSION['full_name'] = $full_name;
        $_SESSION['user_id']=$last_id['user_id']; 

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



 /********************************************Delete Student**********************************************/
 if(isset($_GET['deleteID']))
 {
   $deleteStudent=deleteStudent($_GET['deleteID']);
   $_SESSION['message']="Student deleted successfully";
   header('location: '.BASE_URL.'/UI/control_panel/student_control_panel.php');
   $conn->close();
   exit();
 } 

