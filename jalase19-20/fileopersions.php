<?php

if(isset($_POST['create'])){
   $name  = $_POST['new_fill_name'];
   $type =$_POST['type'];
   $current_dir= isset ($_POST['current_dir']) ? $_POST['current_dir']  :''  ;
   $path ='./uploads'.$current_dir.'/'.$name;
   //اگر فولدر بود اوپن کن اگر فایل بود نوشته کن یا بساز
   if($type=='file'){
fopen($path, 'w');
   }
   else if($type=='folder'){
    mkdir($path);


   }
   //برای بازگشت به فرم ایجاد فایل یا
 header('location:index.php ?dir='.urlencode($current_dir) );
 exit();
}


?>