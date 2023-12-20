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
$query="select * from company_name where id='$id' ";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon"></i>
            Add New Company</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Company</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" name="form1" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <input type="text" value="<?php echo  $result['companyname'] ?>" class="span11" placeholder="Company name" name="companyname" />
              </div>
            </div>


            <div class="alert alert-danger" id="error" style="display:none">
           This Company Already Exist Try Another.
        </div>
        <div class="alert alert-success" id="success" style="display:none">
           Record Insert Succesfully
        </div>
           
            </div>
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Update</button>
            </div>

           
          </form>
        </div>

       
      </div>
      
      
        
</div>
<?php

if(isset($_POST['submit1'])){
    $query2="update company_name set companyname='$_POST[companyname]'where id='$id' ";
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