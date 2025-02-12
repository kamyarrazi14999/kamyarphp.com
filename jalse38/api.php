<?php
header('Content-Type: application/json');
// اتصال دیتابیس

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpuni";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// get data user location from database 

$sql = "SELECT * FROM  locations";
$result = $conn->query($sql);

$locations = [];
while ($row = $result->fetch_assoc()) {
  $locations[] = $row;
}

echo json_encode($locations);

$conn->close();
exit();
 



?>