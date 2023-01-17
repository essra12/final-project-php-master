<?php
include("../../path.php"); 
include(MAIN_PATH. "/DataBase/db.php");

global $conn;
$sql = "UPDATE announcement SET status='1'";
$res = mysqli_query($conn, $sql);

if ($res) {
  echo "Success";
} else {
  echo "Failed";
}