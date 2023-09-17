
<?php
include('C:\xampp\htdocs\Ecommerce Website\includes\connect.php');
include('C:\xampp\htdocs\Ecommerce Website\Admin\functions\common_function.php');
@session_start();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
      <!--boostrap css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
   <div class="container-fluid m-3">
    <h2 class="text-center"> Admin Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-6">
           <form action="" method="post" enctype="multpart/form-data">
            
           <!--username field-->
        <div class="form-outline mb-4">
          <label for="user_username"class="form-label">Username</label> 
          <input type="text" id="user_username" class="form-control" placeholder="enter your username" autocomplete="off"required="required" name="user_username"> 
        </div>

       

         <!--password field-->
         <div class="form-outline mb-4">
          <label for="user_password"class="form-label">Password</label> 
          <input type="password" id="user_email" class="form-control" placeholder="enter your password" autocomplete="off"required="required" name="user_password"> 
        </div>
       
        <div class="mt-4 pt-2">
            <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?<a href="admin_registration.php" class="text-danger"> Register</a></p>
        </div>
           </form> 
        </div>
    </div>
   </div> 
</body>
</html>
<?php
if(isset($_POST['user_login'])){
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];
$select_query="SELECT  user_username FROM admin_table WHERE user_username='$user_username' or user_password='$user_password'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);




if($row_count>0){
   $_SESSION['username']=$user_username;
if(  $row_count==1 AND $row_count_cart==0){
   $_SESSION['username']=$user_username;
   echo"<script>alert('login successful')</script>";
   echo"<script>window.open('index.php','_self')</script>";
}
}else{
   echo"<script>alert('Invalid Credintials')</script>";
}
}
?>

