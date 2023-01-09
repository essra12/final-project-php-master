<?php
include("../../path.php");  
include(MAIN_PATH."/controls/add_material_and_assignment.php");

$user_id=$_SESSION['user_id'];

//to get student id
$sql="SELECT stu_id FROM user,student Where user.user_id=student.user_id AND user.user_id='$user_id';";
$result_stu_id = $conn->query($sql);
if ($result_stu_id->num_rows == 1) {
    while($row = $result_stu_id->fetch_assoc()) {
      $stu_id=$row["stu_id"];
      /**********to get the student id in session */
      $_SESSION['stu_id']=$stu_id;
    }
}
///////////////////////

//to get text
if(isset($_GET["an_no"]))
   {
      $an_no = $_GET["an_no"];
      $sql="SELECT an_content FROM `announcement` WHERE an_no='$an_no';";
      $result_an_no = $conn->query($sql);
      if ($result_an_no->num_rows > 0) {
          while($row = $result_an_no->fetch_assoc()) {
            $an_data=$row["an_content"];
          }
      }
   }
///////////////////////

//to get group name
$sql="SELECT g_name FROM groups Where g_no='$groupNumber';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////



?>
<html>
    <head>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Assignment</title>
    <meta charset="utf-8">
    <!--for logo-->
    <link rel="shortcut icon" href="../../sources/image/logo_bar.png">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../css/add_materiial_assignment_join_dw.css" />
     <!--icon8-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
    </head>

    <body>
        
    <!------Navigation Bar -------->  
    <nav class="navbar">
      <ul class="lift-side" id="lift-side">
          <!-------back------>
          <li><div class="back"><a href="../teacher/announcement.php"><i class="las la-arrow-left"></i></a></div></li>
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

          <!-----students--->
          <li><a href="<?php echo BASE_URL . '/UI/teacher/testreqest.php' ?>" style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
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

    <!-- For Errors message-->
    <?php if(count($errors_for_assignment)> 0): ?>
      <div class="msg error" style="color: #D92A2A; margin-bottom: 20px;"> 
        <?php foreach($errors_for_assignment as $errors_for_assignment): ?>
        <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($errors_for_assignment); ?></li>
        <?php endforeach; ?>
      </div> 
    <?php endif; ?> 
    <!------------------------>

    <!-- For Succes message -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg success" style="color: #5a9d48; margin-Top: 20px;">
            <li><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
            <?php
            /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>
    <!------------------------->
        <div class="title">
            <h1 style="color: #222242;">Add Assignment</h1>
        </div>

        <form action="" method="POST" enctype='multipart/form-data' onsubmit="return check_Enter(this)">
            
         <!-- text field -->
         <div class="inputs ">
            <textarea type="text" name="text" disabled="disabled" style=" border: none;" rows="3"><?php echo $an_data?></textarea>
          </div>
          <!------------------>

          <!-- Id field -->
          <!-- <div class="inputs id">
            <label style="color: #222242;">Student ID</label>
            <input type="text" name="stu_id"  disabled="disabled" style=" border: none;" value="<?php /* echo $stu_id */?>">
          </div> -->
          <!------------------>

          <!-- title field -->
          <div class="inputs title">
            <label style="color: #222242;">Title</label>
            <textarea type="text" name="title" maxlength="225" id="title" rows="2"><?php echo $title;?></textarea>
          </div>
          <!------------------>
          
          <!-- description field -->
          <div class="inputs description">
            <label style="color: #222242;">Description<span style="font-size: 16px;">(optional)</span></label>
            <textarea type="text" name="description" id="description"  rows="4"><?php echo $description;?></textarea>
          </div>
          <!------------------>

          <!-- attach field -->
          <div class="inputs attach">
            <label style="color: #222242;">Attach</label>
            
            <div class="container_wrapper">

              <div class="container" style="border-radius: 15px;">
                  <div style="margin-bottom:20px"><p style="font-size:12px;">To select more than one file, hold on Ctrl or Shift</p></div>            
                  <input id="file-input" name="f_name[]" type="file" multiple="multiple" />
                  <label class="lab" for="file-input">
                      <i class="fa-solid fa-arrow-up-from-bracket"></i>
                  </label>
                  <div id="num-of-files">No Files Choosen</div>
                  <ul id="files-list"></ul>
              </div>

              <!--the errors-->
              <p id="demo"></p>

              <!-- Button -->
              <div class="btn_post">
                <button type="submit" name="add_assignment" >Submit</button>
              </div>
              <!----------->

            </div>
            
          </div>
        <!-------end attach----------->

        </form>
              
      </div>
      <!-----------end main container---------->

      <!-- Script -->
      <!-- <script src="../../javaScript/upload_files.js"></script> -->

<script>
  let fileInput = document.getElementById("file-input");
  let fileList = document.getElementById("files-list");
  let numOfFiles = document.getElementById("num-of-files");

  let x =document.getElementById("f_name");

  const currentIndex = 0;

  fileInput.addEventListener("change", () => {
    fileList.innerHTML = "";
    numOfFiles.textContent = `${fileInput.files.length} Files Selected`; 
    const fileListArr = Array.from(fileInput.files)

    for (i of fileListArr) {
      let reader = new FileReader();
      let listItem = document.createElement("li");
      let fileName = i.name;
      let fileSize = (i.size / 1024).toFixed(1);
      let index =fileListArr.indexOf(i);
      
      // Creates a delete button 
      let deleteButton = document.createElement("span")
      deleteButton.innerHTML='<i class="lar la-times-circle"></i>'; 
      ///////////////////////////

          //add a click event to remove the current item
          deleteButton.addEventListener("click", function() {
            listItem.remove();
            
            //XXXXXXX New Code to delete file form input html XXXXXXX///
            var attachments = document.getElementById("file-input").files; // <-- reference your file input here
            var fileBuffer = new DataTransfer();
          
            // append the file list to an array iteratively
            for (let i = 0; i < attachments.length; i++) {
                // Exclude file in specified index
                if (index !== i)
                    fileBuffer.items.add(attachments[i]);
            }
            
            // Assign buffer to file input
            document.getElementById("file-input").files = fileBuffer.files; // <-- according to your file input reference
            //XXXXXXX New Code to delete file form input html XXXXXXX///
            numOfFiles.textContent = `${fileBuffer.files.length} Files Selected`; 

          });
          //////////////////////////////////////////////

      listItem.innerHTML = `<p><i class="fas fa-file-alt"></i>${fileName}</p><p>${fileSize}KB</p>`;

      //add remove item to list
      listItem.appendChild(deleteButton);
      /////////////////////////

      if (fileSize >= 1024) {
        fileSize = (fileSize / 1024).toFixed(1);
        listItem.innerHTML = `<p><i class="fas fa-file-alt"></i>${fileName}</p><p>${fileSize}MB</p>`;
      }
      fileList.appendChild(listItem);
    
    }
  
    
  }); 

  /********************************************* check enters *********************************/
  function check_Enter() {
  const title = document.getElementById("title").value;
  if(title==""){
      /* alert(" please enter Title"); */
      document.getElementById("demo").innerHTML = "<i class='las la-exclamation-circle'></i>&nbsp;&nbsp;please enter Title."; 
      return false;
  }

  }

</script>

    </body>
</html>