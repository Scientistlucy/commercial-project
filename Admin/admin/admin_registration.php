<?php
include('C:\xampp\htdocs\Ecommerce Website\includes\connect.php');
include('C:\xampp\htdocs\Ecommerce Website\Admin\functions\common_function.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
      <!--boostrap css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
   <div class="container-fluid m-3">
    <h2 class="text-center">New Admin Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
           <form action="" method="post" enctype="multipart/form-data">

           <!--username field-->
        <div class="form-outline mb-4">
          <label for="user_username"class="form-label">Username</label> 
          <input type="text" id="user_username" class="form-control" placeholder="enter your username" autocomplete="off"required="required" name="user_username"> 
        </div>

        <!--email field-->
        <div class="form-outline mb-4">
          <label for="user_email"class="form-label">Email</label> 
          <input type="email" id="user_email" class="form-control" placeholder="enter your email" autocomplete="off"required="required" name="user_email"> 
        </div>

         <!--password field-->
         <div class="form-outline mb-4">
          <label for="user_password"class="form-label">Password</label> 
          <input type="password" id="user_email" class="form-control" placeholder="enter your password" autocomplete="off"required="required" name="user_password"> 
        </div>
        <!-- confirm password-->
        <div class="form-outline mb-4">
          <label for="conf_user_password"class="form-label">Confirm Password</label> 
          <input type="password" id="conf_user_email" class="form-control" placeholder="Confirm password" autocomplete="off"required="required" name="conf_user_password"> 
        </div>

         

         <!--contact field-->
        
        <div class="mt-4 pt-2">
            <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="adminlogin.php" class="">login</a></p>
        </div>
           </form> 
        </div>
    </div>
   </div> 
</body>
</html>

<!--php code-->
<?php
if(isset($_POST['user_register'])){
  $user_username=$_POST['user_username']; 
  $user_email=$_POST['user_email']; 
  $user_password=$_POST['user_password'];
  $conf_user_password=$_POST['conf_user_password'];
 

//select query
$select_query="SELECT  	user_username FROM admin_table WHERE 	user_username='$user_username' or user_email='$user_email' ";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo"<script>alert('Username and Email already exist')</script>";
}
else if($user_password!=$conf_user_password){
  echo"<script>alert('passwords do not match')</script>";
}

else{
    
  
$insert_query="INSERT INTO  admin_table (user_username, user_email, user_password) VALUES('$user_username','$user_email','$user_password'
)";
$sql_excute=mysqli_query($con,$insert_query);


}

//selecting cart items
$select_cart_items="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
 $_SESSION['username']=$user_username;
  echo"<script>alert('You have items in your cart')</script>";
  echo"<script>window.open('checkout.php','_self')</script>";
}else{
  echo"<script>window.open('index.php','_self')</script>";
}

}

?>