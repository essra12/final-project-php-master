<?php
include(MAIN_PATH. "/database/db.php");



$fullname="";
$admin="";
$errors=array();


if (isset($_POST['submit'])) {

    
      global $conn;
      
      $fullname = trim(mysqli_real_escape_string($conn,$_POST['username']));
      $password = mysqli_real_escape_string($conn,$_POST['password']);
    
  
  // Ensuring that the user has not left any input field blank
  // error messages will be displayed for every blank input
if (empty($fullname)) { array_push($errors, "Full name is required"); }
if (empty($password)) { array_push($errors, "Password is required"); }


// Checking for the errors
if (count($errors) == 0) {
$query = "SELECT user_id,full_name,password,u_img,admin  FROM `user` WHERE full_name='".$fullname."'";
$results = mysqli_query($conn, $query);



// $results = 1 means that one user with the entered full name exists
if (mysqli_num_rows($results) == 1) 
 {
   while ($row =mysqli_fetch_assoc($results))
  {
    if($fullname && password_verify($password,$row['password'])){
    if($row["admin"]=="1")
    {
      $_SESSION['full_name'] = $fullname;
      $_SESSION['user_id'] =$row['user_id'];
      
      header('Location: UI/control_panel/groups_control_panel.php');
      $conn->close();
      exit();
     }
    else {
      $_SESSION['full_name'] = $fullname;
      $_SESSION['user_id'] =$row['user_id'];
      /* $_SESSION['u_img'] =$row['u_img']; */
      // page after logging in
      header('Location: UI/group/main page for group.php');
      $conn->close();
      exit();
     }
   
   } array_push($errors," password incorrect"); }
   
}

else {   
  // If the full name and password are not in database
array_push($errors," Full name or password incorrect");}

}
}

