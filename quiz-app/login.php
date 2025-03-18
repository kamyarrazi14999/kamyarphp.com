
<?php
include 'head.php';
include 'vendor/autoload.php';
use Firebase\JWT\JWT;

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            $key = '3e69292ce6c53066f60e58d24cc13c9f5e2a16fced5ff341237ad21ba181da2f';
            $payload = [
                "user_id" => $user['user_id'],
                "username" => $user['username'],
                'exp' => time() + 3600
            ];
            $jwt = JWT::encode($payload, $key, 'HS256');
            setcookie("auth_token", $jwt, time() + 3600);

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];

            $redirectTo = isset($_SESSION['redirect_to']) ? $_SESSION['redirect_to'] : 'shope.php';
            header("location: $redirectTo");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
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
        border-color: blue;

    }
input::placeholder{
    color:blue;
    
}
input:focus{
    color: blue;

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
    @media screen and (max-width: 600px) {
        .container{
            width: 300px;
            height: 300px;
        }
        input{
            width: 100%;
        }
        
    } 
    @media screen and (max-width: 400px) {
        input[type="submit"]{
            width: 100%;
        }
    }
    .eye-btn{
      
        cursor: pointer;

    }
    @media screen and (max-width: 400px) {
        .eye-btn{
            font-size: 2px;
            margin-top: 5px;
            margin-bottom: 5px;
        }   

    }
    @media screen and (max-width: 600px) {
        .eye-btn{
            font-size: 5px;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        
    }
    i{
        font-size: 15px;
        color: red;  
        font-weight: bold;
        transition: color 0.3s ease-in-out;
    }
   
 
    i:hover{
        color: #791506;
    }
    @media screen and (max-width: 400px) {
        i{
            font-size: 5px;
        }
    }
    @media  screen and (max-width: 300px) {
        h2{
            font-size: 15px;
        }
        input[type="submit"]{
            font-size: 10px;
        }
        input[type="text"], input[type="password"]{
            width: 100%;
        }
        .password-container{
            margin-bottom: 10px;
        }
        i{
            font-size: 5px;
        }
        .eye-btn{
            font-size: 2px;
        }
        form{
            margin-top: 10px;
        }
    }
    a{
        text-decoration: none;
        color: white;
        margin-top: 10px;
        transition: color 0.3s ease-in-out;
    }
   a:hover{
        color: #791506;
        text-decoration:dotted;
    }
    @media screen and (max-width: 400px) {
        a{
            font-size: 10px;
        }
    }
    
</style>
<body>
    <div class="container">
        <h2>Login Form</h2>
        <form action="login.php" method="post">
            <input type="text" name="email" placeholder="Email" required>
            <div class="password-container">
             
                <input type="password" name="password" placeholder="Password" required id="passwordInput">
                <span class="eye-btn" onclick="showPassword()">
                    <i class="fas fa-eye" id="eyeIcon"></i> <br>
                </span>
                <a href="./sigin.php"> <i class="fas fa-user-plus"></i> Sign Up</a><br>
                <a href="./forget.php">  <i class="fas fa-key"></i> Forgot Password</a>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>


    <script>
function showPassword() {
    const passwordInput = document.getElementById("passwordInput");
    const eyeIcon = document.getElementById("eyeIcon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
    }
}
</script>





</body>
  

    
    
    

  

  

</html>