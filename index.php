<?php require 'includes/common.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>FoodShala</title>
    <style>
 body{margin:0;padding:0;overflow:hidden;background: url(images/food3.jpg) no-repeat center center; background-size: cover;height:100vh;}
.uli{
    color:black;
    
}
#Brand{font-family: 'Pacifico','cursive';color:white;font-size:30px;}
.home_content{
    position: absolute;margin:auto;left:0;right:0;width:70%;height:300px;top:0;bottom:0;text-align:center;
 padding-top: 6%;
padding-bottom: 6%;
}
.home_content h1{
    font-family: 'Pacifico','cursive';color:black;
    
}
.home_content p{
    color:white;
}
.home_content button{
   margin-bottom:50px;
    background-color:yellow;
    font-weight:bold;
}
#sellfood{color:orange;text-decoration:none;padding:10px;background-color:rgba(0,0,0,0.5);}
#ordernow a{text-decoration:none;color:black;}
    </style>
</head>
<body>
    <div class="home_content">
         <h1>Welcome to FoodShala</h1>
        <p><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b></p>
         <button class="btn btn-lg" id="ordernow"><a href="restaurants.php">Order Now</a></button><br>
         <a id="sellfood" href="login.php?per=restaurant"><b>Want to sell your food??</b></a>
    </div>
<?php require 'includes/header.php'; ?> 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>