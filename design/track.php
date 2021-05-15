<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="login_details";
$con=mysqli_connect($host,$user,$password,$db);
$id=$_SESSION['Id'];
$query="select * from file where id='".$id."'";
$result=  mysqli_query($con,$query);
set_time_limit(500); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Track_page</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
 <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/aos.css" rel="stylesheet">
  <link href="selection_style.css" rel="stylesheet">


</head>

<body>
<img id="img_gitam" src="gitam_logo.jpg" width="1100" height="120">
<a href="logout.php"><button style = "float:right;" class="button"><span id="font1">LogOut </span></button></a>
<main id="main">
<form method="POST"  >
  <section id="why-us" class="why-us">
      <div class="container">
          <div class="row">


<?php
            if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
              $fid = $row["fileid"] ;
              $fname = $row["fname"] ;
              

                ?> 
         <div class="col-sm-10 col-md-10 col-lg-10" data-aos="fade-up">
            <div class="box">
            <span><?php echo $fid?></span>
              <span><?php echo $fname?> </span>       
                     
                     <input style="float:right;" type="submit" name="<?php echo $fid; ?>" value="track"> 
                </div>
                  </div>
                <?php

                
            }
         }
          

        ?>
        
        </div>
      </div>
    </section><!-- End Why Us Section -->
</form>
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
<?php
 extract($_REQUEST);
$query="select fileid from file where id='".$id."'";
$result=  mysqli_query($con,$query);

while($row = mysqli_fetch_assoc($result)) {
   $rid=$row["fileid"];
   if(isset($_POST[$rid]))
   {
      $_SESSION["rid"] = $rid;
      ?>
      <script>
     
       location.replace("next_track.php");
      </script>
         <?php
     
   }
}
?>

</body>
</html>







