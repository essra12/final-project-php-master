<?php
include(MAIN_PATH. "/database/db.php");



$fullname="";
$admin="";
$errors=array();


if (isset($_POST['submit'])) {

    
      global $conn;
      /* md5('somerandomtextthatyouknow'.$_POST['password']) */
      $fullname = trim(mysqli_real_escape_string($conn,$_POST['username']));
      $password = mysqli_real_escape_string($conn,$_POST['password']);
     
      
      /* $user_id = mysqli_real_escape_string($conn,$_POST['user_id']); */
  
  // Ensuring that the user has not left any input field blank
  // error messages will be displayed for every blank input
if (empty($fullname)) { array_push($errors, "Full name is required"); }
if (empty($password)) { array_push($errors, "Password is required"); }


// Checking for the errors
if (count($errors) == 0) {
$query = "SELECT user_id,full_name,password,admin  FROM `user` WHERE full_name='".$fullname."' and password='".$password."'";
$results = mysqli_query($conn, $query);

// $results = 1 means that one user with the entered full name exists
if (mysqli_num_rows($results) == 1) 
 {
  while ($row =mysqli_fetch_assoc($results))
  {
    if($row["admin"]=="1"){

      $_SESSION['full_name'] = $fullname;
      $_SESSION['id'] = $user_id;
      header('Location: UI/control_panel/groups_control_panel.php');
      $conn->close();
      exit();
    }
    else {
      $_SESSION['full_name'] = $fullname;
      // page after logging in
      header('Location: UI/group/main page for group.php');
      $conn->close();
     exit();
     }
   }
 } 

else {   
  // If the full name and password are not in database
array_push($errors," Full name or password incorrect");

}
}
}
