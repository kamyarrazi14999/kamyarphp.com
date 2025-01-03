
<?php
include '../controllers/cheaklogin.php';
// include '../../database.php';
// بررسی اینکه سشن استارت خورده از قبل یا نه
if(session_status() === PHP_SESSION_NONE){
    session_start();
}


//  بررسی اینکه کاربر از منو وارد شده یا نه
$is_from_menu = isset($_GET['from_menu']) && $_GET['from_menu'] == true;
$title = '';
$content = '';
// اگر از منو وارد شده بود متن پاک شود
if ($is_from_menu) {
unset($_SESSION['title']);
unset($_SESSION['content']);

} else {
    $title = $_SESSION['title'] ?? '';
    $content = $_SESSION['content'] ?? '';
}

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
<style>

    .alert{
    position: fixed;
    top: 20px;
    right: 20px;
    background-color:rgb(37, 230, 30);
    color:wheat;
    padding: 15px;
    border-radius: 5px;
    box-shadow:  0 4px 6px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
    z-index: 9999; 
    animation: fadeIn 0.5s ease fadeout 0.5s ease ; 
    }
    @keyframes fadeIn {
        from { opacity: 0; tronsform: translateY(20px); }
        to { opacity: 1; transform: translateY(0px); }
        
    } 
    @keyframes fadeout {
        from { opacity: 1; transform: translateY(0); }
        to { opacity: 0; transform:translateY(20px); }
        
    } 

</style>
<body>
     <!-- sidebar -->
     <?php include 'sidebar.php'; ?>

     <div class="main-content">
        <h1>Add New Post</h1>
        <form action="../controllers/save_post.php" method="POST">
        <?php
        // بررسی اینکه آیا پیامی داریم یا نه
if (isset($_SESSION['message'])) {
    echo '<div class="alert">'.htmlspecialchars ($_SESSION['message']). '</div>';
    unset($_SESSION['message']);    
}  
        ?>
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
</body>
</html>