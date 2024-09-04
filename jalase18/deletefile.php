<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 <style>
    body {
        text-align: center;
        background-image: linear-gradient(to right, #ff9900, #ff5733);
    }
    h1 {
        font-size: 40px;
        color: blue;
        margin-top: 20px;
        margin-bottom: 20px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
        text-shadow: 2px 2px 5px black;
        text-transform: uppercase;
        background-image: linear-gradient(to right, #ff5733, #ff9900);
        padding: 20px;

    }
    a {
        color: #f2e;
        text-decoration: none;
    }
    a:hover {
        color: red;
    }
    a:active {
        color: green;
    }
    a:visited {
        color:red;

    }

</style>
<body> 
    <?php

$filename = 'kami12.txt';
    if (file_exists($filename)) {
        if (unlink($filename)) {
            echo 'فایل پاک شد';

        } else {
            echo 'فایل پیدا نشد';
        }
    } else {
        echo 'فایل مورد نظر وجود ندارد<br>';
        echo " <a href='./creatfile.php'>💌 فایل دوست داری بسازی</a> ";
    }

    ?>
</body>
</html>