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
$query="select * from user_registration where id='$id' ";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon-home"></i>
            Edit User</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit User</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" name="form1" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" value="<?php echo $result['firstname'] ?>" name="fname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $result['lastname'] ?>" placeholder="Last name" name="lname" />
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">Username</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $result['username'] ?>" placeholder="Username" name="username" readonly/>
              </div> 
            </div>
            <div class="control-group">
              <label class="control-label"> Password </label>
              <div class="controls">
                <input type="password"  value="<?php echo $result['password'] ?>"  class="span11" placeholder="Enter Password" name="password"  />
              </div>
              <div class="control-group">
              <label class="control-label">Role </label>
              <div class="controls">
                <select class="span11" name="role">
                    <option <?php if($result['role']=='user'){ echo "selected"; } ?>>user</option>
                    <option <?php if($result['role']=='admin'){ echo "selected"; } ?>>admin</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Status </label>
              <div class="controls">
                <select class="span11" name="status">
                    <option  <?php if($result['status']=='active'){ echo "selected"; } ?>>active</option>
                    <option <?php if($result['status']=='inative'){ echo "selected"; } ?>>inactive</option>
                </select>
              </div>
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

        </div>

    </div>
</div>

<?php
        
if(isset($_POST['submit1'])){
    $query2="update user_registration set firstname='$_POST[fname]',lastname='$_POST[lname]',password='$_POST[password]',role='$_POST[role]',status='$_POST[status]' where id='$id' ";
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