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
            Add New Party</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Party</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" name="form1" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="fname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="lname" />
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">Business Name</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Business Name" name="businessname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact </label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter Contact number" name="contact"  />
              </div>

              <div class="control-group">
              <label class="control-label">Address </label>
              <div class="controls">
                <textarea name="address" class="span11"  ></textarea>
              </div>

              <div class="control-group">
              <label class="control-label">City </label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter City" name="city"  />
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
                  <th>First Name </th>
                  <th>Last Name</th>
                  <th>Business Name</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>City</th>
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
              <tbody>
               <?php
                $query3="select * from party_info";
                $data3=mysqli_query($conn,$query3);
                while($row=mysqli_fetch_array($data3)){

                
               
               ?>
               
                  <td><?php echo $row['firstname'] ?></td>
                  <td><?php echo $row['lastname'] ?></td>
                  <td><?php echo $row['businessname'] ?></td>
                  <td><?php echo $row['contact'] ?></td>
                  <td><?php echo $row['address'] ?></td>
                  <td><?php echo $row['city'] ?></td>
                  <td><a class="btn btn-primary" href="edit_party.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                  <td><a class="btn btn-danger" href="delete_party.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      
      
        
</div>
<?php
if(isset($_POST["submit1"])){
   {
        $query1="insert into party_info(firstname,lastname,businessname,contact,address,city) values('$_POST[fname]','$_POST[lname]','$_POST[businessname]','$_POST[contact]','$_POST[address]','$_POST[city]')";
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