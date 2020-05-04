<?php require 'includes/common.php' ; 
$person=(isset($_GET['per']) ? $_GET['per'] : '');
if($person=="customer"){
    if(isset($_SESSION['email'])){header('location:restaurants.php');}
}
if($person=="restaurant"){
    if(isset($_SESSION['email'])){header('location:addmenu.php');}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>FoodShala</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
    body{
    margin:0;padding:0;overflow:hidden;background: url(images/food3.jpg) no-repeat center center; background-size: cover;height:100vh;
}
.uli{
    color:black;
    
}
#Brand{font-family: 'Pacifico','cursive';color:white;font-size:30px;}

	.ab{margin-top:20px;margin-bottom:20px;}	
	</style>
	<script>
    function abc(){
        <?php if(isset($_GET['sign'])){ ?>
        alert('Email id already registered');
        <?php } ?>
    }
	</script>	
</head>
<body onLoad="abc();">
<?php include 'includes/header.php' ;?>
 <div class="container ab">
 <div class="row">
 <div class=" col-md-8 offset-md-2 col-lg-4 offset-lg-4" style="background-color:rgba(0,0,0,0.5);padding:10px;">
 <h1 style="color:white;font-family: 'Pacifico','cursive';"><b>SIGN UP</b></h1><?php if($person=="customer"){?><p style="color:white;">For customer</p><?php } if($person=="restaurant"){?>
 <p style="color:white;">For restaurant</p><?php } ?>
 <form method="POST" action="signup_submit.php?per=<?php echo $person;?>">
 <div class="form-group">
<?php if($person=="customer"){ ?>
 <input type="text" class="form-control" placeholder="Name" name="name"  required />
<?php }else{?>
 <input type="text" class="form-control" placeholder="Restaurant name" name="name"  required />
<?php } ?></div>
 <div class="form-group">
 <input type="email" class="form-control" placeholder="Email" name="email"   required /></div>

  <div class="form-group">
 <input type="password" class="form-control" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number,one uppercase and lowercase letter, and at least 5 or more characters" required /></div>
 <div class="form-group">
 <input type="tel" class="form-control" placeholder="Contact" name="contact" pattern="[0-9]{10}" title="Enter 10-digit phone no. e.g.-9971099999" required /></div>
 <div class="form-group">
<input type="text" class="form-control" placeholder="Address" name="address"  required /></div>
<?php if($person=="customer"){ ?>
<div class="form-group">
<select class="form-control" name="preference" required>
<option value="" disabled selected>Are you veg/non-veg?</option>
<option value="Veg">Veg</option>
<option value="Non-veg">Non-veg</option>
</select></div>
 <?php } else{?>
 <div class="form-group">
    <select class="form-control" name="preference" required>
<option value="" disabled selected>Type of restaurant</option>
<option value="Veg">Veg</option><option value="Non-veg">Non-veg</option>
</select></div>
 <?php } ?>
<div class="form-group"> <input type="submit" class="btn btn-primary" value="Submit"/></div></form></div></div></div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body></html>