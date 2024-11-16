<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $token = bin2hex(random_bytes(16)); // تولید توکن تصادفی
        $stmt = $db->prepare("UPDATE users SET reset_token = :token WHERE email = :email");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // ارسال ایمیل با لینک بازنشانی
        $to = $user['email'];
        $subject = 'Reset Password';
        $message = 'To reset your password, please click the link: ';
        $message .= 'https://yourwebsite.com/reset.php?token=' . $token;
        $headers = 'From: 1XUeh@example.com' . "\r\n" . 'Reply-To: 1XUeh@example.com';

        if (mail($to, $subject, $message, $headers)) {
            echo 'An email has been sent to your address with instructions to reset your password.';
        } else {
            echo 'Failed to send email';
        }
    } else {
        echo 'An email has been sent if the email exists in our records.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include 'header.php'; ?>

<style>
    body {
        background-color: #f1f1f1;
    }

    input {
        padding: 10px;
        margin: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 300px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #129;
    }
</style>
<body>
    <form action="forget.php" method="post">
        <input type="email" name="email" placeholder="email" required>
        <br><br>
        <input type="submit" value="send">
        <a href="login.php"> <i class="fas fa-user-plus"></i> Login</a>
    </form>
</body>
</html>