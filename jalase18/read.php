<?php

$fillname = 'kami12.txt';
if (file_exists($fillname)) {
    $filecontent =
    file_get_contents($fillname);
} else {
    $filecontent = "فایل مورد نظر $fillname یافت نشد";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
.file-content{
border: 1px solid gray ;
padding: 20px;
margin: 20px 0;
background-color: #504830;
white-space: pre-wrap;
color: white;
font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;  
}



    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div class="file-content">
    <?php echo nl2br(htmlspecialchars($filecontent)); ?>
   </div> 
    
</body>
</html>