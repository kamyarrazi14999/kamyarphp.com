<?php

require '../../database.php';
if(session_status() === PHP_SESSION_NONE){
    session_start();
}




header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];

   try {
    //code...
    $stmt = $db->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$productId]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
    }else {
        echo json_encode(['success' => false]);
    }

   } catch (\PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);

}
}else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

?>
