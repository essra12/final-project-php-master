<?php

 $view="/login.php"; 

function visitorsOnly($view ='/login.php')
{
    if(isset($_SESSION['user_id']))
    {
       header('location: '. BASE_URL .$view);
       exit(0);
    }
}
 function userOnly($view ='/login.php')
{
   if(empty($_SESSION['user_id']))
   {
      ?>
      <script>
        alert(" You must be login ");
      </script>
      <?php
       header('location: '. BASE_URL .$view);  
       exit(0);
   }
} 

function adminOnly($view ='/login.php')
{
    if(empty($_SESSION['user_id']) || ($_SESSION['role'] != "admin"))
    {
      ?>
      <script>
        alert(" You must be Admin ");
      </script>
      <?php
       header('location: '. BASE_URL .$view);
       exit(0);
    }
}