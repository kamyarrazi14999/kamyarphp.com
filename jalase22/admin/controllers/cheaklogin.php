<?php
if(session_start()===PHP_SESSION_NONE){
    session_start();
}
if (!isset($_SESSION['user_id']) && $_SERVER['HTTP_REFERER']!=='http://localhost/jalase22/login.php' ) {
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI']; 
    header('Location:../../login.php');
    exit();
}


?>