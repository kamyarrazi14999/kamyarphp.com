
<style>
input{

    border-radius: 5px;
    padding: 10px;
    border: 1px solid #ccc;
    width: 300px;

}
input[
    type="submit"]{

    border-radius: 5px;
    padding: 10px;
    border: 1px solid #ccc;
    width: 300px;
    background-color: green;
    color: white;
    cursor: pointer;
}
input [type="submit"]:hover{

    background-color: red;

}












</style>




<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $searchTerm = trim($_POST['search']); // sanitize input
    require './pdocanact.php';
    $sql = 'SELECT * FROM todo WHERE item_name = :searchTerm';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['searchTerm' => $searchTerm]);
    $results = $stmt->fetchAll(); // fetch all results
    if ($results) {
        // display search results
        foreach ($results as $row) {
            echo $row['item_name'].'<br>';
        }
    } else {
        echo 'No results found.';
    }
}
?>

<html>
  <form action="" method="post">
    <input type="text" name="search" id="">
    <input type="submit" name="" value="search">
  </form>
</html>