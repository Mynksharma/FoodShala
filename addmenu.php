<?php require 'includes/common.php';
if(!isset($_SESSION['email'])){header("location:login.php?per=restaurant");} 
if(isset($_SESSION['id']) && ($_SESSION['per']=="customer")){header("location:restaurants.php");} 
$sql="select resid,name,contact,type,Address,rating,profile_image from restaurant_details where resid=".$_SESSION['id'];
$result=mysqli_query($con,$sql);
$r=mysqli_fetch_array($result);
$sql="select * from food_items where resid=".$_SESSION['id'];
$food=mysqli_query($con,$sql);
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
.columnstyle{padding:20px;font-family: 'Pacifico','cursive';}
.columnstyle:hover{background-color:rgba(255, 160, 122,0.7)}
.columndiv{background-color:rgba(255,255,255,0.7);height:200px;width:100%;position:relative;}
.columndivinner{position:absolute;margin:auto;top:0;bottom:0;left:0;right:0;width:200px;height:50px;text-align:center;}
#items{padding:10px;overflow:auto;}
#items{margin:0;padding:0;list-style-type:none;}
#items li{padding:10px;font-weight:bold;width:100%;position:relative;}
#items li:hover{background-color:rgba(255, 160, 122,0.5);}
#brandname{padding-top:10px;padding-bottom:10px;}
#brandname h1{font-family:'Pacifico','cursive'}
#resname{margin-bottom:10px;}
#resnamerow{background-color:rgba(255,255,255,0.7);width:90%;margin:0 auto;}
.profilechange span:hover{color:green;}
    </style>
</head>
<body>
<?php require 'includes/header.php';?>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modal-head"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modcontent">
       
        </div>
        
      
        <div class="modal-footer" id="modfooter">
        <button type="button" class="btn btn-success" id="savemodalform">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <div id="resname">
 <div class="row" id="resnamerow">
 <div class="col-lg-3 col-sm-4 col-xs-12" style="padding-top:10px;padding-bottom:10px;">
 <?php if($r['profile_image']==null){ ?>
 <img src="images/default.png" alt="" style="width:100%;height:150px;">
<?php }else{ ?>
  <img src="<?php echo 'restaurant_images/'.$r['profile_image']; ?>" alt="" style="width:100%;height:150px;">
<?php } ?>
 </div>
 <div class="col-lg-9  col-sm-8 col-xs-12" id="brandname">
 <div style="float:left;">
 <h1><?php echo $r['name'];?></h1>
<p style="margin:0;">Address: <?php echo $r['Address'];?></p>
<p style="margin:0;">Phone: <?php echo $r['contact'];?></p>
<p style="color:blue;cursor:pointer;" class="profilechange"><span id="upimg" onclick="uploadimage();">Change Profile image <i style="color:red;">(.jpg,.jpeg,.png format only!)</i></span><span style="display:none;" id="btunsave">
<span id="filename"></span>
<button class="btn btn-success btn-sm" style="margin-right:10px;" onclick="save();">Save</button><button class="btn btn-danger btn-sm" onclick="cancel();">Cancel</button></span>
<form action="uploadimage.php" method="POST" enctype="multipart/form-data" id="resform"><input type="file" name="file" id="file" style="display:none;" /><input type="submit" style="display:none;" id="up" name="submit" /></form></p>
 </div>
 </div></div></div>
