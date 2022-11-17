<?php
/* include("../path.php");  */
include(MAIN_PATH. "/database/db.php");
global $conn;
$errors = array();
$table1='user';
$table2='teacher';
$full_name="";
$tr_phone_no="";
$password="";
$conf_password="";

/*************************************** Insert Teacher Data*****************************************/

 if(isset($_POST['add_teacher'])){

    $exisiting_teacher = selectOne($table2,['tr_phone_no'=>$_POST['tr_phone_no']]);
    if($exisiting_teacher)
    {
        array_push($errors,"This Teacher alredy exists");
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

    /**************/

    if(count($errors)==0){

    /**************for user table **************/
        global $conn;
        unset($_POST['add_teacher']);
        $tr_phone_no=$_POST['tr_phone_no'];//تخزين قيمة المتغير قبل حدفه
        unset($_POST['tr_phone_no']); 
        unset($_POST['conf_password']);
        $_POST['admin']=0;
        $_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);//password عمل تشفير لل
        
        $full_name=$_POST['full_name'];
        $password=$_POST['password'];
        $u_img=$_POST['u_img'];
        $admin=$_POST['admin'];

         $sql_insert1="INSERT INTO user(full_name,password,u_img,admin) VALUES ('$full_name','$password','$u_img','$admin')";
         $conn->query($sql_insert1); 
         $last_id = $conn->insert_id;

         $_SESSION['user_id']=$last_id['user_id'];
         $_SESSION['full_name']=$last_id['full_name'];
     
    /**************for teacher table **************/
        unset($_POST['add_teacher'],$_POST['full_name'],$_POST['password'],$_POST['conf_password'],$_POST['u_img']);

        $user_id='LAST_INSERT_ID()';

        $sql_insert2="INSERT INTO teacher(user_id,tr_phone_no) VALUES ( $user_id,'$tr_phone_no')";
        $conn->query($sql_insert2); 

    /*succes mmessage*/
        $_SESSION['message']='Teacher Added successfully';
        header('location: ' . BASE_URL .'/UI/control_panel/create_group.php');// يتم إستخدام هذه الدالة  من أجل نقل أو تحويل المستخدم للمكان الذي نُريده
        $conn->close();
        exit();
    }

    else{
        $full_name=$_POST['full_name'];
        $tr_phone_no=$_POST['tr_phone_no'];
        $password=$_POST['password'];
        $conf_password=$_POST['conf_password'];
    } 

 }


 /***************************************** delete Teacher******************************************/

 if(isset($_GET['delete_tr_id'])&& isset($_GET['deleteID']))
 {
    /*********for groups table*********/
    $tr_id=$_GET['delete_tr_id'];
    $sql_delete1="DELETE FROM groups WHERE tr_id='$tr_id';";
    $conn->query($sql_delete1); 

   /*********for teacher table*********/
   $sql_delete2="DELETE FROM teacher WHERE tr_id='$tr_id';";
   $conn->query($sql_delete2);   

   /*********for teacher table*********/
   $user_id=$_GET['deleteID'];
   $sql_delete3="DELETE FROM user WHERE user_id='$user_id';";
   $conn->query($sql_delete3);   

   /*succes mmessage*/
   $_SESSION['message']="teacher deleted successfully";
   header('location: '.BASE_URL.'/UI/control_panel/teacher_control_panel.php'); 
   $conn->close();
   exit();
 } 
