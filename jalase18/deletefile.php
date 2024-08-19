<?php

$filename="kami12.txt";
if(file_exists($filename)){
    if(unlink($filename)){
        echo "فایل پاک شد";
    }else{

echo "فایل پیدا نشد";

    }
}
else{
echo"فایل مورد نظر وجود ندارد"."<br>";
echo" <a href='./creatfile.php'>اگر میخوای فایل بسازی</a> ";

}



?>
