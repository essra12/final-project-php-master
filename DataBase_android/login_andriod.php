<?php
include("../path.php"); 
include(MAIN_PATH. "/database/db.php");



if ($_SERVER['REQUEST_METHOD']=='POST') {

    $full_name = $_POST['full_name'];
    $password = $_POST['password'];

   

    $sql = "SELECT * FROM user WHERE full_name='$full_name' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['login'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {
        
        $row = mysqli_fetch_assoc($response);

        if ( password_verify($password, $row['password']) ) {
            
            $index['full_name'] = $row['full_name'];
            $index['password'] = $row['password'];
           

            array_push($result['login'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($conn);

        } else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);

            mysqli_close($conn);

        }

    }

}

?>