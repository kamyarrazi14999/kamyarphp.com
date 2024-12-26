<?php
include '../controllers/cheaklogin.php';
// include '../../database.php';
// بررسی اینکه سشن استارت خورده از قبل یا نه
if(session_status()){
    session_start();
}
// بررسی اینکه آیا پیامی داریم یا نه
if (isset($_SESSION['message'])) {
    echo '<div class="alert">'.htmlspecialchars ($_SESSION['message']). '</div>';
    unset($_SESSION['message']);  // حذف پیام بعد ا�� نمایش
}
//  بررسی اینکه کاربر از منو وارد شده یا نه


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all-fonts.min.css">
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

  
    <title>Add New Post</title>
</head>
<body>
     <!-- sidebar -->
     <?php include 'sidebar.php'; ?>

     <div class="main-content">
        <h1>Add New Post</h1>
        <form action="../controllers/save_post.php" method="POST">
            <label for="title">Blog Editor</label>
            <input type="text" id="title" name="title" required> <br>
            <textarea name="blogContent" id="blogEditor"></textarea> </br>
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
</body>
</html>