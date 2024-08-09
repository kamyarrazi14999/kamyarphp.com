<?php
require'./sqlconnect.php';
$queryfild="SHOW COLUMNS FROM teachers";
$result = $mysqli->query($queryfild);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo $row['Field'].' ';
    }
}  else {
    echo "چیزی پیدا نشد";
} 
mysqli_close($mysqli);

?>