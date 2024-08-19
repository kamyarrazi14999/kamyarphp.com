<?php
$fillname ='kami12.txt';
$newcontent ="این یک متن جدید در این صفحه است ";
if(file_exists($fillname)){
$fill= fopen($fillname,'a');
if($fill){
fwrite($fill,PHP_EOL.$newcontent);
fclose($fill);
echo "متن با موفقیت اضافه شد";

}
else{
    echo "خطایی $fillname  رخ داده است";
if(!file_exists($fillname)){
    $fill= fopen($fillname,'w');
    fwrite($fill,PHP_EOL.$newcontent);
    fclose($fill);
    echo "متن با موفقیت اضافه شد";
}





}




}



?>