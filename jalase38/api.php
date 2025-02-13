<?php 

header('Content-Type: application/json');

// Connect to Databse 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpuni";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}


// Get data users locations from Databse

$sql = "SELECT * FROM locations";
$result = $conn->query($sql);

$locations = [];

while ($row = $result->fetch_assoc()) {
    $locations[] =  $row;
}

// Send JSON response

echo json_encode($locations);

exit;


?>