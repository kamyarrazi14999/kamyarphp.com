<?php
session_start();

// مقداردهی اولیه موقعیت بازیکن
if (!isset($_SESSION['position'])) {
    $_SESSION['position'] = 0;
}

// پردازش حرکت بازیکن
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['up'])) {
        $_SESSION['position']++;
    } elseif (isset($_POST['down']) && $_SESSION['position'] > 0) {
        $_SESSION['position']--;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Step Game</title>
    <style>
        .game-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .step {
            width: 200px;
            height: 40px;
            background-color: #ddd;
            border: 2px solid #999;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .active {
            background-color: #4CAF50;
            transform: scale(1.1);
        }

        .player {
            width: 50px;
            height: 50px;
            background-color: #2196F3;
            border-radius: 50%;
            position: absolute;
            transition: all 0.5s;
        }

        .controls {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="game-container">
        <?php
        // تعداد پله‌ها
        $total_steps = 5;
        
        // نمایش پله‌ها و بازیکن
        for ($i = $total_steps; $i >= 0; $i--) {
            $is_active = $i === $_SESSION['position'];
            echo '<div class="step' . ($is_active ? ' active' : '') . '">';
            if ($is_active) {
                echo '<div class="player"></div>';
            }
            echo '</div>';
        }
        ?>
        
        <div class="controls">
            <form method="post">
                <button type="submit" name="up">بالا برو ↑</button>
                <button type="submit" name="down">پایین برو ↓</button>
            </form>
        </div>
        
        <p>موقعیت فعلی: <?php echo $_SESSION['position']; ?></p>
    </div>
</body>
</html>