<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if(session_status() === PHP_SESSION_NONE){
    session_start();
}
$key='396e5cad46a1f7ede8880cd52d247e69b7766633880979ec04318b4e7e8f7e8d';

if(isset($_COOKIE['auth_token'])){
    // اگر کوکی معتبر باشد
    try {
        $jwt = $_COOKIE['auth_token'];
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
       
        $_SESSION['user_id'] = $decoded->user_id; 
        $_SESSION['username'] = $decoded->username; // 
    } catch (Exception $e) {
        // Invalid token
        if(basename($_SERVER['PHP_SELF']) !== 'head.php'){
            header('Location:head.php');
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