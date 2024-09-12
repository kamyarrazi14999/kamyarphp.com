<?php

if(isset($_GET['file'])) {
    $file = './uploads/'.$_GET['file'];
// موجدیت فایل را بررسی می کنیم 
if(file_exists($file)){
    header('Content-Description: Fie Transfer');
    // نوع فایل را دریافت می‌کنیم
    header('Content-Type: application/octet-stream');
    // نام فایل را دریافت می‌کنیم
    // مشخص کنیم که فایل با مشخص شده را دانلود کنیم
    header('content-Disposition: attachment; filename="'.basename($file));
//برای مروگر به نمایش دادن فایل و کش فایل  منفظی میشود
    header('Expires: 0');
    // مشخص کنیم که فایل از طرف مشخص شده را دانلود کنیم
    header('Cache-Control: must-revalidate');
    // نوع ارسال می‌کنیم
    header('Pragma: public');
    // سایز فایل را دریافت می‌کنیم
    header('Content-length: '. filesize($file));
        // ارسال مستقیم فایل از سرور به مروگر
        readfile($file);
    exit();
}
}

?>