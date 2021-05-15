<?php
session_start();
 
if(!isset($_SESSION["id"]))
{
  header('location:index.php');
}
echo $_SESSION["id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Selection_page</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
 <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!--  CSS Files -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
  
  <link href="css/aos.css" rel="stylesheet">

  <!-- Template  File -->
  <link href="selection_style.css" rel="stylesheet">


</head>

<body>
<img id="img_gitam" src="gitam_logo.jpg" width="1100" height="120">
<a href="logout.php"><button class="button"><span id="font1">LogOut </span></button></a>
<main id="main">
<!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up">
            <div class="box">
              <span>01</span>
			  
              <a href="submit.php"><h4>Submit Application</h4></a>
  
            </div>
          </div>
     <div class="col-lg-4">
	 </div>
	 
          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="150">
            <div class="box">
              <span>02</span>
              <a href="track.php"> <h4>Track Application</h4></a>
              
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->
</main><!-- End #main -->

  
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="jquery/jquery.min.js"></script>
  <script src="isotope-layout/isotope.pkgd.min.js"></script>
  <script src="owl.carousel/owl.carousel.min.js"></script>
  <script src="aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="selection_main.js"></script>

</body>

</html>