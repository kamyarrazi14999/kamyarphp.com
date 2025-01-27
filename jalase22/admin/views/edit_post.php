<?php
include '../controllers/cheaklogin.php';
include '../../database.php';
// دریافت پست ایدی از متد پست

$post_id = $_GET['post_id'] ?? '';

if($post_id){
       // دریافت مقادیر پست از دیتابیس
       $stmt = $db->prepare("SELECT * FROM blog_posts WHERE post_id = :post_id");
       $stmt->execute(['post_id' => $post_id]);
       $post = $stmt->fetch(PDO::FETCH_ASSOC);
   
       if(!$post) {
           $_SESSION['message'] = "پست مورد نظر یافت نشد";
           header('Location: blog.php');
           exit;
       }
       $title = $post['title'];
       $content = $post['content'];
}else {
    $_SESSION['message'] = "پست مورد نظر یافت نشد";
    header('Location: blog.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit post</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all-fonts.min.css">
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <meta name="robots" content="noindex, follow">
    <meta name="googlebot" content="noindex">
</head>
<body>
    <?php include 'sidebar.php'; ?>
   <div class="main-content">
   <h1>Edit Post</h1>
        <form action="../controllers/save_post.php" method="POST">
 
            <label for="title">Blog Editor</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?> " required> <br>
            <textarea name="blogContent" id="blogEditor"> <?php echo htmlspecialchars($content, ENT_QUOTES, 'UTF-8'); ?> 

        
        
        </textarea> </br>
            <button type="submit">Save Blog</button>
         
        </form>
     </div>
     <script>
        CKEDITOR.replace('blogEditor', {
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