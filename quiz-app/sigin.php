<?php

require 'config.php';

// Initialize variables
$name = '';
$email = '';
$massage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if user already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $name);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $massage = "کاربر قبلا ثبت نام کرده است";
    } else {
        // Register user
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            header('location:login.php');
            exit; // Add exit to prevent further execution
        } else {
            $massage = "خطا در ثبت نام";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php';?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sigin user</title>  
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 50%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        form {
            display: flex;
            flex-direction: column;
        }

input[type="text"],
input[type="email"],
input[type="password"] {
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    padding: 10px;
    background: #5cb85c;
    border: none;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background: #4cae4c;
}

a {
    display: block;
    text-align: center;
    margin-top: 10px;
    color: #5cb85c;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.massage {
    color: red;
    text-align: center;
    margin-top: 10px;
}

    
</style>
</head>
<body>
   
    <div class="container">
        <h2>Sign in User</h2>
        <form action="sigin.php" method="post">
            <input type="text" name="username" placeholder="Username" value="<?php echo $name; ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Sign in">
            <br>
            <a href="login.php"> <i class="fas fa-user-plus"></i> Login</a>
            <div class="massage">
                <?php echo $massage;?>
            </div>
        </form>
    </div>
</body>
</html>

