<!--connect file-->
<?php
include('C:\xampp\htdocs\Ecommerce Website\includes\connect.php');

?>

<h3 class="text-center text-primary">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-primary">
        <?php
        $get_payment="SELECT * FROM user_payments";
        $result_payments=mysqli_query($con,$get_payment);
        $row_count=mysqli_num_rows( $result_payments);
        
        echo"<tr>
        <th>Serial Number</th>
        <th>Amount</th>
        <th>Invoice Number</th>
        <th>Payment Mode</th>
        <th>Order Date</th>
       
    </tr>
        </thead>
        <tbody class='bg-dark text-light'>";
if( $row_count==0){
    echo"<h2 class='bg-danger text-center mt-5'>No payments received yet</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result_payments)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $amount=$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
        $payment_mode=$row_data['payment_mode'];
        $order_date=$row_data['date'];
        $number++;
        echo"
        <tr>
        <td>$number</td>
        <td>$amount</td>
        <td>$invoice_number</td>
        <td>$payment_mode</td>
        <td>$order_date</td>
       
    </tr>";

    }
}



        ?>

      
    </tbody>
</table>