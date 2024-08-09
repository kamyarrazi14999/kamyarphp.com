
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



</style>



<?php

require "./sqlconnect.php" ;
$sqlquery = "SELECT * FROM teachers limit 10"; 
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
<tr>

<th>id</th>
<th>name</th>
<th>tel</th>
</tr>

<?php  foreach($teachers as $teacher) {   ?>
<tr>
   <td> <?php echo $teacher['id']; ?></td> 
   <td> <?php echo $teacher['name']; ?></td>
   <td> <?php echo $teacher['tel']; ?></td>
</tr>
<?php } ?>
    <table>
</body>
</html>


