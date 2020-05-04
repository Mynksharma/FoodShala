<?php 
require 'includes/common.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
$email=$_POST['email'];
$password=md5($_POST['password']);
if($_GET['per']=='restaurant'){
$sql="SELECT resid,email FROM restaurant_details WHERE email='$email' AND password='$password'";  }
else if($_GET['per']=='customer'){
    $sql="SELECT customerid,email FROM customer_details WHERE email='$email' AND password='$password'"; 
}
$query=mysqli_query($con,$sql);
if(!$query){die("connection failed:".mysqli_error());}
if(mysqli_num_rows($query)==0){
    header('Location:login.php?per='.$_GET['per'].'&login=0');
}
else{
    $row=mysqli_fetch_array($query);
    if($_GET['per']=='restaurant'){
	$_SESSION['id']= $row['resid'];
    $_SESSION['email']= $row['email'];
    $_SESSION['per']='restaurant';
    header('Location:addmenu.php');}

    if($_GET['per']=='customer'){
        $_SESSION['id']= $row['customerid'];
        $_SESSION['email']= $row['email'];
        $_SESSION['per']='customer';
        header('Location:restaurants.php');
    }
}}
?>