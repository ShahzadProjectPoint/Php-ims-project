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
$query="select * from party_info where id='$id' ";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon"></i>
            Edit Party</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Party</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" name="form1" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" value="<?php echo  $result['firstname'] ?>" class="span11" placeholder="First name" name="fname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" value="<?php echo  $result['lastname'] ?>" class="span11" placeholder="Last name" name="lname" />
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">Business Name</label>
              <div class="controls">
                <input type="text" value="<?php echo  $result['businessname'] ?>" class="span11" placeholder="Business Name" name="businessname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact </label>
              <div class="controls">
                <input type="text" value="<?php echo  $result['contact'] ?>"  class="span11" placeholder="Enter Contact number" name="contact"  />
              </div>

              <div class="control-group">
              <label class="control-label">Address </label>
              <div class="controls">
                <textarea name="address" class="span11" ><?php echo  $result['address'] ?></textarea>
              </div>

              <div class="control-group">
              <label class="control-label">City </label>
              <div class="controls">
                <input type="text" value="<?php echo  $result['city'] ?>"  class="span11" placeholder="Enter City" name="city"  />
              </div>

        <div class="alert alert-success" id="success" style="display:none">
           Record Updated Succesfully
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
    $query2="update party_info set firstname='$_POST[fname]',lastname='$_POST[lname]',businessname='$_POST[businessname]',contact='$_POST[contact]',address='$_POST[address]',city='$_POST[city]' where id='$id' ";  
    $data2=mysqli_query($conn,$query2);
    if($data2){
        ?>
        <script>
            document.getElementById("success").style.display="block";
        </script>
        <?php
       
    }else{
        echo "Failed to update";
    }

}

?>

<!--end-main-container-part-->
<?php include("footer.php"); ?>