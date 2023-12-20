
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
            Add New Products</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Products</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" name="form1" class="form-horizontal">

            <div class="control-group"> 
              <label class="control-label">Select Company</label>
              <div class="controls">
                <select name="company_name" class="span11" id="">
                        <?php 
                        $query5="select * from company_name";
                        $data5=mysqli_query($conn,$query5);
                        while($row5=mysqli_fetch_array($data5)){
                                ?>
                                <option value="<?php  echo  $row5['companyname']; ?>"><?php echo  $row5['companyname']; ?></option>

                                <?php
                        }
                        
                        ?>
                </select>
               
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter Product Name</label>
              <div class="controls">
                <input type="text" name="product_name" class="span11" placeholder="Enter product name">
               
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Select Unit</label>
              <div class="controls">
                <select name="unit" class="span11" id="">
                        <?php 
                        $query5="select * from units";
                        $data5=mysqli_query($conn,$query5);
                        while($row5=mysqli_fetch_array($data5)){
                                ?>
                                <option value="<?php echo  $row5['unit']; ?>"><?php echo  $row5['unit']; ?></option>

                                <?php
                        }
                        
                        ?>
                </select>
               
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">Enter Packing Size</label>
              <div class="controls">
                <input type="text" name="packing_size" class="span11" placeholder="Enter packing Size">
               
              </div>
            </div>



            <div class="alert alert-danger" id="error" style="display:none">
           This Product is Already Exist Try Another.
        </div>
        <div class="alert alert-success" id="success" style="display:none">
           Record Insert Succesfully
        </div>
           
            </div>
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>

           
          </form>
        </div>

       
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>

                <tr>
                  <th>ID </th>
                  <th>Company Name</th>
                  <th> Product Name </th>
                  <th> Unit </th>
                  <th> Packing Size </th>
                  <th> Edit  </th>
                  <th>Delete</th>
                 
                </tr>
              </thead>
              <tbody>
               <?php
                $query3="select * from products";
                $data3=mysqli_query($conn,$query3);
                while($row=mysqli_fetch_array($data3)){
                ?>
               
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['company_name'] ?></td>
                  <td><?php echo $row['product_name'] ?></td>
                  <td><?php echo $row['unit'] ?></td>
                  <td><?php echo $row['packing_size'] ?></td>
                  <td><center> <a class="btn btn-primary" href="edit_products.php?id=<?php echo $row['id']; ?>">Edit</a></center></td>
                  <td> <center><a class="btn btn-danger" href="delete_products.php?id=<?php echo $row['id']; ?>">Delete</a></center></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      
      
        
</div>
<?php
if(isset($_POST["submit1"])){
    $count=0;
    $query8="select * from products where product_name='$_POST[product_name]' && company_name='$_POST[company_name]' && unit='$_POST[unit]' && packing_size='$_POST[packing_size]' ";
    $data8=mysqli_query($conn,$query8);
    $count=mysqli_num_rows($data8);
    if($count> 0){
        ?>
        <script>
             document.getElementById("success").style.display="none";
            document.getElementById("error").style.display="block";
        </script>

        <?php
    }else{
        $query9="insert into products(company_name,product_name,unit,packing_size) values('$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]')";
        $data9=mysqli_query($conn,$query9);
        ?>
        <script>
             document.getElementById("error").style.display="none";
             document.getElementById("success").style.display="block";
             header("Refresh:0; url=add_new_products.php");
           
        </script>

        <?php
    }

    
}


?>

<!--end-main-container-part-->
<?php include("footer.php"); ?>