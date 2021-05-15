<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="login_details";
$con=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['faculty']))
{
if(isset($_POST['Login']  ))
{
   $uname=$_POST['Id'];
   $_SESSION['Id'] = $uname;
   $password=$_POST['password'];
   $sql="select fid,password from faculty where fid= '".$uname."' AND password='".$password."'";
   $result=  mysqli_query($con,$sql);
   $no_rows=mysqli_num_rows($result);
   $_SESSION["fid"] = $uname;
   if($no_rows>0)
   {
    
   ?>
   <script>
    location.replace("request.php");
   </script>
   <?php
   }
   else
   {
      ?>
   <script>
   alert("You have Entered Wrong Crentials");
    location.replace("index.php");
   </script>
      <?php
     
   }
}
}
elseif(isset($_POST['Login']))
{
   $uname=$_POST['Id'];
   $_SESSION['Id'] = $uname;
   $password=$_POST['password'];
   $sql="select Id,password from login_data1 where Id= '".$uname."' AND password='".$password."'";
   $result=  mysqli_query($con,$sql);
   $no_rows=mysqli_num_rows($result);
   $_SESSION["id"] = $uname;
   if($no_rows>0)
   {
    
   ?>
   <script>
    location.replace("selection.php");
   </script>
   <?php
   }
   else
   {
      ?>
   <script>
   alert("You have Entered Wrong Crentials");
    location.replace("index.php");
   </script>
      <?php
     
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login form</title>
   <link rel="stylesheet" href="mystyle.css">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/fonts.css">
</head>
<body>
    <div class="row">
       <div class="col-lg-4 m-auto">
          <div class="card mt-5 bg-dark">
             <div class="card-title text-center mt-3">
               <img src="img/gitam.jpg" width="100px" height="100px"> 
             </div>
             <div class="card-body">
              <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                 <div class="input-group mb-3">
                    <div class="input-group-prepend">
                       <span class="input-group-text">
                          <i class="fa fa-user fa-2x"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control py-4" name="Id" placeholder="GitamId">
                 </div>
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text">
                        <i class="fa fa-lock fa-2x"></i>
                      </span>
                  </div>
                  <input type="password" id="myInput" class="form-control py-4" name="password" placeholder="Password">
               </div>
               <p class="text-white"><input type="checkbox" name="faculty">Faculty</p>
               <p class="text-white"><input type="checkbox" onclick="myFunction()">Show Password</p>
               <button class="btn btn-success" name="Login">Login</button>
              </form>
             </div>
          </div>
       </div>
    </div>
    <script src="myjavascript.js"></script>
</body>
</html>