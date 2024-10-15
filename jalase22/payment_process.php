<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action=$_POST['action'];
    if($action == 'pay'){
        echo "<h2>payment successfully</h2>";


        unset($_SESSION['cart']);

}else if($action=='cancel') {
    echo "<h2>payment cancel</h2>";
    
}
}
?>
<a href="shope.php">Return to shop</a>