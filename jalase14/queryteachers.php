<?php
require "./sqlconnect.php" ;
$sqlquery = "SELECT * FROM teachers"; 
$result =$mysqli->query($sqlquery);
$teachers = array();
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()){
    $teachers[] = $row;
}

} else {
    echo "NO DATA";
}
// echo "<pre>";
// var_dump($teachers);
// echo "</pre>";
mysqli_close($mysqli);
?>