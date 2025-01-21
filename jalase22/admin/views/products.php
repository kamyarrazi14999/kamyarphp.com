<?php
include '../controllers/cheaklogin.php';
require '../../database.php';
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
$test=2;
try{
// $stmt = $db->query("SELECT * FROM products where id = $test");
$stmt = $db->query("SELECT * FROM products  ");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);




} catch (Exception $e) {
    die("Error: " . $e->getMessage());

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all-fonts.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
    <style>
        .product-table {
    width: 100%;
    margin: 20px auto;
    text-align: center;
    font-family: 'Courier New', Courier, monospace;
    border-collapse: collapse;
    font-size: 10px;
}

.product-table thead {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    text-align: center;
    font-size: 15px;
    font-weight: 500;
}

.product-table th, .product-table td {
    padding: 10px;
    border: 1px solid #ddd;
    font-size: 10px;
    text-align: center;
}

.product-table tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
}

.product-table tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.075);
    cursor: pointer;
}


    </style>
<body>
    <!-- sidebar -->
     <?php include 'sidebar.php'; ?>
     <div class="main-content">
        <?php if(count($products) > 0):?>
        <h1>Products</h1>
        <div class="text-end">
            <!-- ایجاد محصول جدید -->
        <a href="createproduct.php" class="btn btn-primary">Add Product</a>
        </div>
        <h1 class="text-center my-4 ">Product list</h1>
        <table class="table table-bordered table-hover product-table">
            <thead  class=" table-dark  text-center">
                <tr>
                    <th>ID</th>
                    <th>Product Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>
                <?php foreach($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['id']); ?></td>
                        <td><?php echo htmlspecialchars($product['product_code']); ?></td>
                        <td><?php echo htmlspecialchars($product['product_title']); ?></td>
                        <td><?php echo htmlspecialchars($product['category']); ?></td>
                        <td><?php echo htmlspecialchars($product['brand']); ?></td>
                        <td><img class="product-image" src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['product_title']); ?>" width="50px" height="50px"></td>
                        <td><?php echo htmlspecialchars($product['price']); ?></td>
                        <td><?php echo htmlspecialchars($product['stock_quantity']); ?></td>
                        <td>
                            <a href="../controllers/editproduct.php?id=<?php echo $product['id']; ?>" class="btn btn-primary ">Edit</a>

                            <a href="../controllers/deleteproduct.php?id=<?php echo $product['id']; ?>" class="btn btn-danger ">Delete</a>
                            <button class="btn btn-danger btn-sm delet-product " data-id="<?php  ; ?>">delete B</button>
                       
                        </td>
                    </tr>
          </tbody>
                <?php endforeach; ?>


        </table>
         <?php else: ?>
            <h3>محصولی پیدا نشد</h3>
        <?php endif; ?>
       
     </div>
</body>
<script>

</script>

</html>