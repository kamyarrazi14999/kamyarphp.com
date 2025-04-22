<?php
require './vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database connection
$DB_HOST = $_ENV['DB_HOST'];
$DB_DATABASE = $_ENV['DB_DATABASE'] ;
$DB_USERNAME = $_ENV['DB_USERNAME'] ;
$DB_PASSWORD = $_ENV['DB_PASSWORD'] ;
$DB_PORT = $_ENV['DB_PORT'] ;

try {
    $conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE, $DB_PORT);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $q1 = $_POST['q1'];
        $stmt = "INSERT INTO qsn (qsn) VALUES ('$q1')";
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
// برای دریافت پاسخ درست از دیتابیس
    $queryTwo = "SELECT qsn.qsn,answer.ans from answer inner join (SELECT qsn from qsn order by id desc limit 1) as qsn on qsn.qsn = answer.ans";
    $resultTwo = mysqli_query($conn, $queryTwo);

    if ($resultTwo) {
        if (mysqli_affected_rows($conn) > 0) {
            // درجای اینجا می‌توانید کدهای مربوط به پردازش نتایج را اضافه کنید
            $queryThree = "INSERT into compare (value) values ('correct')";
            $resultThree = mysqli_query($conn, $queryThree);
        }else {
            $queryThree ="INSERT into compare (value ) values ('incorrect')";
            $resultThree = mysqli_query($conn, $queryThree);
        }
        
      
   

    }
}
// check کردن جواب درست و نادرست
if (isset($_POST['check'])) {
    $queryfour = "SELECT value from compare order by id desc limit 1";
    $resultfour = mysqli_query($conn, $queryfour);

    if ($resultfour) {
        if (mysqli_num_rows($resultfour)) {
            echo "<table class='table table-bordered'>";
            echo "<tr><th>Result</th></tr>";
            while ($row = mysqli_fetch_assoc($resultfour)) {
                echo "<tr><td>" . htmlspecialchars($row['value']) . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No rows found.</p>";
        }
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
}



  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .quiz-container {
            margin: 50px auto;
            max-width: 600px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .quiz-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .timer-container {
            text-align: center;
            margin-top: 20px;
        }
        .timer-circle {
            --progress: 100%;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 5px solid #007bff;
            display: inline-block;
            position: relative;
        }
        .timer-circle span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 20px;
            font-weight: bold;
        }
        .pagination-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h1>Quiz</h1>
        <form action="" method="post">
            <table class="table table-bordered">
                <tr>
                    <td>What is the height of Mt. Everest?</td>
                </tr>
                <tr>
                    <td><input type="radio" name="q1" value="8848"> 8848</td>
                </tr>
                <tr>
                    <td><input type="radio" name="q1" value="8847"> 8847</td>
                </tr>
                <tr>
                    <td><input type="radio" name="q1" value="8846"> 8846</td>
                </tr>
                <tr>
                    <td><input type="radio" name="q1" value="8845"> 8845</td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" name="check" class="btn btn-secondary">Check Result</button>
                         <button type="submit" name="next" class="btn btn-success">Next</button>

                    </td>
                </tr>
            </table>
        </form>
        <div class="timer-container">
            <div class="timer-circle">
                <span id="timer-number">100</span>
            </div>
        </div>
        <div class="pagination-container">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center" id="pagination">
                    <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
                    <li class="page-item"><a class="page-link" href="?page=3">3</a></li>
                    <li class="page-item"><a class="page-link" href="?page=4">4</a></li>
                    <li class="page-item"><a class="page-link" href="?page=5">5</a></li>
                </ul>
            </nav>
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


    // Handle pagination dynamically
    const paginationLinks = document.querySelectorAll('#pagination .page-link');
    paginationLinks.forEach(link => {
        link.addEventListener('click', (event) => {
        event.preventDefault();
        const page = event.target.getAttribute('href').split('=')[1];
        fetch(`?page=${page}`)
            .then(response => response.text())
            .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            const newQuizContent = doc.querySelector('.quiz-container').innerHTML;
            document.querySelector('.quiz-container').innerHTML = newQuizContent;
            history.pushState(null, '', `?page=${page}`);
            })
            .catch(error => console.error('Error fetching page:', error));
        });
    });
    </script>
</body>
</html>
