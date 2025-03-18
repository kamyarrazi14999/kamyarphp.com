<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);
    
    // ارسال ایمیل
    mail("admin@example.com", "پیام جدید از $name", $message);
    $success = "پیام شما با موفقیت ارسال شد!";
}
include 'head.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">تماس با ما</h1>
            <?php if(isset($success)):?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success;?>
                </div>
            <?php endif;?>
            <form method="POST">
                <div class="form-group">
                    <label for="name">نام:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">ایمیل:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">پیام:</label>
                    <textarea class="form-control" id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
</div>

