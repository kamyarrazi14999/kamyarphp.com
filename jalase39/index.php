<?php 
session_start();
if(isset($_SESSION['otp_send'])){
    header('Location: verify.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .login-form h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .login-form input {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .login-form button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-form button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="error-message">
            <!-- Display error messages here -->
        </div>
    </div>
</body>
</html>


</html>