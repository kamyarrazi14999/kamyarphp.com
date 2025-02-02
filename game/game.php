<?php
session_start();

if (!isset($_SESSION['target_number'])) {
    // Generate a random number between 1 and 100
    $_SESSION['target_number'] = rand(1, 100);
    $_SESSION['attempts'] = 0;
}

$message = '';
$guess = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guess = intval($_POST['guess']);
    $_SESSION['attempts']++;

    if ($guess < $_SESSION['target_number']) {
        $message = "عدد بزرگ‌تر است!";
    } elseif ($guess > $_SESSION['target_number']) {
        $message = "عدد کوچک‌تر است!";
    } else {
        $message = "تبریک می‌گوییم! شما عدد را در " . $_SESSION['attempts'] . " حدس پیدا کردید!";
        // Reset the game
        unset($_SESSION['target_number']);
        unset($_SESSION['attempts']);
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بازی حدس عدد</title>
</head>
<body>
    <h1>بازی حدس عدد</h1>
    <p>یک عدد بین 1 تا 100 حدس بزنید:</p>

    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="number" name="guess" min="1" max="100" required>
        <button type="submit">حدس بزن</button>
    </form>

    <?php if (isset($_SESSION['attempts'])): ?>
        <p>تعداد حدس‌ها: <?php echo $_SESSION['attempts']; ?></p>
    <?php endif; ?>
</body>
</html>