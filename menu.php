<?php require 'includes/common.php';
if(isset($_SESSION['id']) && ($_SESSION['per']=="restaurant")){header("location:addmenu.php");} 
if(isset($_GET['resid'])){
$resid=$_GET['resid'];}
$sql="select name,type,contact,profile_image,Address from restaurant_details where resid='$resid'";
$result=mysqli_query($con,$sql);$r=mysqli_fetch_array($result);
if(isset($_SESSION['id'])){
$sql="select cart.foodid from cart,customer_details where cart.customerid=customer_details.customerid and customer_details.customerid=".$_SESSION['id'];
$result=mysqli_query($con,$sql);
$array=array();
$array[]=0;
		while($find=mysqli_fetch_array($result)){
			$array[]=$find['foodid'];
    } }
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
#menuitems{height:400px;padding:10px;min-height:400px;max-height:400px;}
#items{background-color:rgba(255,255,255,0.7);width:100%;height:100%;}
#brandname{padding-top:10px;padding-bottom:10px;}
#brandname h1,#noitems{font-family:'Pacifico','cursive'}
#items{padding:10px;overflow:auto;}
#items ul{margin:0;padding:0;list-style-type:none;}
#items ul li{padding:10px;font-weight:bold;width:100%;border-bottom:1px solid rgba(255, 160, 122,0.7);position:relative;}
#items ul li:hover{background-color:rgba(255, 160, 122,0.5);}
</style>
</head>
<body>
<?php require 'includes/header.php' ?>
 <div class="container-fluid" style="width:98%;">
 <div class="row" style="background-color:rgba(255,255,255,0.7);margin-bottom:20px;">
      <div class="col-lg-3 col-sm-4 col-xs-12" style="padding-top:10px;padding-bottom:10px;">
      <img src=<?php  if(!$r['profile_image']==NULL){
        echo 'restaurant_images/'.$r['profile_image'];}
        else{echo 'images/default.png';}?> alt="" style="width:100%;height:150px;">
      </div>
 <div class="col-lg-9  col-sm-8 col-xs-12" id="brandname">
 <div style="float:left;">
<h1><?php echo $r['name']; ?></h1>
<p>Address: <?php echo $r['Address']; ?></p>
<p>Contact: <?php echo $r['contact']; ?></p>

</div>
 </div>
 </div>
 <div class="row">
 <div class="col-lg-12 col-sm-12 col-xs-12"  id="menuitems">
 <div id="items">
 <h3>Items available ..</h3>
 <ul>
 <?php $sql="select food_items.food_name,food_items.cost,food_items.foodid,food_items.type,food_items.resid from food_items,restaurant_details where food_items.resid=restaurant_details.resid and restaurant_details.resid='$resid'";
 
 $result=mysqli_query($con,$sql);
while($res=mysqli_fetch_array($result)){?>

 <li><?php if($res['type']=='Veg'){?>
 <img src="images/veg.png" style="width:15px;height:15px;">
 <?php }else{ ?>
  <img src="images/non-veg.png" style="width:15px;height:15px;">
 <?php }?>
 <span >
  <?php echo $res['food_name'];?></span><p style="color:grey;margin:0;">
  Cost: <i class="fa" style="font-size:14px;">&#xf156;</i>
  <?php echo $res['cost'];?></p>
 <?php 
 if(isset($_SESSION['id'])){
 if(!array_search($res['foodid'],$array)){?>
  <button class="btn btn-outline-success" style="position:absolute;top:10px;right:10px;" onClick="add_remove_from_cart(<?php echo $res['resid'].','.$res['foodid']; ?>,'insert');">Add</button>
    <?php }
    else{?>
 <button class="btn btn-success" style="position:absolute;top:10px;right:10px;" disabled>Added to cart</button>
    <?php } }
    else{ ?>
      <button class="btn  btn-outline-success" style="position:absolute;top:10px;right:10px;" onClick="add();">Add</button>
    <?php } ?>
 </li>
<?php } ?>
 </ul>
 </div>
 </div>
 </div>
 </div>
 <script>
 function add(){
location.href="login.php?per=customer";
 }
 function add_remove_from_cart(resid,foodid,msg){
   location.href="addtocart.php?resid="+resid+"&foodid="+foodid+"&msg="+msg;
 }
 </script>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>