<?php
include(MAIN_PATH. "/database/db.php");

$fullname="";
$admin="";
$errors=array();


if (isset($_POST['submit'])) {
      global $conn;
      $fullname = trim(mysqli_real_escape_string($conn,$_POST['username']));
      $password = mysqli_real_escape_string($conn,$_POST['pass']);
  
  // Ensuring that the user has not left any input field blank
  // error messages will be displayed for every blank input
if (empty($fullname)) { array_push($errors, "Full name is required"); }
if (empty($password)) { array_push($errors, "Password is required"); }


// Checking for the errors
if (count($errors) == 0) {
$query = "SELECT full_name,password,admin  FROM `user` WHERE full_name='".$fullname."' and password='".$password."'";
$results = mysqli_query($conn, $query);

// $results = 1 means that one user with the entered full name exists
if (mysqli_num_rows($results) == 1) 
 {
  while ($row =mysqli_fetch_assoc($results))
  {
    if($row["admin"]=="1"){

      $_SESSION['fullname'] = $fullname;
      header('Location: UI/control_panel/groups_control_panel.php');
    }
    else {
      $_SESSION['fullname'] = $fullname;
      // page after logging in
      header('Location: UI/group/main page for group.php');

     }
   }
 } 

else {   
  // If the full name and password are not in database
array_push($errors," Full name or password incorrect");

}
}
}
