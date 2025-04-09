<?php
require './vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'websiteguize';

try {
    $conn = new mysqli($servername, $username, $password, $databasename);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $q1 = $_POST['q1'];
        $stmt = "INSERT INTO `qsn` (`qsn`) VALUES ('$q1')";
        try {
            $result = mysqli_query($conn, $stmt);
            if ($result) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo "Data inserted successfully.";
                } else {
                    echo "No rows affected.";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    $queryTwo = "SELECT qsn.qsn,answer.ans from answer inner join (SELECT qsn from qsn order by id desc limit 1) as qsn on qsn.qsn = answer.ans";
    $resultTwo = mysqli_query($conn, $queryTwo);

    if ($resultTwo) {
        $row = mysqli_fetch_assoc($resultTwo);
        if ($row) {
            $queryThree = "INSERT INTO `result` (`result`) VALUES ('" . $row['ans'] . "')";
            $resultThree = mysqli_query($conn, $queryThree);
            if ($resultThree) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo "Data inserted successfully.";
                } else {
                    echo "No rows affected.";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "No rows found.";
        }
    }
}
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="./style.css">
<body>
    <form action="" method="post">
        <table align="center" border="1" width="500px" height="500px">
            <tr>
                <td>What is the height of Mt. Everest?</td>
            </tr>
            <tr>
                <td><input type="radio" name="q1" value="8848">8848</td>
            </tr>
            <tr>
                <td><input type="radio" name="q1" value="8847">8847</td>
            </tr>
            <tr>
                <td><input type="radio" name="q1" value="8846">8846</td>
            </tr>
            <tr>
                <td><input type="radio" name="q1" value="8845">8845</td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
                <td><input type="submit" name="check" value="Check Result"></td>
            </tr>
        </table>
    </form>
    <div class="timer-container" style="text-align: center; margin-top: 20px;">
        <div class="timer-circle" style="--progress: 100%; width: 100px; height: 100px; border-radius: 50%; border: 5px solid #007bff; display: inline-block; position: relative;">
            <span id="timer-number" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 20px; font-weight: bold;">100</span>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        const timer = document.querySelector('.timer-circle');
        const timerNumber = document.getElementById('timer-number');
        let timeLeft = 100;

        const interval = setInterval(() => {
            timeLeft -= 1;
            timerNumber.textContent = timeLeft;
            const progress = (timeLeft / 100) * 100;
            timer.style.setProperty('--progress', `${progress}%`);

            if (timeLeft <= 0) {
                clearInterval(interval);
                timerNumber.textContent = 'Time\'s up!';
                timer.style.setProperty('--progress', '0%');
                alert('Time is up! Please submit your answer.');

                const formData = new FormData(document.querySelector('form'));
                fetch('', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log('Response:', data);
                    alert('Your answer has been submitted automatically.');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while submitting your answer.');
                });
            }
        }, 1000);
    </script>
</body>
</html>
