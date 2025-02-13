<?php

// Connect to Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpuni";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST request contains necessary data
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE locations SET name = ?, latitude = ?, longitude = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $latitude, $longitude, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Location updated successfully";
    } else {
        echo "Error updating location: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid input";
}

// Close the connection
$conn->close();

?>