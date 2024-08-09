<?php

require './sqlconnect.php';
// echo '<pre>';
// var_dump($mysqli->query('SELECT * FROM teachers'));
// echo '</pre>';
$queryAllData = 'SELECT * FROM teachers';
$queryName = 'SELECT name FROM teachers';
$querystudents = 'SELECT * FROM students';
$result = $mysqli->query($queryAllData);
// var_dump($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // echo $row['field'];
        echo $row['id'].$row['name'].$row['tel'].'<br> <br>';
    }
} else {
    echo 'جدول ما خالی می باشد';
}
?>