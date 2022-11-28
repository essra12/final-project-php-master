<?php
include("../path.php"); 
include(MAIN_PATH. "/database/db.php");


   $json_data=array();

        global $conn;
        $response=array();
        /* $user_id=$_SESSION['user_id']; */
        $user_id=100;

        $sql="SELECT user.user_id,user.full_name,user.u_img ,student.stu_id,student.stu_specialization
        FROM user,student WHERE user.user_id=student.user_id and user.user_id='$user_id';";
        
        $result = $conn->query($sql);
        while($row = $result->fetch_all(MYSQLI_ASSOC)) {
           $json_data=$row;
        }
    echo json_encode($json_data);

    $conn->close();

