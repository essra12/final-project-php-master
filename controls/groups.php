<?php
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
        array_push($errors,"This group alredy exists");
    }
    
    if(count($errors)==0){
    unset($_POST['create_group']);  //$_POST[] هذه الدالة تقوم بإلغاء القيم المحددة من مصفوفة 
    $post_id = insertData($table,$_POST);// المضاف حالياً g_no هذه الدالة ترجع    
    dd($post_id); 
    }
    else{
        $g_name=$_POST['g_name'];
        $tr_id=$_POST['tr_id'];
    } 

}