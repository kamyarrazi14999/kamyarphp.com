<?php
include 'vendor/autoload.php';
require 'database.php';
session_start();


use Firebase\JWT\JWT;






if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $password = $_POST['password'];
    // پیدا کردن کاربر با ایمیل و رمز عبور
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    // برای  تنظیم فیلدهای ارسالی
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            // Generate JWT token
            
            // ایجاد توکن
            $key='3e69292ce6c53066f60e58d24cc13c9f5e2a16fced5ff341237ad21ba181da2f';
            // ایجاد توکن
            $payload = [
                'user_id' => $user['user_id'],
                'username' => $user['username'],
                'exp' =>  time() + (3600), // 1 hour 

            ];
            $jwt = JWT::encode($payload, 'secret_key', 'HS256');
            setcookie("auth_token",$jwt, time() + 3600, '/');
            header('Location: shope.php');
            exit();

             
        }
        else {
            echo "Invalid password";
        }

    }
    else {
        echo "User not found";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
</head>
<?php include 'header.php' ?>
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
   
    
</style>
<body>
    <div class="container">
        <h2>login form</h2>
        <form action="login.php" method="post">
            <input type="text" name="email" placeholder="email" required>
            <input    type="password" name="password" placeholder="password" required>
          
            <span  class="eye-btn" onclick="showPassword()">
                <i class="fas fa-eye  "></i></span> 
                <i> <span class="close-btn"><i class="fas fa-eye-slash"></i></span></i>  
            <input type="submit" value="login">
        </form>
    </div>
</body>

<script>



  function showPassword() {
    const passwordInput = document.getElementsByName('password')[0];
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
    
      
      
    } else {
      passwordInput.type = 'password';
    }
    
passwordInput.addEventListener("click", () => {
    passwordInput.classList.toggle("");
    passwordInput.classList.toggle("close-btn");
});
  }
  

  
</script>
</html>