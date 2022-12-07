
<?php

$server_name='localhost';
$username='root';
$pass='';
$db_name='filesharing';
$conn_error='';

$conn=new MySQLi($server_name,$username,$pass,$db_name);
 if($conn->connect_error){
  die('There is error in database connaction: '.$conn->connect_error);
  $conn_error="There is error in database connaction";
}
/* else{
    echo('The database connection is successful :) ');
}  */  
 
