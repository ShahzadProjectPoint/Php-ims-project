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


<?php
    include("../user/connection.php");
    $id=$_GET['id'];
    $query="delete from user_registration where id='$id'";
    $data=mysqli_query($conn,$query);
    if($data){
        header("location:add-new-user.php");
    }
    ?>
    
