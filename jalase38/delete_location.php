<?php 
// Connect to databas \

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpuni";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM locations WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: ". $conn->error;
    }

}

$conn->close();
header('location: index.php');
?>