<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$DB_HOST = $_ENV['DB_HOST'];
$DB_DATABASE = $_ENV['DB_DATABASE'];
$DB_USER = $_ENV['DB_USER'];
$DB_PORT= $_ENV['DB_PORT'];
$DB_PASWORD = $_ENV['DB_PASWORD'];

try{
    $conn =("mysql:host=$DB_HOST;dbname=$DB_DATABASE;port=$DB_PORT;charset=utf8mb4");
    $db = new PDO($conn, $DB_USER, $DB_PASWORD); 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
}
catch(PDOException $e){
die("Connection failed: " . $e->getMessage()); 
    exit();
}

?>