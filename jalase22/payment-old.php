<?php
session_start();
if(isset($_GET['total'])){
    $total_price = $_GET['total'];
}
else{
 $total_price=0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment Geteway </title>
</head>
<link rel="stylesheet" href="./css/cart-view.css">
<body>
    <div  class="cart-container">
        <h2>payment Getway payment parsian-Mellat-saderat </h2>
        <form action="payment_process.php" method="post">
         <input type="hidden" name="total" value="<?php echo $total_price; ?>">
         <button type="submit" name='action'  value= pay class="checkout-btn">payment</button>
         <button type="submit"  name='action'   class="cancel-btn" value= cancel>cancel</button>
       </form>
    </div>
</body>
</html>