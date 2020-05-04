<?php
require 'includes/common.php' ;
$name=$_POST['name'];
$contact=$_POST['contact'];
$password=md5($_POST['password']);
$email=$_POST['email'];
$type=$_POST['preference'];
$address=$_POST['address'];
if($_GET['per']=='customer'){
$sql="SELECT customerid FROM customer_details WHERE email='$e'";}
else if($_GET['per']=='restaurant'){$sql="SELECT resid FROM restaurant_details WHERE email='$e'";}
$row=mysqli_query($con,$sql);
if(mysqli_num_rows($row)>0){
header('Location:signup.php?per='.$_GET['per'].'&sign=0');
}
else{
    if($_GET['per']=='customer'){
$sql="INSERT INTO customer_details(name,password,email,contact,address,type) VALUES ('$name','$password','$email','$contact','$address','$type')";}
else{
    $sql="INSERT INTO restaurant_details(name,password,email,contact,Address,type) VALUES ('$name','$password','$email','$contact','$address','$type')";  
}
mysqli_query($con,$sql);
$pr=mysqli_insert_id($con);
$_SESSION['id']=$pr;
$_SESSION['email']=$_POST['email'];
if($_GET['per']=='restaurant'){
    $_SESSION['per']='restaurant';
header("Location:addmenu.php");}
if($_GET['per']=='customer'){
    $_SESSION['per']='customer';
    header("Location:restaurants.php");}
}
?>