<div class="container">
<div class="row" id="row1">
</div>
<div class="row" id="row2">
</div>
</div>
</div>
<script>
var row1=document.getElementById('row1');
var row2=document.getElementById('row2');
for(let i=0;i<4;i++){
var col=document.createElement('div');
col.classList.add('columnstyle');
col.classList.add('col-lg-6');
col.classList.add('col-sm-6');
col.setAttribute('data-toggle','modal');
col.setAttribute('data-target','#myModal');
var col_div=document.createElement('div');
col_div.classList.add('columndiv');
col_div_inner=document.createElement('div');
col_div_inner.classList.add('columndivinner');
col_div.appendChild(col_div_inner);
var h5=document.createElement('h5');
col_div_inner.appendChild(h5);
col.appendChild(col_div);
switch(i){
   case 0: row1.appendChild(col);
   col.addEventListener('click',additem);
    h5.innerHTML="Add new item";break;
    case 1:row1.appendChild(col);
    col.addEventListener('click',menuitems);
    h5.innerHTML="Menu items";break;
    case 2:row2.appendChild(col);col.addEventListener("click",function(){location.href="vieworders.php?resid=<?php echo $r['resid']; ?>";});
    h5.innerHTML="View orders";break;
    case 3:row2.appendChild(col);
    col.addEventListener('click',restaurantdetails);
    h5.innerHTML="Edit Restaurant details";break;
}
}
function additem(){
  var modcontent=document.getElementById('modcontent');
  document.getElementById('modal-head').innerHTML="Add new item";
    modcontent.style.height="initial";
    document.getElementById('modfooter').style.display="initial";
      while(modcontent.firstChild){
          modcontent.removeChild(modcontent.firstChild);
      }

      var form=document.createElement('form');
      form.setAttribute('method','POST');
      form.setAttribute('action','addnewitem.php');
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Food Name: ";
      label.setAttribute('for','name');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','name');
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Cost: ";
      label.setAttribute('for','cost');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','cost');
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div'); 
      div.classList.add('form-check');div.classList.add('form-check-inline');
      var label=document.createElement('label');
      label.innerHTML=" Veg";
      label.classList.add('form-check-label');
      label.setAttribute('for','type');label.style.padding="5px";
      var input=document.createElement('input');
      input.setAttribute('type','radio');input.setAttribute('name','type');input.setAttribute('id','type');
      input.setAttribute('value','Veg');
      div.appendChild(input);
      div.appendChild(label);
      form.appendChild(div);
      <?php if($r['type']=='Non-veg'){?>
      div=document.createElement('div'); 
      div.classList.add('form-check');div.classList.add('form-check-inline');
      label=document.createElement('label');
      label.innerHTML="Non-Veg";
      label.classList.add('form-check-label');
      label.setAttribute('for','type');label.style.padding="5px";
      var input=document.createElement('input');
      input.setAttribute('type','radio');input.setAttribute('name','type');input.setAttribute('id','type');
      input.setAttribute('value','Non-veg');
      div.appendChild(input);
      div.appendChild(label);
      form.appendChild(div);
<?php } ?>
      var submit=document.createElement('input');
      submit.setAttribute('type','submit');submit.style.display="none";submit.setAttribute('id','editsubmit1');
      form.appendChild(submit);
      modcontent.appendChild(form);
    document.getElementById('savemodalform').addEventListener('click',function(){
        submit.click();
    });
  
}
function menuitems(){
  var modcontent=document.getElementById('modcontent');document.getElementById('modfooter').style.display="none";
  while(modcontent.firstChild){
          modcontent.removeChild(modcontent.firstChild);
      }
    document.getElementById('modal-head').innerHTML="Menu items";
     var menu=document.createElement('ul');
     menu.setAttribute('id','items');
     modcontent.appendChild(menu);modcontent.style.overflow="auto";modcontent.style.height="400px";
  <?php while($fod=mysqli_fetch_array($food)){ ?>
     var menulist=document.createElement('li');
     menu.appendChild(menulist);
     var typeimg=document.createElement('img');
     typeimg.style.width="15px";typeimg.style.height="15px";
     <?php if($fod['type']=='Veg'){?>
     typeimg.setAttribute('src','images//veg.png');
<?php } ?>
<?php if($fod['type']=='Non-veg'){?>
     typeimg.setAttribute('src','images//non-veg.png');
<?php } ?>
     menulist.appendChild(typeimg);
     var dishname=document.createElement('span');
     dishname.innerHTML=" <?php echo $fod['food_name'];?>";
     menulist.appendChild(dishname);
     var cost=document.createElement('p');
     cost.style.color="grey";cost.style.margin="0"; 
     var costsymbol=document.createElement('i');costsymbol.style.fontSize="14px";
     costsymbol.classList.add('fa');costsymbol.innerHTML="&#xf156;";
     var text=document.createTextNode('Cost: ');
     cost.appendChild(text);cost.appendChild(costsymbol);
     text=document.createTextNode('<?php echo $fod['cost'];?>');cost.appendChild(text);
     menulist.appendChild(cost);
     var removebutton=document.createElement('button');
     removebutton.classList.add('btn');
     removebutton.classList.add('btn-danger');
     removebutton.style.position="absolute";removebutton.style.top="10px";removebutton.style.right="10px";
     removebutton.innerHTML="Remove";
     removebutton.addEventListener("click",function(){
       location.href="removeitem.php?item=<?php echo $fod['foodid'];?>";
     });
     menulist.appendChild(removebutton);<?php } ?>
     console.log(modcontent);
     if(!menu.firstChild){
       var text=document.createElement('span');
       text.innerHTML="Add menu items..";text.style.fontWeight="bold";
       menu.appendChild(text);
     }
}
function restaurantdetails(){
    var modcontent=document.getElementById('modcontent');
    document.getElementById('modal-head').innerHTML="Edit Restaurant Details";
    modcontent.style.height="initial";
    document.getElementById('modfooter').style.display="initial";
      while(modcontent.firstChild){
          modcontent.removeChild(modcontent.firstChild);
      }
      var form=document.createElement('form');
      form.setAttribute('method','POST');
      form.setAttribute('action','editresdetails.php');
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Name: ";
      label.setAttribute('for','name');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','name');
      input.setAttribute('value','<?php echo $r['name']; ?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Address: ";
      label.setAttribute('for','address');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','address');
      input.setAttribute('value','<?php echo $r['Address']; ?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Phone: ";
      label.setAttribute('for','phone');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','contact');
      input.setAttribute('value','<?php echo $r['contact']; ?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var submit=document.createElement('input');
      submit.setAttribute('type','submit');submit.style.display="none";submit.setAttribute('id','editsubmit1');
      form.appendChild(submit);
      modcontent.appendChild(form);
    document.getElementById('savemodalform').addEventListener('click',function(){
        submit.click();
    });
}
function uploadimage(){
       var res=document.getElementById("file");
       res.click();
       res.addEventListener('change',function(event){
    document.getElementById('upimg').style.display="none";
           document.getElementById('btunsave').style.display="inline";
           var files=event.target.files;
           var f=files[0];
    document.getElementById('filename').innerHTML=f.name;
       });
        
    }
    function cancel(){
        document.getElementById('resform').reset();
        document.getElementById('upimg').style.display="initial";
        document.getElementById('btunsave').style.display="none";
    }
    function save(){
        document.getElementById('upimg').style.display="initial";
        document.getElementById('btunsave').style.display="none";
        document.getElementById('up').click();
        document.getElementById('resform').reset();
    }
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>