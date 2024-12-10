<?php
// شروع سشن در صورتی که استارت نخورده بود 


// check if user is logged in
// if(!isset($_SESSION['user_id'])) {
//     header('Location: login.php');
//     exit();
// }
// if (!isset($_SESSION['user_id'])) {
//     if (!isset($_SESSION['redirect_to'])) {
//         $_SESSION['redirect_to'] = $_SERVER['HTTP_REFERER'] ;
//     }
    
//     header('Location:../../login.php');
//     exit();
// }
 include '../controllers/cheaklogin.php'; ?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all-fonts.min.css">
</head>
<body>
    <!-- sidebar -->
     <?php include 'sidebar.php'; ?>
     <div class="main-content">
        <h1>Dashboard   </h1>
     </div>
</body>
</html>