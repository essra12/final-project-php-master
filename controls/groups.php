<?php
/* include("../path.php");  */
include(MAIN_PATH. "/database/db.php");
$table="groups";
$errors = array();

/*Create Group*/
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
        header('location: ' . BASE_URL .'/UI/control_panel/create_group.php');// يتم إستخدام هذه الدالة  من أجل نقل أو تحويل المستخدم للمكان الذي نُريده
        $conn->close();
        exit(); 
    }
    else{
        $g_name=$_POST['g_name'];
        $tr_id=$_POST['tr_id'];
    } 

}