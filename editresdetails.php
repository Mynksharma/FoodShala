<?php 
require 'includes/common.php';$user=$_SESSION['id'];
$name=$_POST['name'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$sql="update restaurant_details set name='$name',Address='$address',contact='$contact' where resid='$user'";
mysqli_query($con,$sql);
header('location:addmenu.php');
?>