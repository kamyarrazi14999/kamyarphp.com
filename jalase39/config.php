<?php 

$host='localhost';
$dbname='phpuni';
$dbuser='root';
$password='';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
    die ("Could not connect to MySQL". $e->getMessage());
}

?>