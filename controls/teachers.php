<?php
/* include("../path.php");  */
include(MAIN_PATH. "/database/db.php");
include(MAIN_PATH. "/common/validity.php");
global $conn;

$errors = array();
$table1='user';
$table2='teacher';
$full_name="";
$tr_phone_no="";
$password="";
$conf_password="";

/****************************************************************************************************/
/*************************************** Insert Teacher Data*****************************************/

 if(isset($_POST['add_teacher'])){

    $exisiting_teacher = selectOne($table2,['tr_phone_no'=>$_POST['tr_phone_no']]);
    if($exisiting_teacher)
    {
        array_push($errors,"This Teacher alredy exists");
    }

    /* user Image */
    if (!empty($_FILES['u_img']['name'])) {
        $imgName= time() .'_' . $_FILES['u_img']['name'];// تُرجع الدالة الوقت الحالي بعدد الثواني منذ ذلك الحين time() ،  HTTP POST عبارة عن مصفوفة ارتباطية تحتوي على عناصر تم تحميلها عبر طريقة $_FILES
        
        $imgPath=MAIN_PATH. "/sources/image/" .$imgName;
        
        $r= move_uploaded_file($_FILES['u_img']['tmp_name'],$imgPath); // تعمل الدالة  على نقل الملف الذي تم تحميله إلى وجهة جديدة.

        if ($r) {
            $_POST['u_img']=$imgName;
        } 
        else {
            array_push($errors,"There is an error uploading the image.");
        }
    }
    else if (empty($_FILES['u_img']['name'])) {
        $_POST['u_img']='blue_rectangle_with_user.JPG';
    }

    /**************/

    if(count($errors)==0){

    /**************for user table **************/
        global $conn;
        unset($_POST['add_teacher']);
        $tr_phone_no=$_POST['tr_phone_no'];//تخزين قيمة المتغير قبل حدفه
        unset($_POST['tr_phone_no']); 
        unset($_POST['conf_password']);
        $_POST['role']='teacher';
        $_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);//password عمل تشفير لل
        
        $full_name=$_POST['full_name'];
        $password=$_POST['password'];
        $u_img=$_POST['u_img'];
        $role=$_POST['role'];

         $sql_insert1="INSERT INTO user(full_name,password,u_img,role) VALUES ('$full_name','$password','$u_img','$role')";
         $conn->query($sql_insert1); 
         $last_id = $conn->insert_id;


     
    /**************for teacher table *************/
        unset($_POST['add_teacher'],$_POST['full_name'],$_POST['password'],$_POST['conf_password'],$_POST['u_img']);

        $user_id='LAST_INSERT_ID()';

        $sql_insert2="INSERT INTO teacher(user_id,tr_phone_no) VALUES ( $user_id,'$tr_phone_no')";
        $conn->query($sql_insert2); 

    /*succes mmessage*/
        $_SESSION['message']='Teacher Added successfully';
        header('location: ' . BASE_URL .'/UI/control_panel/create_group.php');
        $conn->close();
        exit();
    }

    else{
        $full_name=$_POST['full_name'];
        $tr_phone_no=$_POST['tr_phone_no'];
        $password=$_POST['password'];
        $conf_password=$_POST['conf_password'];
    } 

 }

/****************************************************************************************************/
 /***************************************** delete Teacher******************************************/

