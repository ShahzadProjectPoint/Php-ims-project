http://localhost/php_ims/admin/add_new_company.php


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
                <input type="text" class="span11" placeholder="Company name" name="companyname" />
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
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
              <tbody>
               <?php
                $query3="select * from company_name";
                $data3=mysqli_query($conn,$query3);
                while($row=mysqli_fetch_array($data3)){

                
               
               ?>
               
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['companyname'] ?></td>
                  <td><center> <a class="btn btn-primary" href="edit_company.php?id=<?php echo $row['id']; ?>">Edit</a></center></td>
                  <td> <center><a class="btn btn-danger" href="delete_company.php?id=<?php echo $row['id']; ?>">Delete</a></center></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      
      
        
</div>
<?php
if(isset($_POST["submit1"])){
    $count=0;
    $query="select * from company_name where companyname='$_POST[companyname]'";
    $data=mysqli_query($conn,$query);
    $count=mysqli_num_rows($data);
    if($count> 0){
        ?>
        <script>
             document.getElementById("success").style.display="none";
            document.getElementById("error").style.display="block";
        </script>

        <?php
    }else{
        $query1="insert into company_name(companyname) values('$_POST[companyname]')";
        $data1=mysqli_query($conn,$query1);
        ?>
        <script>
             document.getElementById("error").style.display="none";
             document.getElementById("success").style.display="block";
             header("Refresh:0; url=add-new-user.php");
           
        </script>

        <?php
    }

    
}


?>

<!--end-main-container-part-->
<?php include("footer.php"); ?>