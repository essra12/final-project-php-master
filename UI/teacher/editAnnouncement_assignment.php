<?php
include("../../path.php"); 
include(MAIN_PATH."/controls/add_announcement_assignment.php"); 
include(MAIN_PATH."/controls/edit_Announcement_assignment.php"); 
//to get group name
$sql="SELECT g_name FROM groups Where g_no='$groupNumber';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
////////////////////////////////////////////////////////////////////////
/** تم احضار البيانات  من  قاعدة البيانات و عرضها داخل الحقول  */
$Announcment= $_SESSION['announcment'];
              $datatim= $_SESSION['Datetime'];
              $DUEDATE= $_SESSION['dueDate'];
              $GRADE= $_SESSION['grade'];

              $new_date = date('Y-m-d', strtotime( $DUEDATE));
              

//////////////////////////////////////////////////////////////////////

?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Announcement_ssignment</title>
    <meta charset="utf-8">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../css/add_announcement_assignments.css" /> 
     <!--icon8-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

    <body>
        
    <!------Navigation Bar -------->  
    <nav class="navbar">
      <ul class="lift-side">
          <!-------back------>
          <li><div class="back"><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $groupNumber?>"><i class="las la-arrow-left"></i></a></div></li>
          <!----------------->

          <!-------logo------>
          <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
          <!----------------->

      </ul>
      <div class="navbar-links">
        <ul>
          <!----group name--->
          <li><a href="../group/inside_group.php?data=<?= $g_name?>&number=<?= $groupNumber?>"><?php  echo $g_name ?></a></li>
          <!----------------->

          <!-----students--->
          <?php if ($_SESSION['role']=="teacher"): ?> 
          <li><a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>" style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
          <?php endif; ?>  
          <!--------------->
          
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

        <!-- For Errors message-->
        <?php if(count($errors)> 0): ?>
        <div class="msg error" style="color: #D92A2A; margin-bottom: 20px;"> 
            <?php foreach($errors as $error): ?>
            <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
            <?php endforeach;  ?>
        </div> 
        <?php endif; ?> 
        <!------------------------>

        <div class="title">
            <h1 style="color: #222242;">Edit Announcement</h1>
        </div>

        <form action="" method="POST" enctype='multipart/form-data' onsubmit="return check_Enter(this)">
            
          
          <!-- Text field -->
          <div class="inputs assignment_announcement">

            <!--text-->
            <div class="container_text_input">
                <label style="color: #222242; margin-left: .5rem;">Text</label>
                <div class="text_input">
                    <textarea type="text" name="an_content" id="content" maxlength="250" style="font-size: 20px;"><?php echo $Announcment; ?></textarea>
                </div>
            </div>
            <!-------->

            <!--date & grade-->
            <div class="container_date_grade_input">
                <div class="date_input">
                    <label style="color: #222242; margin-left: .5rem;">Due date</label>
                    <input type="date"  name="due_date" style="font-size: 20px; "  value="<?php echo  $new_date; ?>"  required />

                </div>
                <div class="grade_input">
                    <label style="color: #222242;">Out Of</label>
                    <input type="text" name="an_grade" id="grade" maxlength="5" style="font-size: 20px;" onkeypress="return isNumberKey(this, event);" value="<?php echo  $GRADE; ?>"/>
                </div>
            </div>
            <!-------->      

            <!-- Button -->
            <div class="btn_post">
                <button type="submit" name="edit_announcement_assignment" >edit</button>
            </div>
            <!----------->   
          </div>
          <!------------------>
                   

        </form>
              
      </div>
      <!-----------end main container---------->

      <script>
        /*********************current date**********************/
          const dateInput = document.getElementById('date');

          dateInput.value = formatDate();

          console.log(formatDate());

          function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
          }

          function formatDate(date = new Date()) {
            return [
              date.getFullYear(),
              padTo2Digits(date.getMonth() + 1),
              padTo2Digits(date.getDate()),
            ].join('-');
          }
        /***********************************************************/
        /*********************check for entres**********************/
        function check_Enter() {
            const content = document.getElementById("content").value;
            const grade = document.getElementById("grade").value;
            if(content==""){
              alert(" Please enter Text");
              return false;
            }
            if(grade==""){
              alert(" Please enter grade");
              return false;
            }
        }

        function isNumberKey(txt, evt) {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode == 46) {
            //Check if the text already contains the . character
            if (txt.value.indexOf('.') === -1) {
              return true;
            } else {
              return false;
            }
          } else {
            if (charCode > 31 &&(charCode < 48 || charCode > 57)){
              alert(" pleas enter Just Number");
              return false;
            }
          }
          return true;
        }
        /***********************************************************/

      </script>

    </body>
</html>