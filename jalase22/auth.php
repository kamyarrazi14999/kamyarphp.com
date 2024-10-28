<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if(session_status() === PHP_SESSION_NONE){
    session_start();
}



?>