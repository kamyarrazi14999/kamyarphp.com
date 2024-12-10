
<?php
$cart_count = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'],'quantity')) : 0;
$current_page = $_SERVER['REQUEST_URI'];
require 'auth.php';
$islogin = isset($_SESSION['user_id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./css/header.css">
     <link rel="stylesheet" href="./css/style.css">
     <link rel="stylesheet" href="./fontawesome/css/all-fonts.min.css" >
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-light mymenu">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/jalase22/shope.php"> <img src="./images/logo1.png"  alt="" width="80px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/jalase22/shope.php">Home</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="./cart_view.php">My Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="./admin/">My Account</a></li>
        <li class="nav-item"><a class="nav-link" href="#">My Favorete</a></li>
        <?php if ($islogin):?>
       <li class="nav-item">
        <a class="nav-link" href="./logout.php">LogOut</a>
       </li>
       <?php else:?>
        <li class="nav-item">
        <a class="nav-link" href="./login.php">Login</a>
       </li>
       <?php endif;?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
        <ul class="dropdown-menu">
  <li><a class="dropdown-item" href="#">Action</a></li>
  <li><a class="dropdown-item" href="#">Another action</a></li>
  <li><hr class="dropdown-divider"></li>
  <li><a class="dropdown-item" href="#">Something else here</a></li>
  <li><a class="dropdown-item" href="#">Separated link</a></li>
</ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Link</a>
        </li> -->
        
      </ul>
      <?php if( strpos($current_page,'cart_view.php')==false): ?>
      <div class='cart-counter'>
     <a href='cart_view.php'> <i class='fas fa-shopping-cart baba'></i>سبد خرید ( <?php echo $cart_count ?> )</a>
    </div>
    <?php endif; ?>
    <a class="nav-link " id="theme-toggle" href="">  <i class="fas fa-moon"></i></a>


      <form class="d-flex" role="search">
        
        <input class="form-control me-2 my-input" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-btn" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav> 



</body>


</html>