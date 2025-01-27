<?php
include 'cheaklogin.php';
include '../../database.php';
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

// دریافت اطلاعات از فرم
$product_id = $_POST['product_id'] ?? '';
$title = $post['title'];
$content = $post['content'];


try{
    // ا
    $stmt = $db->prepare("UPDATE products SET product_code = :product_code, price = :price, stock_quantity = :stock_quantity WHERE product_id = :product_id  LIMIT 1  ");
    $stmt->execute([
        'product_code' => $_POST['product_code'],
        'price' => $_POST['price'],
        'stock_quantity' => $_POST['stock_quantity'],
        'product_id' => $product_id
    ]);
    //نمایش پیغام
    $_SESSION['message'] = "کالا با موفقیت ویرایش شد";
}
catch (PDOException $e) {
    die("خطا در ویرایش کالا: " . $e->getMessage());
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editproduct</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all-fonts.min.css">
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <meta name="robots" content="noindex, follow">
    <meta name="googlebot" content="noindex">
</head>
<body>
    <?php include '../views/sidebar.php'; ?>
   <div class="main-content">
   <h1>Edit Post</h1>
        <form action="../controllers/save_post.php" method="POST">
 
            <label for="title">product Editor</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?> " required> <br>
            <textarea name="editorproduct" id="editorproduct"> <?php echo htmlspecialchars($content, ENT_QUOTES, 'UTF-8'); ?> 

        
        
        </textarea> </br>
            <button type="submit">Save </button>
         
        </form>
     </div>
     <script>
        CKEDITOR.replace('editorproduct', {
            height:500,
            toolbar:[
                {name:'Clipboard',items:['cut','copy','paste','undo','redo']},
                {name:'Basicstyles',items:['Bold','Italic','Underline','Strike','-','RemoveFormat']},
                {name:'Paragraph',items:['NumberedList','BulletedList']},
                {name:'Link',items:['Link','Unlink']},
                {name:'Insert',items:['Image','Table','HorizontalRule','SpecialChar']},
                {name:'Tools',items:['Maximize']},
                {name:'document',items:['Source','Preview', 'Print']}
            ],
            removePlugins: 'elementspath',
            resize_enabled:true,
        });      
     </script>
     </div>
  
</body>
</html>