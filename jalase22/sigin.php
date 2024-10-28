<?php
require 'database.php';

// Initialize variables
$name = '';
$email = '';
$massage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if user already exists
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $name);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $massage = "کاربر قبلا ثبت نام کرده است";
    } else {
        // Register user
        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>
    <title>sigin user</title>  

<style>
     body{
        background-color: rgb(219, 211, 211);
        justify-content: center;
        align-items: center;
        height: 100vh;
        display:block;

    }
    .container{
        margin-top: 5%;
        width: 400px;
        height: 400px;
        background-color: #0000ff;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 10px;
        padding: 20px;
        animation-name: sop;
        animation-duration: 3s;
        animation-iteration-count:unset;
    
    }
    @keyframes sop{
        0%{
            transform: perspective(1000px) rotateY(0deg);
        }
        50%{
            transform: perspective(1000px) rotateY(180deg);
        }
        100%{
            transform: perspective(1000px) rotateY(360deg);
        }
      
     }  
    input{
        width: 300px;
        height: 30px;
        border-radius: 10px;
        margin: 5px;
        cursor: pointer;
    }
    h2{
        text-align: center;
        margin: 10px;
        color: white;
        font-size: 20px;
        text-shadow: 0 0 10px rgba(0,0,0,0.5);
        box-shadow: 0 0 20px rgba(0,0,0,0.5);

    }
    input[type="submit"]{
        width: 100px;
        height: 30px;
        border-radius: 50px;
        margin: 5px;
        cursor: pointer;
        
    } 
    .massage{
        color:red;
        font-size: 20px;
        text-shadow: 0 0 10px rgba(0,0,0,0.5);
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
        text-align: center;
        margin-bottom: 20px;
        margin-top: 20px;
    }
    
</style>
</head>
<body>
    <div class="container">
        <h2>sigin user</h2>
        <form action="sigin.php" method="post">
            <input type="text" name="username" placeholder="username" value="<?php echo $name; ?>">
            <input type="email" name="email" placeholder="email" value="<?php echo $email; ?>">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="sigin">
            <div class="massage">
                <?php echo $massage;?>
            </div>
        </form>
    </div>
</body>
</html>
