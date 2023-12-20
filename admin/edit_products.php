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


$id=$_GET['id'];
$query="select * from products where id='$id' ";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon"></i>
            Edit Products</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Products</h5>
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
                                <option value="<?php  echo  $row5['companyname']; ?>"  <?php if($result['company_name']==$result['company_name']){ echo "selected"; }  ?> ><?php echo  $row5['companyname']; ?></option>

                                <?php
                        }
                        
                        ?>
                </select>
               
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter Product Name</label>
              <div class="controls">
                <input type="text" value="<?php echo $result['product_name']  ?>" name="product_name" class="span11" placeholder="Enter product name">
               
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
                                <option value="<?php echo  $row5['unit']; ?>" <?php if($result['unit']==$result['unit']){ echo "selected"; }  ?>><?php echo  $row5['unit']; ?></option>

                                <?php
                        }
                        
                        ?>
                </select>
               
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">Enter Packing Size</label>
              <div class="controls">
                <input type="text" value="<?php echo $result['packing_size']  ?>" name="packing_size" class="span11" placeholder="Enter packing Size">
               
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
      
        
</div>
<?php


if(isset($_POST['submit1'])){
    $query2="update products set company_name='$_POST[company_name]',product_name='$_POST[product_name]',unit='$_POST[unit]',packing_size='$_POST[packing_size]' where id='$id' ";
    $data2=mysqli_query($conn,$query2);
    if($data2){
        ?>
        <script>
            document.getElementById("success").style.display="block";
        </script>
        <?php
       
    }else{
        echo "Failed to insert";
    }

}

    


?>

<!--end-main-container-part-->
<?php include("footer.php"); ?>