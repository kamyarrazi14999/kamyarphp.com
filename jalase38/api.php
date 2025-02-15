<?php 

header('Content-Type: application/json');

// Connect to Database 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpuni";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Get filter parameters
$nameFilter = isset($_GET['name']) ? $_GET['name'] : '';

// Get data users locations from Database
$sql = "SELECT * FROM locations";
if ($nameFilter) {
    $sql .= " WHERE name LIKE '%" . $conn->real_escape_string($nameFilter) . "%'";
}
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(['error' => 'Error executing query: ' . $conn->error]);
    exit;
}

$locations = [];

while ($row = $result->fetch_assoc()) {
    $locations[] =  $row;
}

// Send JSON response
echo json_encode($locations);

$conn->close();
exit;
?>