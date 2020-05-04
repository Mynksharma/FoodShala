<?php require 'includes/common.php';
if(!isset($_SESSION['id'])){header("location:login.php?per=restaurant");}
if(isset($_SESSION['id']) && ($_SESSION['per']=="customer")){header("location:restaurants.php");} 
$sql="select sum(food_items.cost) as total,customer_details.name,customer_details.address,customer_details.contact,orders.delivered,orders.orderid,customer_details.customerid from customer_details,food_items,orders where customer_details.customerid=orders.customerid and food_items.foodid=orders.foodid and orders.resid=".$_SESSION['id']." group by orders.customerid,orders.delivered order by orders.delivered";
$result=mysqli_query($con,$sql);
/*$totalsum="select  as total from food_items,customer_details,restaurant_details,orders where orders.foodid=food_items.foodid and orders.customerid=customer_details.customerid and cart.resid=restaurant_details.resid and restaurant_details.resid='$resid' and customer_details.customerid=";*/
$sql2="select food_items.food_name,customer_details.name,orders.delivered from food_items,orders,customer_details where orders.foodid=food_items.foodid and orders.customerid=customer_details.customerid and orders.resid=".$_SESSION['id'];
$result2=mysqli_query($con,$sql2);
$array=array();
while($res=mysqli_fetch_assoc($result2)){
  $array[]=$res;
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
    <style>
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
.uli:hover{color:white;}
#Brand{font-family: 'Pacifico','cursive';color:white;font-size:30px;}
#orderslist{padding:0;margin:0;list-style-type:none;}
#orderslist p{margin-bottom:5px;}
#orderslist li{padding:10px;cursor:pointer;background-color:rgba(255, 160, 122,0.5);margin-bottom:10px;position:relative;}
#orderslist li h5{font-family: 'Pacifico','cursive';}
#orderslist li p span{font-family: 'Pacifico','cursive';color: #D20079;}
#orderslist li:hover{background-color:rgba(255, 160, 122,0.8);}
#bill{float:right;}
.delivered{position:absolute;bottom:10px;right:10px;}
@media screen and (max-width:500px){
  .delivered{position:relative;margin:10px 0 0 10px;width:100%;}
}
    </style>
</head>
<body>
<?php require 'includes/header.php';?>
<div class="container" style="background-color:rgba(255,255,255,0.7);min-height:85%;padding:20px;overflow:auto;">
<h1>All Orders</h1>
<ul id="orderslist">
<?php while($r=mysqli_fetch_array($result)){?>
<li>
<h5><?php echo $r['name']; ?></h5>
<p><span>Address: </span> <?php echo $r['address']; ?></p>
<p><span>Phone: </span> <?php echo $r['contact']; ?></p>
<p><span>Orders: </span><?php $str=''; for($i=0;$i<count($array);$i++){
  if($array[$i]['name']==$r['name'] && $array[$i]['delivered']==$r['delivered']){$str.=$array[$i]['food_name'].",";}
}
echo rtrim($str, ",");
?>
</p>
<p><span >Total Bill amount: </span ><i  class="fa" style="font-size:14px;">  &#xf156;</i><?php echo $r['total']; ?></p>
<?php if($r['delivered']=='0'){?>
<button class="btn  btn-outline-primary delivered" onClick="mark(<?php echo $r['customerid']; ?>);">Mark as Delivered</button>
<?php }else{ ?>
  <button class="btn  btn-primary delivered" disabled>Delivered</button>
<?php } ?>
</li>
<?php } ?>
</ul>
</div>
<script>
function mark(customerid){
  location.href="markdelivered.php?customerid="+customerid;
}
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
</body>
</html>