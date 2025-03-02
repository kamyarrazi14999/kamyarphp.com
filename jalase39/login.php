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
        $otp = generateOTP();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        $_SESSION['otp_send'] = true;


        // Send OTP via email
        sendOTP($email, $otp);
        header('Location: verify.php');
        exit();

    }else {
        echo "Invalid email or password";
    }
}

?>
<style>
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    label, input[type="email"], input[type="password"] {
        margin-bottom: 10px;
    }
    button {
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    a {
        margin-top: 10px;
        color: blue;
        text-decoration: underline;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">  Send </button>
    </form>
</body>
</html>
