<?php
include(MAIN_PATH."/DataBase/Connection.php");
global $conn;
$groupNO=$_SESSION['g-no'];
function selectAllfilesInfo(){ 
/*
    global $conn; 
    $sql= "SELECT * FROM `post`;";
    global $conn;
    mysqli_query($conn,$sql);
*/

    
global $conn; 
$groupNO=$_SESSION['g-no'];
$sql="SELECT  `title`, `description` FROM `post`,groups WHERE groups.g_no=post.g_no  and post.g_no='$groupNO';";
    global $conn;
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
    /*
    $pre=$conn->prepare($sql1);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
    */
}

?>
