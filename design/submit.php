<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="login_details";
$con=mysqli_connect($host,$user,$password,$db);
if(isset($_POST['submit']))
{
$file_name=$_POST['file_name'];
$id=$_SESSION["id"];
$insert_query="insert into
file(fname,id)values('$file_name','$id'); ";
$insert_query_result=mysqli_query($con,$insert_query) or die(mysqli_error($con));

$file = $_FILES["file"];
$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

if($insert_query_result){
   
   ?>
   <script>
   alert("Susefully Submitted");
   
   </script>
   <?php

  }
  else{
   ?>
   <script>
   alert("Try again");
   
   </script>
   <?php
  }
 
  $sql = "SELECT max(fileid) FROM file";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result, MYSQLI_NUM);
    
    $count = $row[0];
    $_SESSION["fid"]=$count;
    
$name = $count;
echo $name;

move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/".$name.".".$extension);
   $insert_query="insert into
level1(fileid)values('$count'); ";
$insert_query_result=mysqli_query($con,$insert_query) or die(mysqli_error($con));



}
  

?>
   <script>
   alert(<?php echo $message ?>);
   
   </script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Submit_page</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
 <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!--  CSS Files -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/aos.css" rel="stylesheet">
  <link href="w3.css" rel="stylesheet">
<style>
  .box
  {
    background-color:  rgba(255, 0, 0, 0.836);
    align-content: center;
   
    
  }
  .cloud
  {
    display: block;
  margin-left: auto;
  margin-right: auto;
  width: 30%;
  height: 140px;
  }
body
  {
    background-color: white;
  }
  
  
</style>

</head>

<body>
  <span style="background-color: white;">
<img id="img_gitam" src="gitam_logo.jpg" width="1250" height="120">
<a href="selection.php"><button style="float: right; "class="w3-button w3-red w3-round-large">Go back >></button></a>
</span>
<div class="container">
  <div class="row">
    <div class="col-lg-3 ">
    
    </div>
    <div class="col-lg-6 mt-1 mt-lg-5">
    <div class="box">
<img class="cloud" src="cloud.png">
<form class="w3-container" method="POST" enctype="multipart/form-data">

  <label>File Name</label>
  <input class="w3-input" type="text" autocomplete="off"  placeholder="file Name" name="file_name">
  
  <p style="padding-left: 35%;background colour:black;" ><input  type="file" name="file"></p>
  

  <p style="padding-left:36% ;"> <button class="w3-button w3-black w3-hover-green" name="submit">Submit</button></p>
  </form>
 

    </div>  
    </div>  
  </div>
</div>

</body>

</html>

      
         
      
      

