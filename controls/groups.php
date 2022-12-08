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
    /*************************/

    /**delete from post table**/
    for($i=0;$i<count($array_p_no_fot_tr);$i++){
        //delete from post table by tr p_no
        $deletefile_by_p_no_for_tr=deletePostBy_p_no($array_p_no_fot_tr[$i]);
    }
    // to delete from post table by p_no  for stu
    for($i=0;$i<count($array_p_no_fot_stu);$i++){
        //delete from post table by tr p_no
        $deletefile_by_p_no_for_stu=deletePostBy_p_no($array_p_no_fot_stu[$i]);
    }

    /**delete from student_group table**/
    $delete_student_group_by_g_no=deleteStudent_group($g_no);

    /**delete from group table**/
    $delete_group_by_g_no=deleteGroup($g_no);


    /**delete from group table**/
     $deleteGroup=deleteGroup($g_no); 

    $_SESSION['message']="Group deleted successfully";
    header('location: '.BASE_URL.'/UI/control_panel/groups_control_panel.php');
    $conn->close();
    exit();

}


/*******************************************************************/
/******************Select All Student Inside Group******************/

function selectAllStudentInGroup(){ 
    global $conn; 
    if(isset($_GET['g_no'])){
        $sql = "SELECT user.full_name,user.u_img,student.stu_id FROM user,student, student_group WHERE user.user_id=student.user_id AND student.stu_id=student_group.stu_id AND student_group.g_no ='$_GET[g_no]';";
        $pre=$conn->prepare($sql);
        $pre->execute();
        $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

    
}