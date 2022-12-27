<?php
include("../../path.php"); 
include(MAIN_PATH."/controls/Enquiry.php"); 


$role=$_SESSION['role'];
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
  <title>Enquiry</title>
  <!--for logo-->
  <link rel="shortcut icon" href="../../sources/image/logo_bar.png">

  <link rel="stylesheet" href="../../css/Add-enquiry.css"> 
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
 </head>
 <style>
     a:link, a:visited{
      text-decoration: none; 
      color:#000}
    </style>







  <body>

<!--------------------navigation_bar ----------------------->  
<nav class="navbar">
  <ul class="lift-side">
      <!-------back------>
      <li><div class="back"><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $group_no?>"><i class="las la-arrow-left"></i></a></div></li>
      <!----------------->

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



<label class="Inquirieslable">Enquiries </label>

 <!-- For Succes message -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg success" style="color: #5a9d48; padding:3% 0% 0% 11%;list-style-type:none;">
            <li><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
            <?php
            /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>
<!-------------------------------------------------------------------------------->
<!-- AddInquiry card   -->
<form  onsubmit="return check__Enter()" method="post" action="Add Enquiry .php" >
<div class="card">
<label class="AddInquiry">Add Enquiry</label>
<textarea class=" Inquiry"  name="enquiry" id="id" placeholder="Enquiry" style="padding:1.75% 2% 0 2%" ></textarea>
<button type="submit" class="btpost" name="add_enquiry">POST</button>
</div>
</form>
<!-------------------------------------------------------------------------------->

<!------------------------------------- student Inquiries  card -------------------------------->

<main>
<!-- to create dynamic cards with foreach -->
<?php $enquiryInfo=selectEnquiry();?>

<?php foreach($enquiryInfo as $key => $Info):?>
<div class="cardst">
<?php $datetime=strtotime($Info['datetime'])?>
 <h6 class=""><?php echo  date("d-m-Y h:i",$datetime)?></h6>
<label class="studentname">ID <?php echo $Info['stu_id'] ?></label>
<a  onclick="return confirmDelete()"  href="Add Enquiry .php"><i class="las la-trash-alt ticon delet"style="font-size: 25px;position:absolute;right: 22%;margin-top: 0%; color:#222242;"></i></a>
<p><?php echo $Info['e_content'] ?></p>
<form  method="post" action="Add Enquiry .php" >
<input  type="hidden" name="e_no" value="<?php echo $Info['e_no'] ?>">
</form>


<hr><!-----------------------------------replay section----------------------------------------->
<?php $replyInfo=selectReply();?>
<?php foreach($replyInfo as $key => $Info):?>

<?php if($role=="teacher"):?>
<a class="icon_x" onclick="return confirmDelete()"  href="Add Enquiry .php?deleteReply=<?php echo $Info['r_no'];?>"><i id="deleteicon1" style="" class="las la-times-circle"></i></a>   
<?php endif;?>

<p class="lable"><?php echo $Info['r_content'] ?></p>
<?php endforeach; ?>

<form  onsubmit="return check__Enter()" method="post" action="Add Enquiry .php" >
<div class="input-container"> 
<input class="input-field reply_text" name="replyText" type="text" placeholder="Reply" >
<button type="submit" class="icon" name="reply" >Reply</button>
</div>
</form>
</div>
<?php endforeach; ?>

</main>



</body>
  

<script>
/*******************for delet confirm***********************/
function check__Enter() {
                const id = document.getElementById("id").value;
                const idr = document.getElementById("idr").value;

               
                if(id==""){
                alert("  please enter Enquiries ");
                return false
                 } }

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
</html>
