<?php
session_start();
require 'database.php';
include 'config.php';
$stmt = $db->query('SELECT * FROM products');
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($products);
//  echo"</pre>";
$cart_count = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'],'quantity'))  : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shope</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/image55.jpg" type="image/x-icon" width="100px">
  
    <link rel="stylesheet" href="./fontawesome/css/all-fonts.min.css" >
    <link rel="stylesheet" href="ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" >

<?php include './header.php'; ?>
</head>
<body>
    <h1>SHOP</h1>
    <!--نمایش کالا ها در سبد خرید   -->
    
    <div class= 'container' id="product">
       <div class='product-container'>
        <?php foreach ($products as $product) : ?>
        <div class='product-card'>  
        <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['product_title']; ?>" onerror="this.src='./images/No-Image-Placeholder.svg.png';" width="260px" height="250px">
          <h2><?php echo $product['product_title']; ?></h2>
          <p class="price"> <?php echo $pricetext. ''. $product['price']; ?></p>
          <p><?php echo $product['short_description']; ?></p>
          <p><?php echo $product['brand']; ?></p>
          <form action="cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <button type="submit" class="add-to-cart">Add to cart</button>
          </form>
        </div>
        <?php endforeach;?>
       </div>
    </div>
   <script>
    $(document).ready(function(){
      $("#product").load("load_products.php");
    });
    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $(document).height() - 50){
        $("#product").load("load_products.php");
      }
    });

    
    $go=document.querySelector(".product");
    $go.addEventListener("click",function(){
      $go.style.display="none";
      document.querySelector("#product").innerHTML='<h1>Loading...</h1>';
      setTimeout(function(){
        $go.style.display="block";
        document.querySelector("#product").innerHTML='';
        $("#product").load("load_products.php");
      },1000);
    })

   </script>
      
</body>
</html>