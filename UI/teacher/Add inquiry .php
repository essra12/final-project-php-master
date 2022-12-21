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
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  font-family: "Poppins", sans-serif;
}
 .cardst{
  background-color: #e5f3fe;
}
.card{
  background-color: #e5f3fe;
 
}
.Inquiry{
outline: none;
border: none;
}

.reply{
  outline: none;
border: none;
}

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
<input class=" Inquiry " type="text" placeholder="Inquiry" style="    padding-left: 2%;
" />
<input class="btpost" type="submit" />
</div>
<!-- student Inquiries  card   -->
<main>

<div class="cardst">
<label class="studentname"> Essra Sowan</label>
<i style="font-size: 27px;position:absolute;right: 15%;margin-top: 2%; color:red;" class="las la-times-circle"></i>

<p>Lorem ipsum is placeholder text commonly used in the graphic, print,</p>
<hr>
<p class="lable">Lorem ipsum is placeholder text </p>
<input class="reply" type="text"  placeholder="Reply"/>
<i id="deleteicon1" style="font-size: 27px;position:absolute;right:15%;margin-top: 2%; color:red;" class="las la-times-circle"></i>

</div>



<div class="cardst">
<label class="studentname"> Essra Sowan</label>
<i style="font-size: 27px;position:absolute;right: 15%;margin-top: 2%; color:red;" class="las la-times-circle"></i>
<p>Lorem ipsum is placeholder text commonly used in the graphic, print,</p>
<hr>
<p class="lable">Lorem ipsum is placeholder text </p>
<input class="reply" type="text"  placeholder="Reply"/>
<i id="deleteicon1" style="font-size: 27px;position:absolute;right:15%;margin-top: 2%; color:red;" class="las la-times-circle"></i>
</div>


<div class="cardst">
<label class="studentname"> Essra Sowan</label>
<i style="font-size: 27px;position:absolute;right: 15%;margin-top: 2%; color:red;" class="las la-times-circle"></i>
<p>Lorem ipsum is placeholder text commonly used in the graphic, print,</p>
<hr>
<p class="lable">Lorem ipsum is placeholder text </p>
<input class="reply" type="text"  placeholder="Reply"/>
<i id="deleteicon1" style="font-size: 27px;position:absolute;right:15%;margin-top: 2%; color:red;" class="las la-times-circle"></i>
</div>

   




</main>

</form>
  </body>
</html>
