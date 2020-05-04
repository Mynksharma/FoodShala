<?php require 'includes/common.php';
$choice=(isset($_GET['choice']) ? $_GET['choice'] : '');
if(isset($_SESSION['id']) && ($_SESSION['per']=="restaurant")){header("location:addmenu.php");} 
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
    body{margin:0;overflow-x:hidden;padding:0;background: url(images/food3.jpg) no-repeat center center; background-size: cover;height:100vh;background-attachment: fixed;}
.uli{
    color:black;
    
}
#content{padding-right:0px;}
#Brand{font-family: 'Pacifico','cursive';color:white;font-size:30px;}
.uli:hover{color:white;}
#sideoptions{float:left;background-color:rgba(0,0,0,0.5);position:fixed;margin:auto;top:0;bottom:0;width:230px;min-width:230px;height:200px;min-height:200px;}
#sideoptions ul{padding:5px;position:absolute;margin:auto;top:0;bottom:0;width:100%;height:90%;}
#sideoptions ul li{display:block;padding:20px;color:white;text-align:center;font-family: 'Pacifico','cursive';font-size:18px;cursor:pointer;}
#sideoptions ul li:hover{color:orange;}
#content{padding-left:250px;}
#menu{text-align:center;margin:0;font-family:'Pacifico','cursive';color:blue;cursor:pointer;}
@media screen and (max-width:992px){
#sideoptions{float:none;position:initial;margin:4px;width:100%;height:auto;min-height:auto;min-width:auto;}
#sideoptions ul{position:relative;width:80%;height:30px;margin:0;height:100%;margin:0 auto;}
#sideoptions ul li{display:inline-block;padding:20px;width:auto;height:100%;}
#content{padding-left:0;}
}
@media screen and (max-width:650px){
  #sideoptions ul li{display:block;width:100%;text-align:center;}
}
    </style>
    <script>
     function choice(ch){
 if(ch=='Veg') location.href="restaurants.php?choice=Veg";
 if(ch=='Non-veg') location.href="restaurants.php?choice=Non-veg";
 }
    </script>
</head>
<body>
<?php require 'includes/header.php' ?>
<div style="margin:10px;">
  <div id="sideoptions">
  <ul >
      <li onClick="choice('Veg');">Veg Restaurants</li>
      <li onClick="choice('Non-veg');">Non-veg Restaurants</li>
  </ul>
  </div>
  <div class="container-fluid" id="content"></div>
</div>
<script>
    <?php 
     if (isset($_GET['choice']))
    $sql="select resid,name,type,rating,profile_image from restaurant_details where type='$choice'";
    else 
    $sql="select resid,name,type,rating,profile_image from restaurant_details;";
          $result=mysqli_query($con,$sql);$num=0;
          while($r=mysqli_fetch_array($result)){if($num==0){?>
      var content=document.getElementById('content');
      var row=document.createElement('div');
          row.classList.add('row');
          content.appendChild(row);<?php } ?>
      var col=document.createElement('div');
      col.classList.add('col-md-4');
      col.classList.add('col-lg-4');
      col.style.minWidth="230px";
      col.style.padding="10px";
      row.appendChild(col);
      var card=document.createElement('div');
      card.classList.add('card');
      var card_img=document.createElement('img');
      card_img.classList.add('card-img-top');
      <?php if($r['profile_image']==NULL){ ?>
      card_img.setAttribute('src','images//default.png');
      <?php }else{ ?>
        card_img.setAttribute('src','restaurant_images//<?php echo $r['profile_image']; ?>');
      <?php } ?>
      card_img.style.height="230px";
      card_img.style.width="100%";
      card.appendChild(card_img);
      col.appendChild(card);
      var card_body=document.createElement('div');
      card_body.classList.add('card-body');
      var card_title=document.createElement('h5');
      card_title.classList.add('card-title');
      card_title.innerHTML="<?php echo $r['name'];?>";
      card_title.style.fontFamily="'Pacifico','cursive'";
      var card_subtitle=document.createElement('h5');
      card_subtitle.classList.add('card-subtitle');
      card_subtitle.classList.add('mb-2');
      card_subtitle.classList.add('text-muted');
      card_body.appendChild(card_title);
      card_body.appendChild(card_subtitle);
      var veg_nonveg=document.createElement('img');
      veg_nonveg.style.width="20px";
      veg_nonveg.style.height="20px";
      <?php if($r['type']=='Veg'){?>
      veg_nonveg.setAttribute('src','images//veg.png');
      <?php }elseif($r['type']=='Non-veg'){?>
      veg_nonveg.setAttribute('src','images//non-veg.png');
      <?php } ?>
      card_subtitle.appendChild(veg_nonveg);
      var node=document.createTextNode("  <?php echo $r['type'];?>");
      card_subtitle.appendChild(node);
      card.appendChild(card_body);
      var menu=document.createElement('p');
      menu.setAttribute('id','menu');
      var viewmenu=document.createElement('a');
      viewmenu.setAttribute('href','menu.php?resid=<?php echo $r['resid'];?>')
      viewmenu.innerHTML="View Menu ";
      var arrow=document.createElement('i');
      arrow.style.fontSize="20px";
      arrow.classList.add('fa');
      arrow.innerHTML="  &#xf061;";
      viewmenu.style.textDecoration="none";
      viewmenu.appendChild(arrow);
      menu.appendChild(viewmenu);
      card_body.appendChild(menu);
  <?php  $num+=1;if($num==3){$num=0;} } ?>
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>