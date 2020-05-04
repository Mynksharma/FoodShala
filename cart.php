<?php require 'includes/common.php';
if(!isset($_SESSION['id'])){header("location:login.php?per=customer");}
if(isset($_SESSION['id']) && ($_SESSION['per']=="restaurant")){header("location:addmenu.php");} 
if(isset($_SESSION['id'])){
$sql="select cart.foodid,cart.resid,food_items.food_name,food_items.cost,restaurant_details.name from cart,customer_details,food_items,restaurant_details where cart.customerid=customer_details.customerid and restaurant_details.resid=cart.resid and cart.foodid=food_items.foodid and customer_details.customerid=".$_SESSION['id'];
$result=mysqli_query($con,$sql);
$sql2="select restaurant_details.name from restaurant_details,cart,customer_details where cart.customerid=customer_details.customerid and restaurant_details.resid=cart.resid and customer_details.customerid=".$_SESSION['id'];$result2=mysqli_query($con,$sql2);
$resname=mysqli_fetch_array($result2);
$sql3="select sum(food_items.cost) as total from food_items,cart,customer_details where cart.foodid=food_items.foodid and cart.customerid=customer_details.customerid  and customer_details.customerid=".$_SESSION['id'];
$result3=mysqli_query($con,$sql3);
$total=mysqli_fetch_array($result3);
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>FoodShala</title>
</head>
<style>
 ::-webkit-scrollbar {
  width: 10px;
}
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
::-webkit-scrollbar-thumb {
  background: #888; 
}
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
body{margin:0;padding:0;background: url(images/food3.jpg) no-repeat center center; background-size: cover;height:100vh;background-attachment: fixed;}
.uli{
    color:black;
    
}
#Brand{font-family: 'Pacifico','cursive';color:white;font-size:30px;}
.uli:hover{color:white;}
#checkoutbutton{padding:20px;font-weight:bold;width:100%;color:white;background-color:#CD5C5C;border:none;}
#cartitems{padding:20px;position:relative;}
#checkoutbutton{padding:20px;font-weight:bold;width:100%;color:white;background-color:#CD5C5C;border:none;}
#cartitems ul{margin:0;list-style-type:none;padding:0;max-height:120px;height:120px;overflow:auto;}
#cartitems ul li{padding:5px;}
#total{position:absolute;margin:auto;bottom:10px;left:0;right:0;width:95%;font-weight:bold;}
#removeicon{color:red;font-size:18px;cursor:pointer;}
#removeicon:hover{color:blue;}
#cartlist li:hover{background-color:rgba(255, 160, 122,0.5);}
#cartitems{background-color:rgba(255,255,255,0.7);width:100%;height:100%;}
#cart{height:400px;padding:10px;min-height:400px;max-height:400px;}
</style>
<body>
<?php require 'includes/header.php' ?>

<div class="container">
<div class="row">
<div class="col-lg-12 col-sm-12" id="cart">
<div  id="cartitems">
<h1>Cart</h1>

<ul id="cartlist">
<?php while($res=mysqli_fetch_array($result)){?>
<li><i class="fa" id="removeicon" onClick="removeitem(<?php echo $res['resid'].','.$res['foodid']; ?>,'delete');">&#xf00d; </i>
<?php echo $res['food_name']; ?> <span style="color:red;">from <?php echo $res['name']; ?></span><span style="float:right;"><i class="fa" style="font-size:14px;">&#xf156;</i><?php echo $res['cost']; ?></span></li>
<?php } ?>
</ul>
<div id="total">
<p>Total<span style="float:right;"><i class="fa" style="font-size:14px;">&#xf156; </i><span  id="totalsum"></span>

<?php 
if($total['total']==null) echo '0';
else echo $total['total']; ?>
</span></p>
<?php  if($total['total']==null){?>
<button id="checkoutbutton" disabled>Checkout</button>
<?php }else{ ?>
    <button id="checkoutbutton" onClick="checkout();">Checkout</button>
<?php } ?>
</div>
</div> 
 </div>
</div>
</div>
<script>
function removeitem(resid,foodid,msg){
    location.href="addtocart.php?resid="+resid+"&foodid="+foodid+"&msg="+msg;
}
function checkout(){
    location.href="checkout.php";
}
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>