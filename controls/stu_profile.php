<?php
include(MAIN_PATH. "/database/db.php");
    
    $fullname=$_SESSION['full_name'];
    $sql="SELECT USER.* ,student.stu_id,student.stu_specialization
    FROM user,student
    WHERE user.user_id=student.user_id and user.full_name='".$fullname."';";
      
    $pre=$conn->prepare($sql);
    $pre->execute();
    $result = $pre->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

    $fullname=$_SESSION['full_name'];
    $id= $_SESSION['stu_id'];
    $image=$_SESSION['u_img'];
    $pass=$_SESSION['password'];
    $spe=$_SESSION['stu_specialization'];



if(isset($_POST['submit'])){
    global $conn;
    
    $sql="UPDATE user,student set student.stu_id='".$_POST['stu_id']."', student.stu_specialization='".$_POST['stu_specialization']."', user.full_name='".$_POST['full_name']."', user.password='".$_POST['password']."'
    WHERE user.user_id=student.user_id and student.stu_id='".$id."';";
    
    $result=mysqli_query($conn,$sql);
    if ($result) {
        echo "Successfully updated";
        $conn->close();
        exit();
        /*    header('location: ' . BASE_URL .'/UI/group/main page for group.php'); */
       
        }
        else
        {
            die('Error' . mysqli_error($connection));
    
        }
    


} 


 /*    if(mysqli_num_rows($conn,$sql)){
               
        echo '<script type="text/javascript">alert("Record updated successfully .")</script>';
        header('location: ' . BASE_URL .'/UI/student/student-profile.php');
        $conn->close();
        exit();
        } 
        else {
        echo "Error updating record: " . mysqli_error($conn);
        } */

  
    ?>


        
        
       