/*  if(isset($_GET['delete_tr_id'])&& isset($_GET['deleteID']))
 {
    /*********for groups table********
    $tr_id=$_GET['delete_tr_id'];
    $sql_delete1="DELETE FROM groups WHERE tr_id='$tr_id';";
    $conn->query($sql_delete1); 

   /*********for teacher table********
   $sql_delete2="DELETE FROM teacher WHERE tr_id='$tr_id';";
   $conn->query($sql_delete2);   

   /*********for user table********
   $user_id=$_GET['deleteID'];
   $sql_delete3="DELETE FROM user WHERE user_id='$user_id';";
   $conn->query($sql_delete3);   

   /*succes mmessage
   $_SESSION['message']="teacher deleted successfully";
   header('location: '.BASE_URL.'/UI/control_panel/teacher_control_panel.php'); 
   $conn->close();
   exit();
 } */ 

 if(isset($_GET['delete_tr_id'])&& isset($_GET['deleteID']))
 {
    $user_id_delete=$_GET['deleteID'];
    $tr_id=$_GET['delete_tr_id'];


      /*--------------------------------------------  Delte teacher if table groups =""----------------------------
$array_g_no=array();
$select_g_no="SELECT  groups.g_no FROM groups,teacher WHERE groups.tr_id=teacher.tr_id AND teacher.tr_id=' $tr_id';";
$result = $conn->query($select_g_no);
if($result->num_rows > 0) {
    echo '<script type="text/javascript">alert("Cannot delete tgis teacher ! .")</script>';
    ?>
    <script type="text/javascript">
     window.location.href="../control_panel/teacher_control_panel.php." </script>
     <?php 
}
else 
$sqln="DELETE FROM `teacher` WHERE teacher.tr_id=' $tr_id'";
if(mysqli_query($conn,$sqln)){
    echo '<script type="text/javascript">alert("Record updated successfully .")</script>';
    ?>
    <script type="text/javascript">
     window.location.href="../control_panel/teacher_control_panel.php." </script>
     <?php 
      } else {
      echo "Error updating record: " . mysqli_error($conn);
       }
       */


    //to get g_no 
    $array_g_no=array();
    $select_g_no="SELECT  groups.g_no FROM groups,teacher WHERE groups.tr_id=teacher.tr_id AND teacher.tr_id='$tr_id';";
    $result = $conn->query($select_g_no);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $g_no=$row['g_no'];
        array_push($array_g_no,$g_no);
      }
    }//

    //to get p_no 
    $array_p_no=array();
    foreach($array_g_no as $g_no){
        $group_number=$g_no;
        $select_p_no="SELECT DISTINCT post.p_no FROM post,groups WHERE post.g_no=groups.g_no AND groups.g_no='$group_number';";
        $result = $conn->query($select_p_no);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $p_no=$row['p_no'];
              array_push($array_p_no,$p_no);
            } 
          }
    }

    /**delete from file table**/
    if(count($array_p_no)>0){
        for($i=0;$i<count($array_p_no);$i++){
            //delete from file table by p_no
            $deletefile_by_p_no=deleteFileBy_p_no($array_p_no[$i]);
        }
    }

    /**delete from post table**/
    for($i=0;$i<count($array_p_no);$i++){
        //delete from post table by p_no
        $deletepost_by_p_no=deletePostBy_p_no($array_p_no[$i]);
    }
    
    /**delete from groups table**/
    $deletegroup_by_tr_id="DELETE FROM groups WHERE tr_id='$tr_id';";
    $conn->query($deletegroup_by_tr_id); 

    /**delete from teacher table**/
    $deleteteacher_by_tr_id="DELETE FROM teacher WHERE tr_id='$tr_id';";
    $conn->query($deleteteacher_by_tr_id); 

    /**delete from user table**/
    $user_id=$_GET['deleteID'];
    $sql_delete3="DELETE FROM user WHERE user_id='$user_id_delete';";
    $conn->query($sql_delete3);   

    /*succes mmessage*/
   $_SESSION['message']="teacher deleted successfully";
   header('location: '.BASE_URL.'/UI/control_panel/teacher_control_panel.php'); 
   $conn->close();
   exit();
}

/*********search***********/
function searchTeacher($tr_name){ 
    $search="";
    global $errors;
    global $conn; 
    $term='%'.$tr_name.'%';
        $sql="Select teacher.tr_id,user.user_id,user.full_name,user.u_img,teacher.tr_phone_no from teacher,user WHERE user.user_id=teacher.user_id 
        AND user.full_name LIKE '$term';";
        $pre=$conn->prepare($sql);
        $pre->execute();
        $exisiting_teacher_search=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
            
        if($exisiting_teacher_search)
        {
            $conn->close();
            return $exisiting_teacher_search;
        }
        elseif(!$exisiting_teacher_search) 
          {
            array_push($errors," This teacher dosn't exist");
            $search="";
            return $exisiting_teacher_search;
         } 
                   
    } 