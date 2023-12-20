<?php 
session_start();
if(!isset($_SESSION['user'])){
  ?>
  <script>
    window.location="index.php";

  </script>

  <?php
}


?>

<?php include("header.php"); 
include("../user/connection.php");
?>

<?php
$id=$_GET['id'];
$full_name="";
$bill_type="";
$date="";
$bill_no="";

$res=mysqli_query($conn,"select * from billing_header where id = $id");
while($row=mysqli_fetch_array($res)){
    $full_name=$row['full_name'];
    $bill_type=$row['bill_type'];
    $date=$row['Date'];
    $bill_no=$row['bill_no'];
}
?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon-home"></i>
            Detailed Bills</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
     <center>
        <h4>Detailed Bills</h4>
     </center>
   <table>
    <tr>
        <td>Bill No</td>
        <td><?php echo $bill_no; ?></td>
    </tr>
    <tr>
        <td>Full Name</td>
        <td><?php echo $full_name; ?></td>
    </tr>
    <tr>
        <td>Bill Type </td>
        <td><?php echo $bill_type ; ?></td>
    </tr>
    <tr>
        <td>Bill Date</td>
        <td><?php echo $date; ?></td>
    </tr>
   </table>

   <br> 

   <table class='table table-bordered'>
    <tr>
        <th>Product Company</th>
        <th>Product Name</th>
        <th>Product Unit</th>
        <th>Packing Size</th>
        <th>Prize</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Return</th>
    </tr>
    
    <?php 
    $total=0;
    $res=mysqli_query($conn,"select * from billing_details where bill_id='$id'");
    while($row=mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>";  echo $row['product_company']; echo "</td>";
        echo "<td>";  echo $row['product_name']; echo "</td>";
        echo "<td>";  echo $row['product_unit']; echo "</td>";
        echo "<td>";  echo $row['packing_size']; echo "</td>";
        echo "<td>";  echo $row['prize']; echo "</td>";
        echo "<td>";  echo $row['qty']; echo "</td>";
        echo "<td>";  echo ($row['price'] * $row['qty'] ); echo "</td>";
        echo "<td>";  ?> <a href="return.php?id=<?php echo $row['id']; ?>" style="color:red">Return</a> <?php echo "</td>";
        echo "</tr>";
        $total=$total+($row['prize'] * $row['qty']);
        
    }
    ?>
   </table>
   <div align="right" style="font-weight: bold" >
   Grand Total : <?php echo $total; ?>


   </div>

        </div>

    </div>
</div>

<!--end-main-container-part-->
<?php include("footer.php"); ?>