<?php
include("../../path.php"); 
include(MAIN_PATH."/controls/inside_reports.php"); 
$groupNumber=$_SESSION['g_no'];

//to get group name
$sql="SELECT g_name FROM groups Where g_no='$groupNumber';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////

$an_number=an_no();
//to get grade out of name
$sql="SELECT announcement.grade FROM announcement WHERE an_no='$an_number';";
$result_out_of = $conn->query($sql);
if ($result_out_of->num_rows == 1) {
    while($row = $result_out_of->fetch_assoc()) {
      $out_of=$row["grade"];
    }
}
///////////////////////////
//to get announcement text
$sql="SELECT an_content FROM announcement Where an_no='$an_number';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows > 0) {
    while($row = $result_g_name->fetch_assoc()) {
      $an_content=$row["an_content"];
    }
}
///////////////////////////
$search="";
if(isset($_POST['search'])){
    if(!empty($_POST['find_stu']))
    {
        $search=$_POST['find_stu'];
        $students=search($an_number,$search);
    }
}
else{
    $students=selectAllStudntHaveAssignment($an_number);
}

/* $students=selectAllStudntHaveAssignment($an_number); */

?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report</title>
    <meta charset="utf-8">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../css/inside_reports.css" /> 
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

<style>
    #print:hover{
        cursor: pointer;
        font-size: 18px;
    }
    #print{
        margin-left: 80%;
        font-size: 16px;
    }
</style>
    <body>
        
    <!------Navigation Bar -------->  
    <nav class="navbar">
      <ul class="lift-side">
          <!-------back------>
          <li><div class="back"><a href="../teacher/reports.php"><i class="las la-arrow-left"></i></a></div></li>
          <!----------------->

          <!-------logo------>
          <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
          <!----------------->

      </ul>
      <div class="navbar-links">
        <ul>
          <!----group name--->
          <li><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $groupNumber?>"><?php echo $g_name ?></a></li>
          <!----------------->

          <!-----students---->
          <?php   if ($_SESSION['role']=="teacher"): ?> 
          <li><a href="<?php  echo BASE_URL . '/UI/teacher/testreqest.php' ?>" style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
          <?php   endif; ?>  
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
    <!--------------------------------->

    <!--------main-container----------->
    <div class="main-container">

        <div class="title">
            <h1 style="color: #222242;">Report</h1>
        </div>

        <form action="" method="POST"  onsubmit="return check_Enter(this)">  
            <!--serch bar-->
            <div class="search">
                <input type="text" value="<?php echo $search;?>" placeholder=" Enter Student ID" id="find_stu" name="find_stu" maxlength="8" onkeypress="return onlyNumberKey(event)" >
                <span class="clear-btn"><i id="clear-btn" class="fa-solid fa-xmark" onclick="ClearFields();"></i></span>
                <button type="submit" name="search">Search</button>  
            </div>
            <!------------->
            <!-- For Errors message-->
            <?php if(count($errors)> 0): ?>
            <div class="msg error" style="color: #D92A2A; margin-bottom: 20px; text-align: center;"> 
                <?php foreach($errors as $error): ?>
                <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php  echo($error); ?></li> 
                <?php endforeach; ?>
            </div> 
            <?php endif; ?> 
            <!------------------------>
        </form>

        <!--Text-->
        <div class="container_text_input">
            <label style="color: #222242; margin-left: .5rem;">Text</label>
            <div class="text_input">
                <textarea type="text" name="an_content" id="an_content" rows="3" disabled="disabled"><?php echo $an_content; ?> </textarea>
            </div>
        </div>

        <!-------->

        <!--  table for teacher  -->
        <?php if(empty($students)): 
                $students=selectAllStudntHaveAssignment($an_number);
        endif;?>  
        <?php if(!empty($students)): ?>
        <div id="report" class="table-box">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Student Id</th>
                        <th scope="col" >Student Name</th>
                        <th scope="col"style="text-align: center;">grade</th>
                      <th> <i id="print" onclick="PrintDiv() " class="fa-sharp fa-solid fa-print"></i></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($students as $key => $student):?>
                        <tr>
                            <td data-label="student ID"><?php echo $student['stu_id'] ?></td>
                            <td data-label="student name" ><img src="<?php echo BASE_URL . '/sources/image/' . $student['u_img']; ?>" class="tab-img" style="  width: 30px; height: 30px;border-radius:100%;"><?php echo $student['full_name'] ?></td>
                            <?php if (empty($student['grade'])):?>
                                <td data-label="grade" class="grade">--</td>
                            <?php endif;?>
                            <?php if (!empty($student['grade'])):?>    
                                <td data-label="grade" class="grade"><?php echo $student['grade']; ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo $out_of;?></td>
                            <?php endif;?>
                        </tr>   
                    <?php endforeach; ?>                      
                </tbody>
            </table>
        </div>
        <?php endif;?>
        <!------------------------>



              
    </div>
      <!-----------end main container---------->

      <script>
        /*********************check for entres**********************/
        function check_Enter() {
            const find_stu = document.getElementById("find_stu").value;
            if(find_stu==""){
            alert(" Please enter student ID");
            return false;
            }
        }
        function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)){
            alert(" please enter Just Number");
            return false;
        }
        return true;
        }
        /***********************************************************/
        /************************clear field************************/
        function ClearFields() {

        document.getElementById("find_stu").value = "";
        }
        /***********************************************************/
        function PrintDiv() {
       var divToPrint = document.getElementById('report');
       var popupWin = window.open('', '', 'width=600,height=300,margin-left:400px');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();       
                       }

       
 </script>  
 </script>
    </body>
</html>