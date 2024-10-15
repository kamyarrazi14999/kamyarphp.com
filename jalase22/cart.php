<?php 
session_start();
require 'database.php';


//  بررسی اینکه محصول توسط فرم ارسال شده است یا نه 
if(isset($_POST['product_id'])){
    $product_id = $_POST['product_id'];

    // بررسی اینکه آیا این محصول در سبد خرید ما وجود دارد یا خیر
    if(isset($_SESSION['cart'][$product_id])){
        $_SESSION['cart'][$product_id]['quantity']++;
    }else {
        //  ارتباط با دیتا بیس برای دریافت اطلاعات بر اساس آی دی
        $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id'=>$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

       if($product) {
        // اضافه کردن مجصول انتخاب شده به سبد خرید
        $_SESSION['cart'][$product_id] = [
            'product_title' => $product['product_title'],
            'price' => $product['price'],
            'quantity' => 1
        ];
       }

    }
    // هدایت به صفحه فروشگاه
    header('location:shope.php');
    exit();
}


?>