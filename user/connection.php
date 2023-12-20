<?php
$server_name="localhost";
$user_name="root";
$password="";
$database="php_ims";
$conn=new mysqli($server_name,$user_name,$password,$database);
if($conn){
//  echo "Succesful";
}else{
    echo "Failed";
}

?>

