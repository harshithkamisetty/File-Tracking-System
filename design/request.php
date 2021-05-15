<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="login_details";
$con=mysqli_connect($host,$user,$password,$db);
$id=$_SESSION['Id'];
$query="select fname from faculty where fid='".$id."'";
$result=  mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$tname= $row[0];
$query="select fileid from $tname where status is null";
$result=  mysqli_query($con,$query);
$result1=$result;
$files=scandir("uploads");



set_time_limit(500); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Requests_page</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!--  CSS Files -->
<link href="css/bootstrap.min.css" rel="stylesheet">


<link href="css/aos.css" rel="stylesheet">

<!-- Template  File -->
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
              $namea = $row["fileid"] . "a";
              $namer = $row["fileid"] . "r";
              $name = $row["fileid"] ;
              
             
              for($a=0;$a<count($files);$a++)
              {
                $ram=pathinfo($files[$a],PATHINFO_FILENAME);
                
               $var=0;
                if($name==$ram)
                {
                
               $var=1;
               $dowload_fname=$files[$a];
                break;
                }
              
            
              }
                
                ?>
<div class="col-sm-10 col-md-10 col-lg-15" data-aos="fade-up">
            <div class="box">
              <span><?php echo $name;?></span>
              <input style = "float:right" type="submit" name="<?php echo $namer; ?>" value="reject">
              <input style = "float:right" type="submit" name="<?php echo $namea; ?>" value="Accept">
              <?php
                   
                   if($var==1)
                    {
                      ?>
                    <a href ="uploads/<?php echo $dowload_fname ?>" target="_blank"><p style="color:black">Click here to view file!</p></a>
                    
                   <?php
                    } 
                    ?>
      
              
  
            </div>
          </div>
                <?php

              
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
$query="select fileid from $tname where status is null";
$result=  mysqli_query($con,$query);

while($row = mysqli_fetch_assoc($result)) {
  $name= $row["fileid"];
  $namea = $row["fileid"] . "a";
  $namer = $row["fileid"] . "r";
  
  if(isset($_POST[$namea]))
  {
    $query="update $tname set status = 1 where fileid = '".$name."'";
    $exe = mysqli_query($con,$query);
    
    if(!strcmp($tname,"level2"))
    {
    $query="update file set status = 2 where fileid = '".$name."'";
   $exe = mysqli_query($con,$query);
    }
    else{
      $query="update file set status = 1 where fileid = '".$name."'";
   $exe = mysqli_query($con,$query);
   $insert_query="insert into level2(fileid)values('$name'); ";
   $insert_query_result=mysqli_query($con,$insert_query) or die(mysqli_error($con));

    }
    ?> 
  <script>
   location.replace("request.php");
  </script>
  <?php 
  }
  if(isset($_POST[$namer]))
  {
    $query="update $tname set status = 0 where fileid = '".$name."'";
    $exe = mysqli_query($con,$query);
    if(!strcmp($tname,"level2"))
    {
    $query="update file set status = -2 where fileid = '".$name."'";
   $exe = mysqli_query($con,$query);
    }
    else{
      $query="update file set status = -1 where fileid = '".$name."'";
   $exe = mysqli_query($con,$query);
  echo "reject";
    }
   ?> 
   <script>
   location.replace("request.php");
  </script>
 <?php 
  }
 

   
   



}
}
    
    else{
      echo "no requests";
    }
        ?>


</body>
</html>







