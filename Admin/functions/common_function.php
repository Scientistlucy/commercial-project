<?php


//include connect file
include('C:\xampp\htdocs\Ecommerce Website\includes\connect.php');
//getting products using functions
function getproducts(){
   global $con;
   //condition to check isset or not
   if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
    $select_query="SELECT * FROM products ORDER BY rand() LIMIT 0,9";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
  echo"<div class='col-md-4 mb-2'>
  <div class='card'>
  <img src='Admin\admin\product_images$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
  <h5 class='card-title'> $product_title</h5>
  <p class='card-text'>$product_description.</p>
  <p class='card-text'>Price:  $product_price/-</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
  <a href='#' class='btn btn-dark'>View more</a>
  </div>
  </div>
  </div>";
  
  }
}
}
}

//getting unique categories
function get_unique_categories(){
  global $con;
  //condition to check isset or not
  if(isset($_GET['category'])){
    $category_id=$_GET['category'];
   $select_query="SELECT * FROM products where category_id='$category_id'";
 $result_query=mysqli_query($con,$select_query);
 $num_of_rows=mysqli_num_rows( $result_query);
 if($num_of_rows==0){
  echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
 }
 while($row=mysqli_fetch_assoc($result_query)){
   $product_id=$row['product_id'];
   $product_title=$row['product_title'];
   $product_description=$row['product_description'];
   $category_id=$row['category_id'];
   $brand_id=$row['brand_id'];
   $product_image1=$row['product_image1'];
   $product_price=$row['product_price'];
 echo"<div class=col-md-4 mb-2>
 <div class='card'>
 <img src='Admin\admin\product_images$product_image1' class='card-img-top' alt='$product_title'>
 <div class='card-body'>
 <h5 class='card-title'> $product_title</h5>
 <p class='card-text'>$product_description.</p>
 <p class='card-text'>Price:  $product_price/-</p>
 <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
 <a href='#' class='btn btn-dark'>View more</a>
 </div>
 </div>
 </div>";
 
 }
}
}


//getting unique brands
function get_unique_brands(){
  global $con;
  //condition to check isset or not
  if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
   $select_query="SELECT * FROM products where brand_id='$brand_id'";
 $result_query=mysqli_query($con,$select_query);
 $num_of_rows=mysqli_num_rows( $result_query);
 if($num_of_rows==0){
  echo "<h2 class='text-center text-danger'>This brand is not available for service </h2>";
 }
 while($row=mysqli_fetch_assoc($result_query)){
   $product_id=$row['product_id'];
   $product_title=$row['product_title'];
   $product_description=$row['product_description'];
   $category_id=$row['category_id'];
   $brand_id=$row['brand_id'];
   $product_image1=$row['product_image1'];
   $product_price=$row['product_price'];
 echo"<div class=col-md-4 mb-2>
 <div class='card'>
 <img src='Admin\admin\product_images$product_image1' class='card-img-top' alt='$product_title'>
 <div class='card-body'>
 <h5 class='card-title'> $product_title</h5>
 <p class='card-text'>$product_description.</p>
 <p class='card-text'>Price:  $product_price/-</p>
 <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
 <a href='#' class='btn btn-dark'>View more</a>
 </div>
 </div>
 </div>";
 
 }
}
}



//displaying the brands using function in the sidenav

function getbrands(){
  global $con;
$select_brands="SELECT * FROM brands";
      $result_brands=mysqli_query($con,$select_brands);
      while($row_data=mysqli_fetch_assoc($result_brands)){
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];
        echo "<li class='nav-item text-center'>
        <a href='index.php?brand=$brand_id'class='nav-link text-light'>$brand_title<a>
        <li>";

      }}

      //displaying the categories name in the side nav using function
      function getcategories(){
        global $con;
        $select_categories="SELECT * FROM categories";
        $result_brands=mysqli_query($con,$select_categories);
        while($row_data=mysqli_fetch_assoc($result_brands)){
          $category_title=$row_data['category_title'];
          $category_id=$row_data['category_id'];
          echo "<li class='nav-item text-center'>
          <a href='index.php?category=$category_id'class='nav-link text-light'>$category_title<a>
          <li>";
  
        }
      }

    //searching products functions
    function search_product(){
      global $con;
      if(isset($_GET['search_data_product'])){
   //condition to check isset or not
   $search_data_value=$_GET['search_data'];
    $search_query="SELECT * FROM products where product_keyword like '%$search_data_value%'";
  $result_query=mysqli_query($con,$search_query);
  $num_of_rows=mysqli_num_rows( $result_query);
  if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>No result match.No products found on this category </h2>";
   }
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
  echo"<div class='col-md-4 mb-2'>
  <div class='card'>
  <img src='Admin\admin\product_images$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
  <h5 class='card-title'> $product_title</h5>
  <p class='card-text'>$product_description.</p>
  <p class='card-text'>Price:  $product_price/-</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
  <a href='#' class='btn btn-dark'>View more</a>
  </div>
  </div>
  </div>";
  
  }
}

}   
    
//get ip address function
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;
//cart function
function cart(){
if(isset($_GET['add_to_cart'])){
  global $con;
$get_ip_address = getIPAddress();
$get_product_id=$_GET['add_to_cart'];
$select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address' and 	product_id=$get_product_id";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows( $result_query);
 if($num_of_rows>0){
  echo "<script>alert('This item is already inside the cart')</script>";
  echo"<script>window.open('index.php','_self')</script>";
 }
 else{
  $insert_query="INSERT INTO cart_details(product_id,	ip_address,quantity)VALUES('$get_product_id','$get_ip_address',0)";
  $result_query=mysqli_query($con,$insert_query);
  echo "<script>alert('Item is added to cart')</script>"; 
  echo"<script>window.open('index.php','_self')</script>";
 }
}
}  
//function to get cart item numbers
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
  $get_ip_address = getIPAddress();
  $select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
  $result_query=mysqli_query($con,$select_query);
  $count_cart_items=mysqli_num_rows( $result_query);
  }else{
    global $con;
    $get_ip_address = getIPAddress();
    $select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows( $result_query);
  }
echo  $count_cart_items;
}
//total price function

function total_cart_price(){
  global $con;
  $get_ip_address = getIPAddress();
  $total_price = 0;
  $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
  $result = mysqli_query($con, $cart_query);
  
  while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_products = "SELECT product_price FROM products WHERE product_id='$product_id'";
    $result_products = mysqli_query($con, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
      if (isset($row_product_price['product_price'])) {
        $product_price = str_replace("kshs ", "", $row_product_price['product_price']); // Remove "kshs" prefix
        $total_price += intval($product_price); // Convert to integer before adding
      } else {
        echo "product_price is not set!";
      }
    }
  }
  
  echo $total_price;

}
//get user order details
function get_user_order_details(){
  global $con;
    $username = $_SESSION['username'];
  $get_details="SELECT * FROM user_table WHERE username='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
      if(!isset($_GET['delete_account'])){
        $get_orders="SELECT * FROM user_orders WHERE user_id='$user_id' AND order_status='pending'";
        $result_orders_query=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows( $result_orders_query);
        if($row_count>0 ){
echo "<h3 class='text-center text-primary my-5'>You have <span class='text-danger'> $row_count</span> pending orders</h3>
<p class='text-center'><a href='profile.php?my_oders' class='text-dark'>Order Details</a></p>";
        }else{
          echo "<h3 class='text-center text-primary my-5'>you have zero pending orders</h3>
          <p class='text-center'><a href='includes\users_area\index.php' class='text-dark'>Explore products</a></p>";
        }
      }
      }
    }
  }
}
?>