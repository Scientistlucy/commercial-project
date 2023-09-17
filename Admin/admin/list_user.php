<!--connect file-->
<?php
include('C:\xampp\htdocs\Ecommerce Website\includes\connect.php');

?>

<h3 class="text-center text-primary">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-primary">
        <?php
        $get_payment="SELECT * FROM user_table";
        $result_payments=mysqli_query($con,$get_payment);
        $row_count=mysqli_num_rows( $result_payments);
        
        echo"<tr>
        <th>Serial Number</th>
        <th>username</th>
        <th>user email</th>
    
        <th>user address</th>
        <th>user mobile</th>
      
    </tr>
        </thead>
        <tbody class='bg-dark text-light'>";
if( $row_count==0){
    echo"<h2 class='bg-danger text-center mt-5'>No user yet</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result_payments)){
        $user_id=$row_data['user_id'];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
      
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        $number++;
        echo"
        <tr>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
       
        <td>$user_address</td>
        <td> $user_mobile</td>
      
    </tr>";

    }
}



        ?>

      
    </tbody>
</table>