<?php
include './cheaklogin.php';
include '../../database.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get product ID from the URL
$product_id = $_GET['id'] ?? '';

// Fetch product details based on the product ID
$product_query = "SELECT * FROM products WHERE id=?";
$stmt = $db->prepare($product_query);
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// If no product found with the given ID, redirect to the products page
if (!$product) {
    header('Location: products.php');
    exit;
}

// Rest of the code...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all-fonts.min.css">
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <meta name="robots" content="noindex, follow">
    <meta name="googlebot" content="noindex">
</head>
<body>
    <?php include '../views/sidebar.php'; ?>
    <div class="main-content">
        <h1>Edit Product</h1>
        <form action="" method="POST">
            <label for="title">Product Title</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($product['product_title']); ?>" required> <br>
            <textarea name="editorproduct" id="editorproduct"><?php echo htmlspecialchars($product['product_code'], ENT_QUOTES, 'UTF-8'); ?></textarea> <br>
            <button type="submit">Save</button>
        </form>
    </div>
    <script>
        CKEDITOR.replace('editorproduct', {
            height: 500,
            toolbar: [
                {name: 'Clipboard', items: ['cut', 'copy', 'paste', 'undo', 'redo']},
                {name: 'Basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']},
                {name: 'Paragraph', items: ['NumberedList', 'BulletedList']},
                {name: 'Link', items: ['Link', 'Unlink']},
                {name: 'Insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar']},
                {name: 'Tools', items: ['Maximize']},
                {name: 'document', items: ['Source', 'Preview', 'Print']}
            ],
            removePlugins: 'elementspath',
            resize_enabled: true,
        });
    </script>
</body>
</html>


