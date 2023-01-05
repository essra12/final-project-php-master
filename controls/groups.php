<?php
/* include("../path.php");  */
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");
$table="groups";
$errors = array();
global $conn;

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
    $g_no=$_GET['deleteID'];

    //to get p_no for tr
    $array_p_no_fot_tr=array();
    $select_p_no_for_tr="SELECT DISTINCT post.p_no FROM post,groups WHERE post.g_no=groups.g_no AND groups.g_no='$g_no';";
    $result = $conn->query($select_p_no_for_tr);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $p_no=$row['p_no'];
        array_push($array_p_no_fot_tr,$p_no);
      }
    }//

    //to get p_no for stu
    $array_p_no_fot_stu=array();
    $select_p_no_for_stu="SELECT DISTINCT post.p_no FROM post,student_group,groups WHERE student_group.g_no=groups.g_no AND student_group.stu_group=post.stu_group AND groups.g_no='$g_no';";
    $result = $conn->query($select_p_no_for_stu);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $p_no=$row['p_no'];
        array_push($array_p_no_fot_stu,$p_no);
      }
    }//

    /**delete from file table**/
    // to delete from file table by p_no  for tr
    if(count($array_p_no_fot_tr)>0){
        for($i=0;$i<count($array_p_no_fot_tr);$i++){
            //delete from file table by tr p_no
            $deletefile_by_p_no_for_tr=deleteFileBy_p_no($array_p_no_fot_tr[$i]);
        }
    }

    // to delete from file table by p_no  for stu
    if(count($array_p_no_fot_stu)>0){
        for($i=0;$i<count($array_p_no_fot_stu);$i++){
            //delete from file table by tr p_no
            $deletefile_by_p_no_for_stu=deleteFileBy_p_no($array_p_no_fot_stu[$i]);
        }
    }
    /**************************/
    /**delete from post table**/
    // to delete from post table by p_no  for tr
    for($i=0;$i<count($array_p_no_fot_tr);$i++){
        //delete from post table by tr p_no
        $deletefile_by_p_no_for_tr=deletePostBy_p_no($array_p_no_fot_tr[$i]);
    }
    // to delete from post table by p_no  for stu
    for($i=0;$i<count($array_p_no_fot_stu);$i++){
        //delete from post table by tr p_no
        $deletepost_by_p_no_for_stu=deletePostBy_p_no($array_p_no_fot_stu[$i]);
    }

    /*******************************/
    /**delete from response table**/
    $delete_response=deleteResponse_g_no($g_no);

    /*******************************/
    /**delete from enquiry table**/
    //to get e_no for stu
    $array_e_no=array();
    $select_e_no="SELECT  enquiry.e_no FROM enquiry,student_group,groups WHERE student_group.g_no=groups.g_no AND student_group.stu_group=enquiry.stu_group AND groups.g_no='$g_no';";
    $result = $conn->query($select_e_no);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $e_no=$row['e_no'];
        array_push($array_e_no,$e_no);
      }
    }//
    // to delete from enquiry table by e_no
    if(count($array_e_no)>0){
        for($i=0;$i<count($array_e_no);$i++){
            //delete from enquiry table
            $deleteenquiry=deleteEnquiry($array_e_no[$i]);
        }
    }

    /************************************/
    /**delete from Announcement by g_no table**/
    $delete_announcement=deleteAnnouncement_g_no($g_no);

    /************************************/
    /**delete from student_group table**/
    $delete_student_group_by_g_no=deleteStudent_group($g_no);

     /***************************/
    /**delete from group table**/
    $delete_group_by_g_no=deleteGroup($g_no);

     /***************************/
    /*for successfully message */ 
    $_SESSION['message']="Group deleted successfully";
    header('location: '.BASE_URL.'/UI/control_panel/groups_control_panel.php');
    $conn->close();
    exit();

}


/*********search***********/
function searchGroup($g_name){ 
    $search="";
    global $errors;
    global $conn; 
    $term='%'.$g_name.'%';
        $sql="SELECT *,teacher.user_id,user.full_name FROM groups,user,teacher WHERE groups.tr_id=teacher.tr_id AND teacher.user_id=user.user_id 
        AND groups.g_name LIKE '$term' ORDER BY groups.Datetime DESC;";
        $pre=$conn->prepare($sql);
        $pre->execute();
        $exisiting_group_search=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
            
        if($exisiting_group_search)
        {
            $conn->close();
            return $exisiting_group_search;
        }
        elseif(!$exisiting_group_search) 
          {
            array_push($errors," This teacher dosn't exist");
            $search="";
            return $exisiting_group_search;
         } 
                   
    } 


