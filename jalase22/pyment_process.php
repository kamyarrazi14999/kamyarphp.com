<?php 
session_start();
include 'database.php';


// بررسی نوع متد که آیا متد گت استفاده شده است یا نه 
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $action = $_GET['action'] ?? '';


    // بررسی وضعیت پرداخت
    if($action == 'pay'){
        // دریافت اطلاعات فرم و قرار دادن آن در متغیر
        $order_id = $_GET['order_id'];
        $total_price = $_GET['total'];

        // استفاده از درگاه پرداخت واقعی
        // $transaction_reference =  $_GET['transaction_reference'];
        // ایجاد یک تراکنش یونیک
        $transaction_reference =  uniqid('txn');

        $transaction_query = "INSERT INTO transactions (order_id, user_id, amount, payment_method, status, transaction_reference) VALUES (?,?,?,'Bank_geteway','successful',?)";
        $stmt = $db->prepare($transaction_query);
        $user_id = $_SESSION['user_id'];

        if($stmt->execute([$order_id,$user_id,$total_price,$transaction_reference])) {
            // پاک کردن سبد خرید
            unset($_SESSION['cart']);

            // نمایش اطلاعات در صفحه 
            // میتوانید در این بخش از متغیر استفاده کنید که توسط اچ تی ام ال این اطلاعاات را نمایش دهد
            echo "<h2>Seucssesfully Payment</h2>";
            echo "Order ID: $order_id<br>";
            echo "Total Price: $total_price<br>";
            echo "Transaction Reference: $transaction_reference<br>";
            }else {
                // در صورت بروز خطا یا کنسل کردن پرداخت
                echo "<h2>Payment Failed</h2>";
                echo "Error: Unknown payment or payment failed or Unable to process....";
            }

}elseif($action == "cancel"){
    // در صورتی که کاربر دکنه کنسل را برای لغو پرداخت زده باشد
    echo "<h2>Payment Cancelled</h2>";
}
}else {
    die("Invalid request method.");
}
?>

<a href="shope.php">Return to shop</a>