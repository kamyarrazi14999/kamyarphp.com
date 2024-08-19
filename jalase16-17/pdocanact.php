<?php

require './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$hostname = $_ENV['DB_HOST'];
$database = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$dbport = $_ENV['DB_PORT'];
// databasepdo

try {
    $dns = "mysql:host=$hostname;dbname=$database;port=$dbport charset=utf8";
    $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dns, $username, $password, $option);
    // echo 'connect to database';
} catch (PDOException $e) {
    echo 'Error:'
    .$e->getMessage().'<br>';
}
