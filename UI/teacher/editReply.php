<?php
include("../../path.php"); 
include(MAIN_PATH."/controls/Enquiry.php"); 


$role=$_SESSION['role'];
if($role=="teacher"){
$Replyno=$_GET['EditReply'];}
if($role==""){
$enquiryno=$_GET['EditEnquiry'];}

$group_no=$_SESSION['g_no'];
//to get group name
$sql="SELECT g_name FROM groups Where g_no='$group_no';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}

?>
<html lang="en">
  <head>

  <title>Edit</title>
  <!--for logo-->
  <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
  <link rel="stylesheet" href="../../css/Add-enquiry.css"> 
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
   </head>

 <style>

     a:link, a:visited{
      text-decoration: none; 
      color:#000}
      main{
        top:20%;
      }
      .cardst{
      background-color: #e5f3fe;
    margin: 3% 0 3% 2%;
    width: 84%;
    border-radius:10px;
    padding-top: 2%;
    }
    .cardst:hover{
      box-shadow: 0 0 11px rgba(33,33,33,.2); 
    }
    .reply{
        margin-top:3%;
        background-color: #fff;
        border: 1px double #222242;  
    }
      
  </style>


<body >
<!--------------------navigation_bar ----------------------->  
<nav class="navbar">
  <ul class="lift-side">
  <?php if ($_SESSION['role']==""):?> 
      <!-------back------>
      <li><div class="back"><a href="../teacher/Add Enquiry .php?data=<?= $g_name?>&number=<?= $group_no?>"><i class="las la-arrow-left"></i></a></div></li>
      <!----------------->
      <?php endif; ?>
      <?php if ($_SESSION['role']=="teacher"):?> 
       <!-------back------>
       <li><div class="back"><a href="../teacher/Add Reply.php?data=<?= $g_name?>&number=<?= $group_no?>"><i class="las la-arrow-left"></i></a></div></li>
      <!----------------->
      <?php endif; ?>
      <!-------logo------>
      <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
      <!----------------->
       
  </ul>
  <div class="navbar-links">
    <ul>
      <!----group name--->
      <li><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $group_no?>" style="padding-top:.5rem;"><?php echo $g_name ?></a></li>
      <!----------------->

      <!-----students--->
      <?php if ($_SESSION['role']=="teacher"):?> 
      <li><a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>"  style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
      <?php endif; ?>  
      <!----------------->

      <!------HOME------>
      <li><a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>" style="font-size: 1.5rem;"><i class="las la-home"></i></a></li>
      <!---------------->

      <!--Notification-->
      <li><a href="#" class="notification" style="font-size: 1.5rem;"><i class="las la-bell"></i><span class="badge">3</span></a></li>
      <!---------------->

      <!------Logout----->
      <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
      <!----------------->
    </ul>
  </div>
</nav> 
<!--------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------->

<main >
<!-- to create dynamic cards with foreach -->
<?php if($role=="teacher"):?>
<?php $replyInfo=selectReplyforEdit($Replyno);?>
<?php foreach($replyInfo as $key => $edit_reply):?>
<div class="cardst">

   
  <form class="modal-content animate"  method="post" action="" name="form">
       <div class="container">
      <label for="uname" class="labeltext"><b>Edit Reply</b></label>
      <div class="card-container ">
      <input class="lable content reply" type="text" value="<?php echo $edit_reply['r_content'] ?>" name="replyInfo"  required autofocus>
     </div>
      </div>

  
      <button type="submit" class=" savebtn"  name="save" >Save</button>
    
  </form>


<?php endforeach; ?>
<?php endif;?>

<?php if($role==""):?>
  <?php $replyInfo=selectEnquiryforEdit($enquiryno);?>
<?php foreach($replyInfo as $key => $edit_reply):?>
<div class="cardst">

   
  <form class="modal-content animate"  method="post" action="" name="form">
       <div class="container">
      <label for="uname" class="labeltext"><b>Edit Enquiry</b></label>
      <div class="card-container ">
      <input class="lable content reply" type="text" value="<?php echo $edit_reply['e_content'] ?>" name="enquiryInfo"  required autofocus>
     </div>
      </div>

  
      <button type="submit" class=" savebtn"  name="saveEnquiry" >Save</button>
    
  </form>


<?php endforeach; ?>
<?php endif;?>
</main>
</body>
  

<script>
/*******************for delet confirm***********************/



</script>
</html>
