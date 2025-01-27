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
$product_url = $_POST['product_url'];
$category = $_POST['category'];
$price = $_POST['price'];
$brand = $_POST['brand'];
$stock_quantity = $_POST['stock_quantity'];
$short_description = $_POST['short_description'];
    try {
        $stmt = $db->prepare("INSERT INTO products  (product_code, product_title, image_url, product_url, category, price, brand, stock_quantity, short_description) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$product_code, $product_title, $image_url, $product_url, $category, $price, $brand, $stock_quantity, $short_description]);
        $_SESSION['message'] = "کالا با موفقیت   $product_title ایجاد شد";

        header('Location:../views/products.php');
        exit();
    }
    catch (PDOException  $e) {
        die("خطا در ذخیره اطلاعات کالا: " . $e->getMessage());
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create product</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
/* راست چین */
 .baba{
    direction: rtl;
    font-family: 'Segoe UI', Arial, sans-serif;

 
 }
.gax{
    display: flex;
    flex-direction:column;
    flex-wrap: nowrap;
    gap: 10px;
    width: 300px;
    background-color: #f1f1f1;
    padding: 5px;
    border-radius: 5px;
   font-size: 20px;
 

    
}



</style>
<link rel="stylesheet" href="../assets/css/styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<body>
    <?php include './sidebar.php';?>
    <div class="main-content baba">
        <h1>افزودن کالا</h1>
        <form action="createproduct.php" method="post">
            <div class="mb-3 gax">
                <label for="product_code">کد کالا</label>
                <input type="text" class="form-control" id="product_code" name="product_code" required>
            </div>
            <div class=" mb-3 gax">
                <label for="image_url">عکس کالا</label>
                <input type="text" class="form-control" id="image_url" name="image_url" required>
            </div>
            <div class="mb-3 gax">
                <label for="image_product">عکس کالا در محل نمایش</label>
                <input type="text" class="form-control" id="image_product" name="image_product" required>
            </div>
            <div class="mb-3 gax">
                <label for="product_title">عنوان کالا</label>
                <input type="text" class="form-control" id="product_title" name="product_title" required>
            </div>
            <div class="mb-3 gax">
                <label for="category">گروه کالا</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="mb-3 gax">
                <label for="brand">برند</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
            </div>
            <div class="mb-3 gax">
                <label for="price">قیمت</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3 gax">
                <label for="stock_quantity">تعداد موجود</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
            </div>
            <div class="mb-3 gax">
                <label for="short_description">توضیحات کوتاه</label>
                <textarea class="form-control" id="short_description" name="short_description" required></textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">افزودن کالا</button>
        </form>
    </div>
    
</body>
</html>