<?php 
header('Content-Type: application/json');

// Connect to Database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpuni";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    
    $smt = $conn->prepare("INSERT INTO locations (name, latitude, longitude) VALUES (?,?,?)");
    $smt->bind_param("sdd", $name, $latitude, $longitude);
    $smt->execute();
    $smt->close();
    echo json_encode(['status' => 'success']);
}
?>