<?php require 'includes/common.php';
$as=(isset($_GET['login']) ? $_GET['login'] : '');
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<script>
function message(){
	var a=<?php echo $as; ?>;
if(a==0){alert("Enter valid email or password");}}
	</script>
<style>
body{
    margin:0;padding:0;overflow:hidden;background: url(images/food3.jpg) no-repeat center center; background-size: cover;height:100vh;
}
.uli{
    color:black;
    
}
#Brand{font-family: 'Pacifico','cursive';color:white;font-size:30px;}
.heading{
    background-color:	
    #FFA07A;
    padding:20px;
    font-family: 'Pacifico','cursive';
}
.body{
    padding:10px;background-color:white;
}
.footer{
    background-color:#FFA07A;padding:10px;font-family: 'Pacifico','cursive';
}
.ab{
    margin-top:20px;margin-bottom:20px;
}
</style>
</head>
<body onLoad="message();">
<?php  include 'includes/header.php'; ?>
 <div class="container ab">
 <div class="row">
 <div class="col-md-8 col-lg-5 offset-lg-4 offset-md-2" style="padding:30px;background-color:rgba(0,0,0,0.5);border-radius:10px;">
 <div>
 <div class="heading"><h2>LOGIN</h2></div>
 <div class="body">
 <?php if($person=="customer"){?>
<p>Login to order food</p><?php }?>
<?php if($person=="restaurant"){?>
<p>Login to sell your food</p><?php }?>
 <form method="POST" action="login_submit.php?per=<?php echo $person;?>">
 <div class="form-group">
 <input type="email" class="form-control" placeholder="Email" name="email" required /></div>
 <div class="form-group">
 <input type="password" class="form-control" placeholder="Password" name="password" required /></div>
<div class="form-group"> <input type="submit" class="btn btn-primary" value="Submit"/></div>
 </form></div>
 <div class="footer" >Don't have an account?<a href="signup.php?per=<?php echo $person;?>" style="color:red;"> Register</a></div>
 </div></div>
 </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body></html>