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

<?php include("header.php");
include("../user/connection.php");
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon"></i>
        Stock Master</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Stock Master</h5>
        </div>
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>

                <tr>
                  <th>ID </th>
                  <th>Product Name</th>
                  <th> Product Name </th>
                  <th> Product Unit </th>
                  <th> Product Quantity </th>
                  <th> Product Selling Price </th>
                  <th> Edit  </th>
                
                 
                </tr>
              </thead>
              <tbody>
               <?php
               $count=0;
                $query3="select * from stock_master";
                $data3=mysqli_query($conn,$query3);
                while($row=mysqli_fetch_array($data3)){
                    $count=$count+1;
                ?>
               
                  <td><?php echo $count; ?></td>
                  <td><?php echo $row['product_company'] ?></td>
                  <td><?php echo $row['product_name'] ?></td>
                  <td><?php echo $row['product_unit'] ?></td>
                  <td><?php echo $row['product_qty'] ?></td>
                  <td><?php echo $row['product_selling_price'] ?></td>
                  <td><center> <a class="btn btn-primary" href="edit_stock_master.php?id=<?php echo $row['id']; ?>">Edit</a></center></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      
      
        
</div>


<!--end-main-container-part-->
<?php include("footer.php"); ?>