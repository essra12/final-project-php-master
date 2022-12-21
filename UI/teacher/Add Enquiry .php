<?php
include("../../path.php"); 
include(MAIN_PATH."/controls/add_material_and_assignment.php"); 

?>
<html lang="en">
  <head>
   
  <link rel="stylesheet" href="../../css/assignments-student.css"> 
  <link rel="stylesheet" href="../../css/Add-enquiry.css"> 
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 </head>
 <style> 
 @media only screen and (max-width:700px)
    {
     i{
    font-size: 14px;
    margin-right: 0;
     }}
     i:hover{
        color: red;
        font-size: 35px;  
    }
 .btpost:hover{
  cursor: pointer;
  background-color: white;
 }
</style>
  <body>

    <!--Navigation Bar -->  
        <?php include(MAIN_PATH."/common/navigation.php"); ?> 
    <!------------------->

<form  onsubmit="return check__Enter(this)"  >

<label class="Inquirieslable">Enquiries </label>
<!-- AddInquiry card   -->
<div class="card">
<label class="AddInquiry">Add Enquiry</label>
<input class=" Inquiry"  id="id" type="text" placeholder="Enquiry" style="    padding-left: 2%;
" />
<input class="btpost" style="background-color: #222242;" type="submit" />
</div>
<!-- student Inquiries  card   -->
<main>

<div class="cardst">
<label class="studentname"> Essra Sowan</label>
<!--<i style="font-size: 27px;position:absolute;right: 15%;margin-top: 2%; color:red;" class="las la-times-circle"></i>-->
<a  onclick="return confirmDelete()"  href="Add Enquiry .php"><i class="las la-trash-alt ticon delet"style="font-size: 25px;position:absolute;right: 22%;margin-top: 0%; color:#222242;"></i></a>
<p>Lorem ipsum is placeholder text commonly used in the graphic, print,</p>
<hr>
<a onclick="return confirmDelete()"  href="Add Enquiry .php"><i id="deleteicon1" style="font-size: 22px;position:absolute;right:22% ;margin-top: 1%; color:#222242;" class="las la-times-circle"></i></a>
<p class="lable">Lorem ipsum is placeholder text </p>
<input class="reply" id="idr" type="text"  placeholder="Reply"/>
</div>



<div class="cardst">
<label class="studentname"> Essra Sowan</label>
<!--<i style="font-size: 27px;position:absolute;right: 15%;margin-top: 2%; color:red;" class="las la-times-circle"></i>-->
<a  onclick="return confirmDelete()"  href="Add Enquiry .php"><i class="las la-trash-alt ticon delet"style="font-size: 25px;position:absolute;right: 22%;margin-top: 0%; color:#222242;"></i></a>
<p>Lorem ipsum is placeholder text commonly used in the graphic, print,</p>
<hr>
<a onclick="return confirmDelete()"  href="Add Enquiry .php"><i id="deleteicon1" style="font-size: 22px;position:absolute;right:22% ;margin-top: 1%; color:#222242;" class="las la-times-circle"></i></a>
<p class="lable">Lorem ipsum is placeholder text </p>
<input class="reply" id="idr" type="text"  placeholder="Reply"/>
</div>



</main>

</form>
  </body>
  

  <script>
/*******************for delet confirm***********************/
function check__Enter() {
                const id = document.getElementById("id").value;
                const idr = document.getElementById("idr").value;

               
                if(id==""){
                alert("  pleas enter Enquiries ");
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
