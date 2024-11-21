<?php
session_start();
//ارتباط با دیتاییست
include 'database.php'  ;
// بررسی ست شدن
if(isset($_GET['total'])){
    $total_price = $_GET['total'];
}else{
    die("Error: Total price not found.");
}

// بررسی ایتم سبد خرید 
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
   $user_id = $_SESSION['user_id']; 


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
// $transaction_reference = uniqid('txn');
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
    <style>
        body {
            background-color: #f1f1f1;
        }
       .checkout-btn {     
        background-color: #4CAF50;  
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        }
        .cancel-btn {
            background-color: #f44336;
            color: white;
            margin-left: 10px;
            border: none;
            padding: 15px 32px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
        }
        h2 {
            text-align: center;
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        @media screen and (max-width: 600px) {
            form {
                text-align: left;
            }
        }
        @media screen and (max-width: 400px) {
            form {
                text-align: left;
            }
        }
        
        </style>
</head>
<body>
  <div>
    <h2> paymenat geteway parsian-mellet</h2>
    <form action="pyment_process.php" method="get">
        <input type="hidden" name="total" value="<?php echo $total_price;?>">
        <input type="hidden" name="order_id" value="<?php echo $order_id;?>"> 
        <button type="submit" name=" action" value="pay" class=checkout-btn>Pay NOW  </button>
        <button type="submit" name="action" value="cancel" class="cancel-btn" >Cancel</button>
    </form>

  </div>  

    
</body>
</html>