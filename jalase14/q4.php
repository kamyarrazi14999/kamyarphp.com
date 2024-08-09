
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
<html>
  <form action="" method="get">
<input type="number" name="limit" >
<input type="submit" value="submit">

  </form>  

<html>

<?php

if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    require "./sqlconnect.php";
    $limit=$_GET["limit"];
$sql="SELECT * FROM teachers LIMIT $limit";
$result= $mysqli->query($sql);
if($result->num_rows> 0) {
   $field_info = $result->fetch_fields();
 echo "<table>";
 echo "<tr>";
 foreach($field_info as $field){
     echo "<th>{$field->name}</th>";

}
echo "</tr>";
}
else{
    echo "no data found";
}
while($row=$result->fetch_assoc()){
echo "<tr>";
foreach($field_info as $field){
echo "<td>{$row[$field->name]}</td>";
}
echo "</tr>";
}
}

?>