<?php

require './pdocanact.php';
$sql = 'SELECT * FROM todo';
$stmt = $pdo->query($sql);
$todos = $stmt->fetchALL();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 <style>
    table {
        width: 50%;
        border-collapse: collapse;
        margin: 0 auto;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 2px;
        text-align: left;
        font-size: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-align: center;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    tr:hover {
        background-color: #ddd;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
<body>
    <table>
<thead>
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Create At</th>
    </tr>
</thead>
<tbody>
<?php

foreach ($todos as $todo) { ?>
<tr>
<td><?php echo $todo['id']; ?></td>
<td><?php echo htmlspecialchars($todo['item_name']); ?> </td>
<td>
<?php echo htmlspecialchars($todo['create_at']);?>
 
</td>


</tr>

<?php }?>



</tbody>

    </table>
</body>
</html>