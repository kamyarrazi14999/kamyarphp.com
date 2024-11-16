<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if(session_status() === PHP_SESSION_NONE){
    session_start();
}
$key='3e69292ce6c53066f60e58d24cc13c9f5e2a16fced5ff341237ad21ba181da2f';

if(isset($_COOKIE['auth_token'])){
    // اگر کوکی معتبر باشد
    try {
        $jwt = $_COOKIE['auth_token'];
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
       
        $_SESSION['user_id'] = $decoded->user_id; // اصلاح شده
        $_SESSION['username'] = $decoded->username; // اصلاح شده
    } catch (Exception $e) {
        // Invalid token
        if(basename($_SERVER['PHP_SELF']) !== 'shope.php'){
            header('Location:shope.php');
            exit();
        }
    }
}else {
    // اگر کوکی معتبر نباشد
    // if(basename($_SERVER['PHP_SELF']) !== 'auth.php'){
    //     header('Location:shope.php');
    //     exit();
    // }
}
?>