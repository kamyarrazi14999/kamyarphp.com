<?php 
session_start();
require_once 'config.php';
require_once 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    if($user && $password == $user['password']){
        // Create OTP
        // Store OTP in session
        // Store email in session
        // Redirect to verify.php
        $otp = generateOTP();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        $_SESSION['otp_send'] = true;


        // Send OTP via email
        // Redirect to verify.php
        sendOTP($email, $otp);
        header('Location: verify.php');
        exit();

    }else {
        echo "Invalid email or password";
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
        margin-bottom: 5px;
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

    <form method="post" >
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">  Send </button>
    </form>
