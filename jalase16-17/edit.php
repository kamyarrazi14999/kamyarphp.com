<?php
// نمایش ایتم ها
require './Canact.php';
$id = $_GET['id'];
// echo $id;
$sql = "SELECT * FROM todo WHERE id = $id";
$result = $nana->query($sql);
$item = $result->fetch_assoc();
// ویرایش ایتم ها
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_name = $_POST['item_name'];
    $sql =
    "UPDATE todo SET item_name = '$item_name' WHERE id = $id";
    $nana->query($sql);
    header('location:todo.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document item</title>
</head>
<style>
body{


    background-color:darkcyan;
    color: #87bcf8; ;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    flex-direction: column;
    font-size: 20px;

}
.cont{
width: 90%;
margin-top: 20px;
margin-top: 2rem;
}
input{
font-size:20px ;
margin-top: 1rem;
}

button{
margin-top:1rem ;
font-size: 20px;

}
</style>
<body>
    <div class="cont">
<form action="" method="post" >
<h1>Item Edite</h1> <br>

<input type="text" name="item_name" value="<?php echo $item['item_name']; ?> " required >
<!-- <input type="text" name="item_name" value="<?php echo $item['create_at']; ?> "  > -->
<button type="submit">save</button>
</form>
<a href="./todo.php"> <button> cancal</button></a>
<div></

  
</body>
</html>