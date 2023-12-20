<?php 
    include("../../user/connection.php");
    $unit=$_GET['unit'];
    $company_name=$_GET['company_name'];
    $product_name=$_GET['product_name'];

    $query="select * from products where company_name='$company_name' && product_name='$product_name' && unit='$unit' ";
    $data=mysqli_query($conn,$query);
    ?>

    <select class="span11" name="packing_size" id="packing_size">
        <option>Select</option>
        <?php 
    while($row=mysqli_fetch_array($data)){
       echo "<option>";
       echo $row["packing_size"];
       echo "</option>";
    }

        ?>
    </select>

