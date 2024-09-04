<html>
<form action="" method="post">
<input type="text" name="search" id="">
<input type="submit" name="" value="search">
  

</form>


</html>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $id = $_POST['search'];
    require './pdocanact.php';
    $sql = 'SELECT * FROM todo WHERE item_name = :id';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $rom = $stmt->fetch();
    
}





?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

table, th, td {
  border: 1px solid black;
}

table {
  width: 50%;
  margin: 0 auto;
}

th {
  background-color: #4CAF50;
  color: white;
}

th, td {
  padding: 15px;
  text-align: left;
}

td {
  text-align: center;
}
input[type="text"] {
  width:calc(2rem -200px);
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
  font-size: 16px;
  transition: 0.5s;
  outline: none;
  &:focus {
    border-bottom: 2px solid #555;
  }

}

input[type="submit"] {
  width:calc(2rem -200px);
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  cursor: pointer;
  transition: 0.5s;
  &:hover {
    background-color: #45a049;
  }
  &:focus {
    outline: none;
  }

}





</style>



<body>
    <?php
    if ($rom) { ?>
<table>
     <thead>
                <tr>

                    <th>Id</th>
                    <th>Item Name</th>
                    <th>Creat At</th>
                    
                    


                </tr>

      </thead>
       <tbody>
        <tr>

            <td><?php echo $rom['id']; ?></td>
             <td><?php echo htmlspecialchars($rom['item_name']); ?></td>
             <td><?php echo htmlspecialchars($rom['create_at']); ?></td>


        </tr>    


      </tbody>


</table>
 <?php } else { ?>
<h3>رکوردی پیدا نشد</h3>
<?php } ?>
</body>
</html>