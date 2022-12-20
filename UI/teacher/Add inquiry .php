<?php
include("../../path.php"); 
include(MAIN_PATH."/controls/add_material_and_assignment.php"); 

?>
<html lang="en">
  <head>
   
  <link rel="stylesheet" href="../../css/assignments-student.css"> 
  <link rel="stylesheet" href="../../css/Add-inquiry.css"> 
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 </head>
 <style> 
</style>
  <body>

    <!--Navigation Bar -->  
        <?php include(MAIN_PATH."/common/navigation.php"); ?> 
    <!------------------->

<form>

<label class="Inquirieslable">Inquiries </label>
<!-- AddInquiry card   -->
<div class="card">
<label class="AddInquiry">Add Inquiry</label>
<input class=" Inquiry " type="text"/>
<input class="btpost" type="submit" />
</div>
<!-- student Inquiries  card   -->
<main>

<div class="cardst">
<label class="studentname"> Essra Sowan</label>
<i  style="font-size: 27px;position:absolute;right: 15%;margin-top: 2%;"  class="las la-trash-alt"></i>
<p>Lorem ipsum is placeholder text commonly used in the graphic, print,</p>
<hr>
<p class="lable">Lorem ipsum is placeholder text </p>
<input class="reply" type="text"  placeholder="Reply"/>
<i id="deleteicon1" style="font-size: 27px;position:absolute;right:15%;margin-top: 2%;"  class="las la-trash-alt"></i>
</div>



<div class="cardst">
<label class="studentname"> Essra Sowan</label>
<i  style="font-size: 27px;position:absolute;right: 15%;"  class="las la-trash-alt"></i>
<p>Lorem ipsum is placeholder text commonly used in the graphic, print,</p>
<hr>
<p class="lable">Lorem ipsum is placeholder text </p>
<input class="reply" type="text"  placeholder="Reply"/>
<i id="deleteicon1" style="font-size: 27px;position:absolute;right:15%;margin-top: 2%;"  class="las la-trash-alt"></i>
</div>


<div class="cardst">
<label class="studentname"> Essra Sowan</label>
<i  style="font-size: 27px;position:absolute;right: 15%;"  class="las la-trash-alt"></i>
<p>Lorem ipsum is placeholder text commonly used in the graphic, print,</p>
<hr>
<p class="lable">Lorem ipsum is placeholder text </p>
<input class="reply" type="text"  placeholder="Reply"/>
<i id="deleteicon1" style="font-size: 27px;position:absolute;right: 15%;margin-top: 2%;"  class="las la-trash-alt"></i>
</div>

   




</main>

</form>
  </body>
</html>
