<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/inside_group.php");
/////////////////////
$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];
////////////////////
?>

<!DOCTYPE html>
<head>
    <title>Group</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="../../css/inside_group.css">
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<!-- to add a library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    <style>
        body{background-color: #a4d2f096;}
        .header-div{background-color: #fff;}

        .dropdown{
            display:inline-block;
            position:relative;
        }
        .dropdown div{
            background-color:#fff;
            box-shadow:0 4px 8px rgba(0,0,0,0.2);
            z-index:1;
            visibility:hidden;
            position:absolute;
            min-width:100%;
            opacity:0;
            transition:.3s;
        }
        .dropdown:hover div{
            visibility:visible;
            opacity:1;
        }
        .dropdown div a{
            display:block;
            text-decoration:none;
            padding:8px;
            color:#000;
            transition:.1s;
            white-space:nowrap;
            margin-left:0px;
        }
        .dropdown div a:hover{
            background-color:#222242;
            color:#fff;
        }

    </style>

    </head>    
<html>
<body>
 <!--------------------navigation_bar ----------------------->  
 <?php include(MAIN_PATH."/common/navigation.php"); ?> 
 <!---------------------------------------------------------->
       <!-- header div-->
       <div class="header-div">
			 
            <h1><?php echo $data ?></h1>
			<div class="group_info">
             <h3>Teacher Name: <?php echo  $teacher_name ?></h3>
			 <h3>Group Code:    <?php echo $group_no ?></h3>
			</div>
            
            <!-------------------- (+) button------------------------------->
            <?php if($role==""):?>
            <a href="../student/add asignment.php?g_no=<?= $group_no?>">
                <button class="btn-create">+</button>
            </a>
            <?php endif;?>
            
            <?php if($role=="teacher"):?>
                <div class="dropdown">
                    <button class="btn-create">+</button>
                    <div>
                        <a href="../teacher/add material.php?g_no=<?= $group_no?>">Material</a>
                        <a href="#">Notification</a>
                    </div>
                </div>
            <?php endif;?>    
            <!------------------------------------------------------------->
        </div>
           
         <!-- ************************************************************************************* -->
		 <main>
		 <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
       <div class="carousel">

	   <a href="<?php echo BASE_URL . '/UI/student/materials.php' ?>">
		<img id="img1" onmouseover="setNewImage1(this)" onmouseout="setOldImage()" src="../../sources/image/4.jpg" alt="img" draggable="false">
        </a>
    	<a href="<?php echo BASE_URL . '/UI/student/Assignments for student.php' ?>">
		<img id="img2" onmouseover="setNewImage2(this)" onmouseout="setOldImage()" src="../../sources/image/2.jpg" alt="img" draggable="false">
        </a>
		<a href="<?php echo BASE_URL . '/UI/student/add asignment.php' ?>">
		<img id="img3" onmouseover="setNewImage3(this)" onmouseout="setOldImage()" src="../../sources/image/3.jpg" alt="img" draggable="false">
        </a>
		<a href="<?php echo BASE_URL . '/UI/student/add asignment.php' ?>">
		<img id="img4" onmouseover="setNewImage4(this)" onmouseout="setOldImage()" src="../../sources/image/5.jpg" alt="img" draggable="false">
        </a>
             
      </div>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
    <main>    
        





<!-- java script for current date -->
<!---js section for image slider--->
    <script>
     const carousel = document.querySelector(".carousel"),
firstImg = carousel.querySelectorAll("img")[0],
arrowIcons = document.querySelectorAll(".wrapper i");
let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;
const showHideIcons = () => {
    // showing and hiding prev/next icon according to carousel scroll left value
    let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
    arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
    arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
}
arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth + 14; // getting first img width & adding 14 margin value
        // if clicked icon is left, reduce width value from the carousel scroll left else add to it
        carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
    });
});
const autoSlide = () => {
    // if there is no image left to scroll then return from here
    if(carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0) return;
    positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
    let firstImgWidth = firstImg.clientWidth + 14;
    // getting difference value that needs to add or reduce from carousel left to take middle img center
    let valDifference = firstImgWidth - positionDiff;
    if(carousel.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
        return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    }
    // if user is scrolling to the left
    carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
}
const dragStart = (e) => {
    // updatating global variables value on mouse down event
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = carousel.scrollLeft;
}
const dragging = (e) => {
    // scrolling images/carousel to left according to mouse pointer
    if(!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    carousel.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
}
const dragStop = () => {
    isDragStart = false;
    carousel.classList.remove("dragging");
    if(!isDragging) return;
    isDragging = false;
    autoSlide();
}
carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("touchstart", dragStart);
document.addEventListener("mousemove", dragging);
carousel.addEventListener("touchmove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("touchend", dragStop);
 //-------------------------------------------------------------------------------
 function setNewImage1(){  document.getElementById("img1").src="../../sources/image/img4.png";} 
 function setNewImage2(){document.getElementById("img2").src="../../sources/image/img2.png";}
 function setNewImage3(){document.getElementById("img3").src="../../sources/image/img3.png";}
 function setNewImage4(){document.getElementById("img4").src="../../sources/image/img5.png";}

 function setOldImage(){
    document.getElementById("img1").src="../../sources/image/4.jpg";
    document.getElementById("img2").src="../../sources/image/2.jpg";
    document.getElementById("img3").src="../../sources/image/3.jpg";
    document.getElementById("img4").src="../../sources/image/5.jpg";
 }
    </script>
      
</body>
</html>