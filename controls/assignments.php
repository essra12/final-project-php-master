<?php
include(MAIN_PATH."/DataBase/Connection.php");
global $conn;
function selectAllfilesInfo(){ 

    global $conn; 
    $sql = "SELECT `f_no`, `f_name`, `f_type`, `f_size`, `title`, `description`, `stu_group`, `g_no` FROM `files`;";
    global $conn;
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

?>
