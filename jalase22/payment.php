<?php
session_start();
//ارتباط با دیتاییست
include 'database.php';
// بررسی ست شدن
if(isset($_GET['total'])){
    $total_price = $_GET['total'];
}else{
    die("Error: Total price not found.");
}
// بررسی ایتم سبد خرید 
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
   $user_id = $_SESSION['user_id']; 
   $total_price = $_GET['total'];

   try{
    // شروع تراکنش
    $db->beginTransaction();
    // ایجاد سفارش جدید در جدول سفارشات
    $order_query = "INSERT INTO orders (user_id, order_date, status, total_amount) VALUES (:user_id, NOW(), 'pending', :total_price)";
    $stmt = $db->prepare($order_query);
    $stmt->execute(['user_id' => $user_id, 'total_price' => $total_price]);
    // دریافت اخرین سفارش ذخیره شده ایدی 
    $order_id = $db->lastInsertId();
// ذخیره ایتم های سبد خرید برای این شماره سفارش جاری جدول 
    
$order_item_query="INSERT INTO orderitems (order_id, product_id, quantity,price) VALUES (:order_id, :product_id, :quantity, :price)";
$stmt = $db->prepare($order_item_query);
foreach ($_SESSION['cart'] as $product_id => $product) {
    $stmt->execute(['order_id' => $order_id, 'product_id' => $product_id, 'quantity' => $product['quantity'], 'price' => $product['price']]);
}
// برای تغییر وضعیت تایید شده به سفارشات جدید ایجاد کنید
//تایید سفارش 
$db->commit();
   }
   catch(PDOException $e){
    // در صورت خطا بازگشت به مرحله قبل
    $db->rollBack();
    die("Error: " . $e->getMessage());
   }
}else{
    die("Error: Cart is empty.");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PAYMENT</title>
</head>
<body>
  <div>
    <h1> paymenat geteway parsian-mellet</h1>
    <form action="payment_process.php" method="post">
        

  </div>  

    
</body>
</html>