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
        <div id="breadcrumb"><a href="dashboard.php "  class="tip-bottom"><i class="icon-home"></i>
            Dashboard</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

      <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
      
      <div class='card' style="width:10rem; border-style: solid; border-width: 1px; border-radius:10px; float:left">
      <div class="card-body">
        <h4 class="card-title text-center">No of Products</h4>
        <h1 class="card-title text-center">
            <?php
            $count=0;
            $res=mysqli_query($conn,"select * from products");
            $count=mysqli_num_rows($res);
            echo $count;
            ?>
        </h1>
      </div>
      </div>

      <div class='card' style="width:10rem; border-style: solid; border-width: 1px; border-radius:10px; float:left; margin-left:10px;">
      <div class="card-body">
        <h4 class="card-title text-center">Total Orders</h4>
        <h1 class="card-title text-center">
            <?php
            $count=0;
            $res=mysqli_query($conn,"select * from products");
            $count=mysqli_num_rows($res);
            echo $count;
            ?>
        </h1>
      </div>
      </div>

      <div class='card' style="width:10rem; border-style: solid; border-width: 1px; border-radius:10px; float:left; margin-left:10px;">
      <div class="card-body">
        <h4 class="card-title text-center">Total Company</h4>
        <h1 class="card-title text-center">
            <?php
            $count=0;
            $res=mysqli_query($conn,"select * from company_name");
            $count=mysqli_num_rows($res);
            echo $count;
            ?>
        </h1>
      </div>
      </div>
   

        </div>

    </div>
</div>
    

<!--end-main-container-part-->
<?php include("footer.php"); ?>