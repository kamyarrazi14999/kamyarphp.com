<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $opt_input = filter_input(INPUT_POST, 'otp', FILTER_SANITIZE_NUMBER_INT);

    if ($opt_input === $_SESSION['otp']) {
        unset($_SESSION['otp']);
        header('Location: dashboard.php');
        exit();
    } else {
        echo 'OTP Error - Please enter your correct OTP code';
    }
}
?>

<style>
    .container {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        animation-name: kaako;
        animation-duration: 1s;
        animation-timing-function: ease-in-out;
    }

    @keyframes kaako {
        0% {
            transform: translatey(-100px);
        }
        100% {
            transform: translatey(0);
        }
    }

    .container h1 {
        text-align: center;
    }

    form {
        margin-top: 20px;
    }

    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        cursor: pointer;
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
    <div class="container">
        <form action="" method="POST">
            <label for="otp">Enter OTP:</label>
            <input type="text" id="otp" name="otp" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>