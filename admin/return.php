<?php 
session_start();
if(!isset($_SESSION['admin'])){
  ?>
  <script>
    window.location="index.php";

  </script>

  <?php
}


?>


<?php
include("../user/connection.php");
$id=$_GET['id'];
$bill_id="";
$product_company="";
$product_name="";
$product_unit="";
$packing_size="";
$price="";
$qty="";
$total="";

$res=mysqli_query($conn,"select * from billing_details where id =$id");
while($row=mysqli_fetch_array($res)){
    $bill_id=$row['bill_id'];
    $product_company=$row['product_company'];
    $product_name=$row['product_name'];
    $product_unit=$row['product_unit'];
    $packing_size=$row['packing_size'];
    $price=$row['price'];
    $qty=$row['qty'];
    $total=$price * $qty;
}
$bill_no="";
$res2=mysqli_query($conn,"select * from billing_header where id=$bill_id");
while($row2=mysqli_fetch_array($res2)){
    $bill_no=$row2['bill_no'];

}
$today_date=date('Y-m-d');
mysqli_query($conn,"insert into return_products values(NULL,'$_SESSION[admin]','$bill_no','$today_date','$product_company','$product_name','$product_unit','$packing_size','$price','$qty','$total')");
mysqli_query($conn,"update stock_master set product_qty=product_qty+$qty where product_company='$product_company' && product_name='$product_name' && product_unit='$product_unit' && packing_size='$packing_size'");
mysqli_query($conn,"delete from billing_details where id=$id");
?>

<script>
    alert("product take as a Return Successfully");
    window.location="view_bill_details.php?id=<?php echo $bill_id; ?>";
</script>


?>