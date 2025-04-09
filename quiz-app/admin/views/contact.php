
<?php
include '../controllers/checklogin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (empty($name) || empty($email) || empty($message)) {
        $error = "لطفا تمام فیلدها را پر کنید.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "ایمیل وارد شده معتبر نیست.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);

        // ارسال ایمیل
        mail("admin@example.com", "پیام جدید از $name", $message);
        $success = "پیام شما با موفقیت ارسال شد!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<style>
    .alert {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: green;
        color: white;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        animation: fadeIn 0.5s ease, fadeOut 0.5s ease;
    }
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
        animation-name: sop;
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
        transition: background-color 0.5s ease;
        animation-fill-mode: forwards;
    }
    @keyframes sop {
        0% {
            background-color: #f4f4f4;
        }
        50% {
            background-color: #f4f4f4;
        }
        100% {
            background-color: #f4f4f4;
        }
    }

    .main-content {
        margin-left: 200px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    @keyframes fadeIn {
        from{opacity:0; transform: translateY(20px);}
        to {opacity:1; transform: translateY(0px);}
        }

    @keyframes fadeOut {
        from{opacity:1; transform: translateY(0px);}
        to {opacity:0; transform: translateY(20px);}
    }
  
    
</style>
<body>
    <!-- sidebar -->
     <?php include 'sidebar.php'; ?>
     <div class="main-content">
        <h1>Contact</h1>
        <?php if (isset($error)):?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif;?>
            <?php if (isset($success)):?>
                <div class="alert alert-success"><?php echo $success;?></div>
            <?php endif;?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required><br>
                    <br>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required><br><br> 
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" class="form-control" required></textarea><br>
            </form>
     </div>
</body>
</html>

