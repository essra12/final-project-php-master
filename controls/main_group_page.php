<?php
include(MAIN_PATH. "/database/db.php");

global $conn;
$errors = array();
$table1='groups';
$username=$_SESSION['fullname'];

$search="";

 if(isset($_POST['search'])){

    $exisiting_group_search = selectOne($table1,['g_no'=>$_POST['search']]);
    if($exisiting_group_search)
        { 
             header('Location: inside_group.php'); 
             $conn->close();
             exit();            
    }

    else 
      {
        array_push($errors," This group is not exists");
                    
}           

}