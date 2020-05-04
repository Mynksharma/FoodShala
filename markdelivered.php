<?php 
require 'includes/common.php';
$id=$_GET['customerid'];
$sql="update orders set delivered='1' where customerid='$id'";
mysqli_query($con,$sql);
header('location:vieworders.php');
?>