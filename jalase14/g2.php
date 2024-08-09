<style>
table{
    flex-direction: row;
    justify-content: center;
    border: 1px solid black;
    border-collapse: collapse;
    width: 100%;
    height: 100px;
    font-size: 25px;
    padding: 10px;
    text-align: center;
 
}
th{
background-color: blue;

}
td{
    border: 1px solid black;
    
}
td:hover{
    background-color: red;
    color: white;
}
input{
    width: 100%;
    height: 100px;
    font-size: 50px;
    padding: 10px;
    text-align: center;
    color:brown;
    background-color: #eeee;
}
</style>

<?php

require './sqlconnect.php';
$sqlquery = 'SELECT *FROM teachers limit 20';
$result = $mysqli->query($sqlquery);
//? قرار می گیردphp دیتا مورد نظر در داخل جدول مورد نظر
if($result->num_rows > 0){
    //? اگر در جدول مورد نظر دیتا وجود داشته باشد
 echo '<table>';
 echo "<tr>";
echo "<th>ID</th>";
echo "<th>NAME</th>";
echo "<th>TEL</th>";

 echo "</tr>";
 while($row = $result->fetch_assoc()){
     // echo "ID: " . $row['id'] . "  Name: " . $row['name'] . " Tel: " . $row['tel'] ."<br>";
     echo "<tr>
     <td>" . $row['id'] . "</td>
     <td>" . $row['name'] . "</td>
     <td>" . $row['tel'] . "</td>
     
     </tr>
     
     
     ";
    }
    echo '<table>';
}
else{
    echo "<input type='text' value='رکورد مورد نظر پیدا نشد' placeholder='No Data'>";
}
mysqli_close($mysqli);
?>

