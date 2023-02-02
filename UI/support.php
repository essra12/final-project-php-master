<?php
include("../path.php");  

?>
<html>
    <head>
        <meta charset="UTF-8">
        <!--for logo-->
        <link rel="shortcut icon" href="../sources/image/logo_bar.png">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <title>Support</title>
        <link rel="stylesheet" href="../css/support.css">
          <!--icon8-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!--file icon-->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>     
    </head>
    <style>
      .main-container{
        margin: 25px 250px;
      }
    </style>  

    <body>
 <!--------------------navigation_bar ----------------------->  
 <nav class="navbar">
  <ul class="lift-side">
      
    <!-------back------>
    <li><div class="back"><a href="group/main page for group.php"><i class="las la-arrow-left"></i></a></div></li> 
    <!----------------->

    <!-------logo------>
    <li><div class="brand-title"><img src="../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
    <!----------------->

  </ul>
  <div class="navbar-links">
    <ul>
        
      <!------HOME------>
      <li><a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>" style="font-size: 1.5rem;"><i class="las la-home"></i></a></li>
      <!---------------->

      <!------Logout----->
      <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
      <!----------------->
    </ul>
  </div>
</nav>
 <!---------------------------------------------------------->
        <!-- header div-->
        <section class="first">
            <div class="left_pc">
                <img src="../sources/image/support_left.png" style="width: 100%;" />
            </div>
            <div class="center_info">
                <img src="../sources/image/google-docs.png" style="width: 64px; margin-bottom:20px;" />
                <h1> Get started with Study Board </h1>
                <p> Learn how to use Study Board to foster group collaboration, manage syllabuses, and more. </p>
                <div class="watch">
                    <p style="margin-top:20px; font-size:20px; color:#507def; cursor: pointer;"><a><i class="las la-play"></i><span color="#000;">Watch video</span></a></p>
                </div>
            </div>
            <div class="right_pc">
                <img src="../sources/image/support_right.png" style="width: 100%;" />
            </div>
        </section>
        <!---------------------------->

        <!-- second div-->
        <section class="second">
            <div class="second_title">
                <p>GETTING STARTED</p>
                <h2>Check out quick videos to get you going</h2>
            </div>
            <div class="vedio">
                <video width="80%" style="margin-top: 2rem;"  controls>
                    <source src="movie.mp4" type="video/mp4">
                    There was an error uploading the video
                </video>    
            </div>
        </section>
        <!---------------------------->
        <!-- third div-->
        <section class="third">
            <div class="third_title">
                <p>GETTING STARTED</p>
                <h2>Check out quick videos to get you going</h2>
            </div>
            <div class="links_container">
                <div class="google_links">
                    <div><img src="../sources/image/google.png" style="width: 36px; margin-right: 15px;" /><h2>Google</h2></div>
                    <br/>
                    <p><a href="https://www.youtube.com/watch?v=RzNVGQYOmFk" style="margin-top:30px" >How your students can use Google Docs</a></p>
                    <p><a href="https://www.youtube.com/watch?v=vZCvyCGCJVw&list=PLwXXOxvDboea6SnnRK4ToVXb-tDLn_mfZ&index=2">How your students can use Google Slides</a></p>
                    <p><a href="https://www.youtube.com/watch?v=N2opj8XzYBY">How your students can use Google Sheets</a></p>
                </div>
                <div class="microsoft_links">
                    <div><img src="../sources/image/microsoft.png" style="width: 36px; margin-right: 15px;" /><h2>Microsoft</h2></div>
                    <br/>
                    <p><a href="https://www.youtube.com/watch?app=desktop&v=wy7Hj84MCeA">How your students can use Microsoft Word</a></p>
                    <p><a href="https://www.youtube.com/watch?v=Vl0H-qTclOg">How your students can use Microsoft Excel</a></p>
                    <p><a href="https://www.youtube.com/watch?v=YLDHRUV8-zs">How your students can use Microsoft PowerPoint</a></p>
                </div>
            </div>
        </section>
        <!---------------------------->
     
</body>
</html>