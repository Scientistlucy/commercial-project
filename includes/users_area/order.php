<?php
include('C:\xampp\htdocs\Ecommerce Website\includes\connect.php');
include('C:\xampp\htdocs\Ecommerce Website\Admin\functions\common_function.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

// Getting total items and total price of all items
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$invoice_number = mt_rand();
$status = "pending";
$count_product = mysqli_num_rows($result_cart_price);

while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM products WHERE product_id='$product_id'";
    $run_price = mysqli_query($con, $select_product);
    $row_product_price = mysqli_fetch_array($run_price);
    $product_price = (int)$row_product_price['product_price']; //
    $total_price += $product_price;
}

// Getting quantity from cart
$get_cart = "SELECT SUM(quantity) AS total_quantity FROM cart_details WHERE ip_address='$get_ip_address'";
$run_cart = mysqli_query($con, $get_cart);
$row_cart = mysqli_fetch_array($run_cart);
$quantity = $row_cart['total_quantity'];

if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $subtotal = $total_price * $quantity;
}

$insert_orders = "INSERT INTO user_orders (user_id, total_product, amount_due, invoice_number, order_date, order_status) VALUES ('$user_id', '$count_product', '$subtotal', '$invoice_number', NOW(), '$status')";
$result_query = mysqli_query($con, $insert_orders);

if ($result_query) {
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}

// Orders pending
$insert_pending_orders = "INSERT INTO orders_pending(user_id, invoice_number, product_id, quantity, order_status) VALUES ('$user_id', '$invoice_number', '$product_id', '$quantity', '$status')";
$result_pending_orders = mysqli_query($con, $insert_pending_orders);

// Delete items from cart
$empty_cart = "DELETE FROM cart_details WHERE ip_address='$get_ip_address'";
$result_delete = mysqli_query($con, $empty_cart);

?>
