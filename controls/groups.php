<?php
/* include("../path.php");  */
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");
$table="groups";
$errors = array();

/*************************Insert Group Data************************/
 $g_name=""; 
 $tr_id="";
if(isset($_POST['create_group'])){
    $exisiting_group = selectOne($table,['g_name'=>$_POST['g_name'],'tr_id'=>$_POST['tr_id']]);
    if($exisiting_group)
    {
        array_push($errors,"This Group alredy exists");
    }
    
    if(count($errors)==0){
        unset($_POST['create_group']);  //$_POST[] هذه الدالة تقوم بإلغاء القيم المحددة من مصفوفة 
        $post_id = insertData($table,$_POST);// المضاف حالياً g_no هذه الدالة ترجع   
    /*  dd($post_id); */ //just for teasting , remove 
        $_SESSION['message']='Group created successfully';
        header('location: ' . BASE_URL .'/UI/control_panel/groups_control_panel.php');// يتم إستخدام هذه الدالة  من أجل نقل أو تحويل المستخدم للمكان الذي نُريده
        $conn->close();
        exit(); 
    }
    else{
        $g_name=$_POST['g_name'];
        $tr_id=$_POST['tr_id'];
    } 
}

/***************************Delete Group****************************/
if(isset($_GET['deleteID']))
{
  $deleteGroup=deleteGroup($_GET['deleteID']);
  $_SESSION['message']="Group deleted successfully";
  header('location: '.BASE_URL.'/UI/control_panel/groups_control_panel.php');
  $conn->close();
  exit();
}

/******************Select All Student Inside Group******************/

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