<?php
include '../controllers/cheaklogin.php';
require '../../database.php';

if(session_status() === PHP_SESSION_NONE){
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$product_code = $_POST['product_code'];
$product_title = $_POST['product_title'];
$image_url = $_POST['image_url'];
$category = $_POST['category'];
$price = $_POST['price'];
$brand = $_POST['brand'];
$stock_quantity = $_POST['stock_quantity'];
$short_description = $_POST['short_description'];
    try {
        $stmt = $db->prepare("INSERT INTO products  (product_code, product_title, image_url, category, price, brand, stock_quantity, short_description) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$product_code, $product_title, $image_url, $category, $price, $brand, $stock_quantity, $short_description]);
        $_SESSION['message'] = "کالا با موفقیت   $product_title ایجاد شد";

        header('Location:../views/products.php');
        exit();
    }
    catch (PDOException  $e) {
        die("خطا در ذخیره اطلاعات کالا: " . $e->getMessage());
    }
} 
?>