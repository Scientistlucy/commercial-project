<?php
include('C:\xampp\htdocs\Ecommerce Website\includes\connect.php');
include('C:\xampp\htdocs\Ecommerce Website\Admin\functions\common_function.php');
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!--boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<!--navbar-->
<div class="contaner-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
  <img src="./images/logo.jpg" alt="" class="logo"> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="displayallproducts.php">Products</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="includes/users_area/userregistration.php">Register</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price kshs <?php
           total_cart_price() ;
          ?>/-</a>
        </li>
       
      </ul>
      <form class="d-flex" action="searchproduct.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!--calling cart function-->

<?php
cart();


?>
<!--second child-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <ul class="navbar-nav me-auto">
   
    <?php

if(!isset($_SESSION['username'])){
  echo"<li class='nav-item'>
  <a  class='nav-link'href='#'>Welcome Customer</a>
</li>";
}
else{
  echo" <li class='nav-item'>
  <a  class='nav-link'href='#'>welcome ". $_SESSION['username']."</a>
</li>";
}
    
    if(!isset($_SESSION['username'])){
      echo" <li class='nav-item'>
      <a  class='nav-link'href='includes\users_area\userlogin.php'>Login</a>
    </li>";
    }
    else{
      echo" <li class='nav-item'>
      <a  class='nav-link'href='includes\users_area\logout.php'>Logout</a>
    </li>";
    }
    
    ?>
  </ul>
</nav>
<!--third child-->
<div class="bg-light">
  <h3 class="text-center">L.W.M Online shop</h3>
  <p class="text-center">Your Destination For Quality</p>
</div>














    <!--php code to access user id-->
    <?php
    $user_ip=getIPAddress();
    $get_user="SELECT *FROM user_table WHERE user_ip='$user_ip'";
    $result=mysqli_query($con, $get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    
    ?>
    <div class="container">
        <h2 class="text-center text-primary">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
       
<div class="col-md-6">

</div>
<div class="col-md-6">
    <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center">Pay Offline</h2></a>

</div>
</div>
    </div>
 
</body>
<?php
include('C:\xampp\htdocs\Ecommerce Website\includes\footer.php');

?>
</html>