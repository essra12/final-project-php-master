<?php
include(MAIN_PATH. "/database/db.php");
$table="groups";
$errors = array();

/*Create Group*/
 $g_name=""; 
if(isset($_POST['create_group'])){
    $exisiting_group = selectOne($table,['g_name'=>$_POST['g_name'],'tr_id'=>$_POST['tr_id']]);
    if($exisiting_group)
    {
        array_push($errors,"This Title alredy exists");

     /* ?>
     <script> 
      document.getElementById("error").innerHTML = "This group alredy exists"; 
      document.getElementById("error").style.color = "red";
        /* alert("This group alredy exists"); */
     /* </script> */
   /*   <?php */ 
    }
    
    if(count($errors)==0){
    unset($_POST['create_group']);  //$_POST[] هذه الدالة تقوم بإلغاء القيم المحددة من مصفوفة 
    $post_id = insertData($table,$_POST);// المضاف حالياً g_no هذه الدالة ترجع    
    dd($post_id); 
    }
    else{
        $g_name=$_POST['g_name'];
    } 

}