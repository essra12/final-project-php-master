<?php
include("../../path.php"); 
include(MAIN_PATH."/controls/announcement.php"); 
?>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Announcement</title>
    <meta charset="utf-8">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_dark-without_bc.png">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../css/assignments-student.css"> 
    <link rel="stylesheet" href="../../css/Announcement.css"> 
 </head>
<style> 
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: "Poppins", sans-serif;
}
.card{
  background-color: #e5f3fe;
}
i:hover{
  font-size: 29px;
  color: black;
}
</style>
  <body>

    <!--Navigation Bar -->  
        <?php include(MAIN_PATH."/common/navigation.php"); ?> 
    <!------------------->

<form>


<!-- student Inquiries  card   -->

<h1>Announcements </h1>

<main>


<div class="card">
<lable class="studentname"> Essra Sowan</lable>
<a onclick="return confirmDelete()" href="Announcement.php" ><i style="font-size: 27px;position:absolute;right: 8%;color:red" class="las la-times-circle"></i></a>
</div>


<div class="card">
<lable class="studentname"> Essra Sowan</lable>
<a onclick="return confirmDelete()" href="Announcement.php" ><i style="font-size: 27px;position:absolute;right: 8%;color:red" class="las la-times-circle"></i></a>
</div>

</main>

</form>
  </body>
</html>

<script>
                  /*******************for delet confirm***********************/
    function confirmDelete(){
    if (confirm("Are you sure you want to delete ?")) {
        return true;
    } 
    else {
        return false;
    }
}


</script>