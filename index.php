<!--connect file-->
<?php
include('C:\xampp\htdocs\Ecommerce Website\includes\connect.php');
include('C:\xampp\htdocs\Ecommerce Website\Admin\functions\common_function.php');
session_start();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website</title>
  <!--boostrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!--font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style.css">
  <style>


  </style>

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
            <?php
             if (isset($_SESSION['username'])){
              echo "<li class='nav-item'>
              <a class='nav-link' href='includes/users_area/profile.php'>My Account</a>
            </li>";
             }else{
              echo"<li class='nav-item'>
              <a class='nav-link' href='includes/users_area/userregistration.php'>Register</a>
            </li>";
             }
            
            
            
            
            ?>
          
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price kshs <?php
                                                            total_cart_price();
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

        if (!isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
  <a  class='nav-link'href='#'>Welcome Customer</a>
</li>";
        } else {
          echo " <li class='nav-item'>
  <a  class='nav-link'href='#'>welcome " . $_SESSION['username'] . "</a>
</li>";
        }

        if (!isset($_SESSION['username'])) {
          echo " <li class='nav-item'>
      <a  class='nav-link'href='includes\users_area\userlogin.php'>Login</a>
    </li>";
        } else {
          echo " <li class='nav-item'>
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
    <!--fourth child-->
    <div class="row">
      <div class="col-md-10">
        <!--products-->
        <div class="row">
          <!--fetching products-->
          <?php
          //calling the function for getting the products
          getproducts();
          get_unique_categories();
          get_unique_brands();
          $ip = getIPAddress();
          echo 'User Real IP Address - ' . $ip;
          ?>
          <!--row end-->
        </div>
        <!--col end-->
      </div>
      <div class="col-md-2 bg-dark p-0">
        <!--brands to be displayed-->
        <ul class="navbar-nav me-auto text-center p-0">
          <li class="nav-item bg-primary">
            <a href="#" class="nav-link text-light">
              <h4>Delivery Brands</h4>
            </a>
          </li>
          <?php
          //calling the function for getting the brands
          getbrands();
          ?>
        </ul>



        <!--categories to be displayed-->

        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-primary">
            <a href="#" class="nav-link text-light">
              <h4>Categories</h4>
            </a>
          </li>
          <?php
          //calling the function for category
          getcategories();
          ?>



        </ul>
        <!--sidenav-->
      </div>

      <!--sidenav-->
    </div>








    <!--last child-->
    <!--include footer-->
    <?php
    include('C:\xampp\htdocs\Ecommerce Website\includes\footer.php');

    ?>


  </div>
















  <!--boostrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>