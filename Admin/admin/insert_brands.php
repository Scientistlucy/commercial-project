
<?php
include('C:\xampp\htdocs\Ecommerce Website\includes\connect.php');
if(isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand-title'];
  //select data from database
  $select_query="SELECT * FROM brands where brand_title='$brand_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){echo"<script>alert('This Brand is present inside the database')</script>";
  }else{
  $insert_query="INSERT INTO brands (brand_title) VALUES('$brand_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('Brand has been inserted successfully')</script>";
  }
}}

?>













<h2 class="text-center">Insert Brands</h2>
<form action=""method="post"class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-primary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control"
  name="brand-title"
  placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1"autocomplete="off">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-primary border-0 p-2 m-3"
  name="insert_brand"
  aria-label="Username"
  value="Insert Brands">

</div>

</form>