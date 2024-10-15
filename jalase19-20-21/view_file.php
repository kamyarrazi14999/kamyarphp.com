<?php


if(isset($_GET['file'])){
    $file = './uploads/'.$_GET['file'];
    if(isset($_POST['content'])){
        file_put_contents($file, $_POST['content']);
        header("location: index.php");
        exit();
    }
    
    $content = file_get_contents($file);
}
?>
<style>
textarea {
    width: 100%;
    height: 300px;
    border: 1px solid #ccc;
    padding: 8px;
    margin-bottom: 10px;
    resize: vertical;
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
    background-color: #26d996;
    color: #fff;
}
button {
    padding: 10px 20px;
    background-color: #26d996;
    color: #fff;
    border: none;
    cursor: pointer;
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
    transition: background-color 0.3s ease;
    animation-duration: 3s ;
    animation-name: hadi;
    animation-timing-function: ease-in-out;
    animation-iteration-count: infinite;
    border-radius: 8px;
}
button:hover {
    background-color:#163769;

}
@keyframes hadi {
    0% {background-color: #163769;}
    50% {background-color: 000080;}
    100% {background-color: #26d996;}
}
@media screen and (max-width: 600px) {
    textarea {
        font-size: 14px;
    }
    button {
        font-size: 12px;
        padding: 8px 16px;
        border-radius: 4px;

    }
    
}
@media screen and (max-width: 400px) {
    textarea {
        font-size: 12px;
    }
    button {
        font-size: 10px;
        padding: 6px 12px;
        border-radius: 2px;
    }
    
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show content</title>
</head>
<body>
    <!-- نمایش محتوای فایل -->
      <h1>View and edit file</h1>
      <form  action="" method="post">
<textarea name="content" rows="20"    cols="100" > <?php echo htmlspecialchars($content); ?></textarea><br> 
<button type="submit">Save</button>

      </form>
</body>
</html>