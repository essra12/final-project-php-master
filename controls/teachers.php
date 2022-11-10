<?php
/* include("../path.php");  */
include(MAIN_PATH. "/database/db.php");
global $conn;
$errors = array();
$table1='user';
$table2='teacher';
/* Insert Teacher Data */
$full_name="";
$tr_phone_no="";
$password="";
$conf_password="";
 if(isset($_POST['add_teacher'])){

    $exisiting_teacher = selectOne($table2,['tr_phone_no'=>$_POST['tr_phone_no']]);
    if($exisiting_teacher)
    {
        array_push($errors,"This Teacher alredy exists");
    }

    if(count($errors)==0){
    /**************for user table **************/
        global $conn;
        unset($_POST['add_teacher']);
        $tr_phone_no=$_POST['tr_phone_no'];//تخزين قيمة المتغير قبل حدفه
        unset($_POST['tr_phone_no']); 
        unset($_POST['conf_password']);
        $_POST['admin']=0;
        $full_name=$_POST['full_name'];
        $password=$_POST['password'];
        $u_img=$_POST['u_img'];
        $admin=$_POST['admin'];
        $sql1="INSERT INTO user(full_name,password,u_img,admin) VALUES ('$full_name','$password','$u_img','$admin')";
        $conn->query($sql1); 
    
    /**************for user table **************/
        unset($_POST['add_teacher']);
        unset($_POST['full_name']);
        unset($_POST['password']);
        unset($_POST['conf_password']);
        unset($_POST['u_img']);
        $user_id='LAST_INSERT_ID()';
        $sql2="INSERT INTO teacher(user_id,tr_phone_no) VALUES ( $user_id,'$tr_phone_no')";
        $conn->query($sql2); 
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
