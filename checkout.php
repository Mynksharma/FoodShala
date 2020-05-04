<?php require 'includes/common.php';
if(!isset($_SESSION['id'])){header("location:login.php?per=customer");} 
if(isset($_SESSION['id']) && ($_SESSION['per']=="restaurant")){header("location:addmenu.php");} 
$sql="select resid,foodid from cart where customerid=".$_SESSION['id'];
$cart=mysqli_query($con,$sql);
$cartitems=mysqli_fetch_array($cart);
$resid=$cartitems['resid'];$foodid=$cartitems['foodid'];$user=$_SESSION['id'];
$sql="INSERT INTO orders(resid,customerid,foodid,delivered) VALUES ('$resid','$user','$foodid','0')";
if(!mysqli_query($con,$sql)){
header("location:cart.php");
}
$deletecart="Delete from cart where customerid='$user'";
mysqli_query($con,$deletecart);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>FoodShala</title>
<style>
 body{margin:0;padding:0;overflow:hidden;background: url(images/food3.jpg) no-repeat center center; background-size: cover;height:100vh;}
.uli{
    color:black;
}
#checkout{background-color:rgba(255,255,255,0.5);position:relative;height:500px;width:100%;}
#message{position:absolute;margin:auto;width:100%;height:40px;left:0;bottom:0;top:0;right:0;text-align:center;font-family: 'Pacifico','cursive';}
#Brand{font-family: 'Pacifico','cursive';color:white;font-size:30px;} 
 </style>
 </head>
 <body>
 <?php require 'includes/header.php'; ?> 
 <div class="container" id="checkout">
 <div id="message">
 <h1>Your order is confirmed.</h1>
 </div>
 </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>