<?php 
session_start();
require_once 'config.php';
require_once 'functions.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $opt_input = $_POST['otp'];

    if($opt_input === $_SESSION['otp']){
        unset($_SESSION['otp']);
        header('Location: dashboard.php');
        exit();
}else {
    echo 'OTP Error - Please enter your Correct OTP CODE';
}
}

?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center;
    }

    form label {
        display: block;
        text-align: left;
        margin-bottom: 10px;
    }

    form input {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        font-size: 16px;
    }

    form button {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    form button:hover {
        background-color: #45a049;
    }

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <label for="otp">Enter OTP:</label>
    <input type="text" id="otp" name="otp" required>
    <button type="submit">Submit</button>

    </form>
</body>
</html>