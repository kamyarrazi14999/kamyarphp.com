<?php
include 'controllers/cheaklogin.php';
require '../../database.php';
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

?>