<?php
include(MAIN_PATH. "/database/db.php");

$errors=array();

function an_no(){
    if(isset($_GET["an_no"]))
    {
      $an_number = $_GET["an_no"];
    }
 return $an_number;
}

function search($an_no,$stu_id){ 
    $search="";
    global $errors;
    global $conn; 

        $sql="SELECT post.stu_group,user.full_name,user.u_img,student.stu_id FROM post,student_group,announcement,user,student WHERE post.an_no=announcement.an_no AND post.stu_group=student_group.stu_group AND user.user_id=student.user_id 
        AND student.stu_id=student_group.stu_id AND post.an_no='$an_no' AND student.stu_id='$stu_id'; ";
        $pre=$conn->prepare($sql);
        $pre->execute();
        $exisiting_student_search=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
            
        if($exisiting_student_search)
        {
            $conn->close();
            return $exisiting_student_search;
        }
        elseif(!$exisiting_student_search) 
          {
            array_push($errors," This student dosn't exist");
            $search="";
            return $exisiting_student_search;
         } 
                   
    } 



