<?php 
session_start();
if(!isset($_SESSION['user'])){
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
            Add New Purchase</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5> Add New Purchase</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" name="form1" class="form-horizontal">

            <div class="control-group"> 
              <label class="control-label">Select Company</label>
              <div class="controls">
                <select name="company_name" class="span11" id="company_name" onchange="select_company(this.value)">
                    <option>Select</option>
                        <?php 
                        $query5="select * from company_name";
                        $data5=mysqli_query($conn,$query5);
                        while($row5=mysqli_fetch_array($data5)){
                               echo "<option>";
                               echo $row5["companyname"];
                               echo "</option>";
                        }
                        
                        ?>
                </select>
               
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Product Name</label>
              <div class="controls" id="product_name_div">
               <select name="product_name" class="span11">
                <option>Select</option>
               </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Select Unit</label>
              <div class="controls" id="unit_div">
                <select class="span11" >
                      <option>Select</option>
                </select>
               
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">Enter Packing Size</label>
              <div class="controls" id="packing_size_div">
              <select class="span11" >
                      <option>Select</option>
                </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Enter  Quantity</label>
              <div class="controls" >
             <input type="text" name="quantity" value="0" class="span11">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter Price</label>
              <div class="controls" >
             <input type="text" name="price" value="0" class="span11">
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Select Party Name</label>
              <div class="controls">
              <select class="span11" name="party_name" >
                      <?php
                      $query8="select * from party_info ";
                      $data8=mysqli_query($conn,$query8);
                      while($row8=mysqli_fetch_array($data8)){
                        echo "<option>";
                        echo $row8["businessname"];
                        echo "</option>";

                      }

                      ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Purchase Type</label>
              <div class="controls">
              <select class="span11" name="purchase_type" >
                      <option>Cash</option>
                      <option>Debit</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter Expiry Date</label>
              <div class="controls" >
             <input type="text" name="dt" id="dt" class="span11" placeholder="YYYY-MM-dd" required pattern="\d{4}-\d{2}-\d{2}">
              </div>
            </div>


           
        <div class="alert alert-success" id="success" style="display:none">
           Purchase Inserted succesfully
        </div>
           
            </div>
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Purchase Now</button>
            </div>

           
          </form>
        </div>

       
      </div>
      
      
      
        
</div>

<script>
    function select_company(company_name){
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("product_name_div").innerHTML=xmlhttp.responseText;
        }
      };
      xmlhttp.open("GET","forajax/load_product_using_company.php?company_name="+company_name,true);
      xmlhttp.send();

    }
    function select_product(product_name,company_name){
        var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
        }
      };
      xmlhttp.open("GET","forajax/load_unit_using_products.php?product_name="+product_name+"&company_name="+company_name,true);
      xmlhttp.send();
    }

    function select_unit(unit,product_name,company_name){
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;
        }  
      };

      xmlhttp.open("GET","forajax/load_packingsize_using_unit.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name,true);
      xmlhttp.send();
    }


</script>



<?php 
if(isset($_POST["submit1"])){
  $today_date=date("Y-m-d");
    mysqli_query($conn,"insert into purchase_master values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]','$_POST[quantity]','$_POST[price]','$_POST[party_name]','$_POST[purchase_type]','$_POST[dt]','$today_date','$_SESSION[user]')");
    $count=0;
  $res=mysqli_query( $conn,"select * from stock_master where product_company='$_POST[company_name]' && product_name='$_POST[product_name]' && product_unit='$_POST[unit]' ");
  $count=mysqli_num_rows($res);
  if($count==0){
    mysqli_query($conn,"insert into stock_master values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[quantity]','0')");
  }else{
    mysqli_query($conn,"update stock_master set product_qty=product_qty+$_POST[quantity] where product_company='$_POST[company_name]' && product_name='$_POST[product_name]' && product_unit='$_POST[unit]' ");
  }
  ?>
  <script>
    document.getElementById("success").style.display="block";
  </script>
  <?php
}

?>

<!--end-main-container-part-->
<?php include("footer.php"); ?>