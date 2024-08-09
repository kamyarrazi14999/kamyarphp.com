
<?php
require './vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$databasname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$nana = new mysqli($host, $user, $password, $databasname);
if ($nana->connect_error) {
    die('Connection failed: '.$nana->connect_error);
}
// echo 'Connected successfully <br> <br>';
?>
