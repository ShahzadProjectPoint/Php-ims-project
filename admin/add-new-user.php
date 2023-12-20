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
            Add New User</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New User</h5>
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
              <label class="control-label">Username</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Username" name="username" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password </label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Enter Password" name="password"  />
              </div>

              <div class="control-group">
              <label class="control-label" >Role </label>
              <div class="controls">
                <select class="span11" name="role">
                  <option value="Select">Select</option>
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
                
              </div>
            </div>

            <div class="alert alert-danger" id="error" style="display:none">
           This Username Already Exist Try Another.
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
                  <th>Username</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
              <tbody>
               <?php
                $query3="select * from user_registration";
                $data3=mysqli_query($conn,$query3);
                while($row=mysqli_fetch_array($data3)){

                
               
               ?>
               
                  <td><?php echo $row['firstname'] ?></td>
                  <td><?php echo $row['lastname'] ?></td>
                  <td><?php echo $row['username'] ?></td>
                  <td><?php echo $row['role'] ?></td>
                  <td><?php echo $row['status'] ?></td>
                  <td><a class="btn btn-primary" href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                  <td><a class="btn btn-danger" href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      
      
        
</div>
<?php
if(isset($_POST["submit1"])){
    $count=0;
    $query="select * from user_registration where username='$_POST[username]'";
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
        $query1="insert into user_registration(firstname,lastname,username,password,role,status) values('$_POST[fname]','$_POST[lname]','$_POST[username]','$_POST[password]','$_POST[role]','active')";
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