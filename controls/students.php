<?php
/* include("../path.php");  */
include(MAIN_PATH. "/database/db.php");

global $conn;
$errors = array();
$table1='user';
$table2='student';

/* Insert Student Data */
$stu_id="";
$full_name="";
$stu_specialization="";
$password="";
$conf_password="";

if(isset($_POST['Add_student'])){
    $exisiting_teacher = selectOne($table2,['stu_id'=>$_POST['stu_id']]);
    if($exisiting_teacher)
    {
        array_push($errors,"Student alredy exists");
    }

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

        $full_name=$_POST['full_name'];
        $password=$_POST['password'];
        $u_img="";
        $admin=$_POST['admin'];

        $sql1="INSERT INTO user(full_name,password,u_img,admin) VALUES ('$full_name','$password','$u_img','$admin')";
        $conn->query($sql1); 
    
    /**************for student table **************/
        unset($_POST['Add_student']);
        unset($_POST['full_name']);
        unset($_POST['password']);
        unset($_POST['conf_password']);
        unset($_POST['u_img']);

        $user_id='LAST_INSERT_ID()';

        $sql2="INSERT INTO student(stu_id,user_id,stu_specialization) VALUES ($stu_id, $user_id,'$stu_specialization')";
        $conn->query($sql2); 

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
