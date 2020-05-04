<?php 
require 'includes/common.php';$user=$_SESSION['id'];
$resid=$_GET['resid'];
$foodid=$_GET['foodid'];
$msg=$_GET['msg'];

if($msg=="delete"){
    $sql="Delete from cart where resid='$resid' and foodid='$foodid' and customerid='$user'";
    mysqli_query($con,$sql);header('location:cart.php');
}
else if($msg=="insert"){
    $sql="insert into cart(resid,customerid,foodid) values(".$resid.",".$user.",".$foodid.")";
    mysqli_query($con,$sql);header("location:menu.php?resid=$resid");
}
?>