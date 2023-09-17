<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-primary">All Products</h3>
    <table class="table table-borderd mt-5">
<thead class="bg-primary">
<tr>

<th>Product ID</th>
<th>Product Title</th>
<th>Product Image</th>
<th>Product Price</th>
<th>Status</th>
<th>Total Solid</th>
<th>Edit</th>
<th>Delete</th>
</tr>

</thead>
<tbody class="bg-dark text-light">
    <?php
    
    $get_products="SELECT * FROM products";
    $result=mysqli_query($con,$get_products);
    $number=0;
    while($row=mysqli_fetch_assoc( $result)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_image=$row['product_image1'];
        $product_price=$row['product_price'];
        $status=$row['status'];
        $number++;
        ?>


<img src="" alt="">
        
        <tr text-center>
   <td><?php echo $number;?></td>
   <td><?php echo $product_title;?></td>

   <td><img src='Admin/admin/product_images/<?php echo $product_image; ?>' alt="Product Image"></td>
   <td><?php echo $product_price;?></td>
   <td><?php echo  $status;?></td>
   <td>
<?php
$get_count="SELECT * FROM  orders_pending  WHERE product_id=$product_id";
$result_count=mysqli_query($con,$get_count);
$rows_count=mysqli_num_rows($result_count); 
echo $rows_count; 



?>



   </td>
   <td><a href='' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
   <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
</tr>
<?php
    }
    ?>

 


</tbody>
    </table>
</body>
</html>