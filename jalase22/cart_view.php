<?php
session_start();
$total_price=0;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="./css/cart-view.css">
    
    <?php  include "./header.php"   ?>
</head>
<body>
    <div class="container-cart-view">
        <h2>your cart</h2>

      <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <table>
        <thead>
        <tr>
         <th> porduct</th>
         <th> quantity</th>
         <th> price</th>
         <th> total</th>
        </tr>
        </thead>
        <tbody>
            
            <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
            <tr>
             <td> <?php echo $product['product_title']; ?> </td>
             <td><?php echo $product['quantity']; ?></td>                            
             <td> $<?php echo $product['price']; ?> </td>
             <td>$ <?php echo $product['price']*$product['quantity']; ?> </td>
            </tr>
            <?php $total_price += $product['price']*$product['quantity']; ?>
            <?php endforeach; ?>
        </tbody>    
        </table>
        <div class="car-total">
            <h4> sum:$<?php echo $total_price; ?> </h4>
            <?php $tax= $total_price * 9 /100;  $tax= number_format($tax, 2, '.');?>
            <h4>Tax: $ <?php echo $tax; ?></h4>
            <?php $total=$tax+$total_price;?>
            <h3>Total price:$ <?php echo $total; ?></h3>
            <?php $total_price=$total_price * 9 /100 + $total_price;
             $total_price=number_format($total_price, 2, '.');   
          ?>
          <a href="payment.php?total=<?php echo  $total_price;?>" class=checkout-btn>proceed to checkout</a> 
           <a  href="cancel.php" class=cancel-btn > cancel  </a>
        </div>
        <?php else : ?>
            <h3> Your cart is emply.</h3>
        <?php endif; ?>
         <a href="shope.php" class="continue-shoping">continue shoping</a>
    </div>
   
</body>
</html>