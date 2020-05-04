<nav class="navbar navbar-expand-lg ">
<?php if(!isset($_SESSION['id'])){?>
  <a class="navbar-brand" href="index.php" id="Brand">FoodShala</a>
<?php } else{?>
<?php if($_SESSION['per']=='customer'){?> 
  <a class="navbar-brand" href="restaurants.php" id="Brand">FoodShala</a>
<?php } ?>
<?php if($_SESSION['per']=='restaurant'){?> 
  <a class="navbar-brand" href="addmenu.php" id="Brand">FoodShala</a>
<?php }} ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="background-color:yellow;">
  <i class="material-icons">&#xe8ee;</i>
  </button>
  <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNavDropdown" style="padding-right:70px;">
    <ul class="navbar-nav" style="font-weight:bold;">  
      <?php if(!isset($_SESSION['id'])){?>
        <li class="nav-item">
        <a class="nav-link  uli" href="index.php"> Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link uli" href="restaurants.php">Restaurants</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle uli" href="#" id="navbarDropdownloginLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > Login</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="login.php?per=customer"> As Customer</a>
          <a class="dropdown-item" href="login.php?per=restaurant"> As Restaurant</a>
        </div>
      </li> <li class="nav-item dropdown dropdown-menu-left">
        <a class="nav-link dropdown-toggle uli" href="#" id="navbarDropdownsignupLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Signup
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="signup.php?per=customer"> As Customer</a>
          <a class="dropdown-item" href="signup.php?per=restaurant"> As Restaurant</a>
        </div>
      </li><?php }else{?>
        <li class="nav-item">
      <?php if($_SESSION['per']=='customer'){?>
        <a class="nav-link uli" href="restaurants.php">Home</a>
    <?php } 
    else if($_SESSION['per']=='restaurant'){?>
    <a class="nav-link uli" href="addmenu.php">Home</a>
    <?php } ?>
    </li>
    <?php if($_SESSION['per']=='customer'){?>
      <li class="nav-item">
        <a class="nav-link uli" href="cart.php">Cart</a>
      </li>
    <?php }?>
        <li class="nav-item">
        <a class="nav-link uli" href="logout.php"> Logout</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>