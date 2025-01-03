<?php 
// Include necessary files
include '../controllers/cheaklogin.php';
include '../../database.php';

try {
    // Prepare and execute the SQL query
    $stmt = $db->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    // Handle errors gracefully
    die("خطا در جستجوی کالا در دیتابیس: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all-fonts.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .product-table {
            width: 100%;
            margin: 20px auto;
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
        }
        .product-image {
            width: 100px;
            height: auto;
        }
        thead {
            /* background-color:rgb(24, 123, 223) !important; */
            color: white !important;
            font-weight: bold;
            text-align: center;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
          
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
    </style>
</head>
<body>
    <!-- Include sidebar -->
    <?php include 'sidebar.php'; ?>
    <div class="main-content">
        <h1>Product</h1>
        <?php if(count($products) > 0): ?>
            <table class="table table-bordered table-hover product-table">
                <thead class="  fa-italic">
                    <tr>
                        <th>ID</th>
                        <th>Product Code</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody class="table-success fa-fa">
                    <?php foreach($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['id']); ?></td>
                            <td><?php echo htmlspecialchars($product['product_code']); ?></td>
                            <td><?php echo htmlspecialchars($product['product_title']); ?></td>
                            <td><?php echo htmlspecialchars($product['category']); ?></td>
                            <td><?php echo htmlspecialchars($product['brand']); ?></td>
                            <td><img class="product-image" src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['product_title']); ?>"></td>
                            <td><?php echo htmlspecialchars($product['price']); ?></td>
                            <td><?php echo htmlspecialchars($product['stock_quantity']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h3>محصولی پیدا نشد</h3>
        <?php endif; ?>
    </div>
</body>
</html>