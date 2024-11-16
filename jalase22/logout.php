<?php 
session_start();

// بررسی وجود سشن
if (isset($_SESSION)) {
    // حذف کاربر از سیشن
    session_unset();
    session_destroy();
}

// حذف کوکی
setcookie('auth_token', "", time() - 3600); // مسیر کوکی را مشخص کنید

// هدایت به صفحه shope.php
header('Location: shope.php');
exit();
?>