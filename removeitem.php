<?php 
require 'includes/common.php';
$item=$_GET['item'];
$sql="Delete from food_items where foodid='$item'";
mysqli_query($con,$sql);
header('location:addmenu.php');
?>