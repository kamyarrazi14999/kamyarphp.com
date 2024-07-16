<?php

require './vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$databasname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$mysqli = new mysqli($host, $user, $password, $databasname);
if ($mysqli->connect_error) {
    exit('Connection failed: '.$mysqli->connect_error);
}
echo 'Connected successfully ';
?>  