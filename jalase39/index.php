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
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">

    </form>
</body>
<style>
    input{
        display: block;
        font-size: 30px;
    }
    form{
        width: 600px;
       margin: 20%;
    }
</style>
</html>