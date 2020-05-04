<?php 
require 'includes/common.php';$user=$_SESSION['id'];
$name=$_POST['name'];
$cost=$_POST['cost'];
$type=$_POST['type'];
$sql="insert into food_items(food_name,cost,type,resid) values('$name','$cost','$type','$user')";
mysqli_query($con,$sql);
header('location:addmenu.php');
?>