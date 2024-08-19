<?php
$fillname= "kami12.txt";
if(file_exists($fillname)){
$fill =fopen($fillname,'w');
if( $fill){
fclose($fill);
echo "محتوای فایل پاک شد";


}
else{

echo "محتوای فایل پاک نشد";


}




}
else{

echo "فایل پیدا نشد";

}


?>