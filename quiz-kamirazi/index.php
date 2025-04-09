<?php
session_start();
require 'vendor/autoload.php';
use Dotenv\Dotenv;

// بارگذاری تنظیمات از فایل .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

include('config.php');

// تنظیم کوکی‌ها برای ذخیره اطلاعات ورود
if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
    setcookie("username", $_POST['username'], time() + (86400 * 30), "/");
    setcookie("password", $_POST['password'], time() + (86400 * 30), "/");
}

// بررسی ورود کاربر
if (!isset($_SESSION['user_logged_in'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] == 'admin' && !isset($_SESSION['admin_logged_in'])) {
    $_SESSION['admin_logged_in'] = true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST['question'];
    $category = $_POST['category'];
    $difficulty = $_POST['difficulty'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct_answer = $_POST['correct_answer'];
    $time_limit = $_POST['time_limit'];

    if ($_SESSION['role'] == 'admin') {
        $stmt = $conn->prepare("INSERT INTO questions (question, category, difficulty, option1, option2, option3, option4, correct_answer, time_limit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssi", $question, $category, $difficulty, $option1, $option2, $option3, $option4, $correct_answer, $time_limit);
        $stmt->execute();
        $stmt->close();
    }
}

// دریافت سوالات
$questions = $conn->query("SELECT * FROM questions");
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت آزمون</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2>خوش آمدید، <?php echo $_SESSION['username']; ?></h2>
    <a href="logout.php" class="btn btn-danger">خروج</a>

    <?php if ($_SESSION['role'] == 'admin') { ?>
        <h2 class="mt-4">افزودن سوال جدید</h2>
        <form id="quizForm" method="post" class="mb-4">
            <div class="mb-3">
                <label class="form-label">سوال:</label>
                <input type="text" name="question" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">دسته‌بندی:</label>
                <input type="text" name="category" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">سطح دشواری:</label>
                <select name="difficulty" class="form-select" required>
                    <option value="آسان">آسان</option>
                    <option value="متوسط">متوسط</option>
                    <option value="سخت">سخت</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">گزینه‌ها:</label>
                <input type="text" name="option1" class="form-control" required>
                <input type="text" name="option2" class="form-control" required>
                <input type="text" name="option3" class="form-control" required>
                <input type="text" name="option4" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">گزینه صحیح (۱-۴):</label>
                <input type="number" name="correct_answer" class="form-control" min="1" max="4" required>
            </div>
            <div class="mb-3">
                <label class="form-label">زمان پاسخگویی (ثانیه):</label>
                <input type="number" name="time_limit" class="form-control" min="10" required>
            </div>
            <button type="submit" class="btn btn-primary">افزودن سوال</button>
        </form>
    <?php } ?>

    <h2>لیست سوالات</h2>
    <table class="table table-bordered">
        <tr>
            <th>سوال</th>
            <th>دسته‌بندی</th>
            <th>سطح دشواری</th>
        </tr>
        <?php while ($row = $questions->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['question']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['difficulty']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>