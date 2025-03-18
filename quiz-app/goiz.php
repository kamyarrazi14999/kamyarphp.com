
<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
require 'config.php';

// if(session_status() === PHP_SESSION_NONE){
//     session_start();
// }


// if(!isset($_SESSION['user_id']) ||!isset($_SESSION['role'])){
//     header("Location: head.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/quiz.css" />  
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./fontawesome/css/all-fonts.min.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Quiz App</title>
</head>

<body>
    <div class="hadi">
        <?php include 'head.php';?>
        <div class="quiz-container" id="quiz">
            <div class="timer-container">
                <div id="timer">02:10</div>
            </div>
            <div class="quiz-header">
                <h2 id="question">Question text</h2>
            </div>
            <ul>
                <li>
                    <input type="radio" name="answer" id="a" class="answer" hidden>
                    <label for="a" class="label_quiz">
                        <div class="dot"></div>
                        <span id="a_text">
                            Question
                        </span>
                    </label>
                </li>

                <li>
                    <input type="radio" name="answer" id="b" class="answer" hidden>
                    <label for="b" class="label_quiz">
                        <div class="dot"></div>
                        <span id="b_text">
                            Question
                        </span>
                    </label>
                </li>

                <li>
                    <input type="radio" name="answer" id="c" class="answer" hidden>
                    <label for="c" class="label_quiz">
                        <div class="dot"></div>
                        <span id="c_text">
                            Question
                        </span>
                    </label>
                </li>

                <li>
                    <input type="radio" name="answer" id="d" class="answer" hidden>
                    <label for="d" class="label_quiz">
                        <div class="dot"></div>
                        <span id="d_text">
                            Question
                        </span>
                    </label>
                </li>
            </ul>

            <button id="submit">بعدی</button>
        </div>
    </div>
    
    <script>
        const quizData = [
            {
                question: "کدام زبان در مرورگر وب اجرا می شود؟",
                a: "Java",
                b: "C",
                c: "Python",
                d: "JavaScript",
                correct: "d",
            },
            {
                question: "سی اس اس محفف چیست ؟",
                a: "Central Style Sheets",
                b: "Cascading Style Sheets",
                c: "Cascading Simple Sheets",
                d: "Cars SUVs Sailboats",
                correct: "b",
            },
            {
                question: "اچ تی ام ال مخفف چیست ؟",
                a: "Hypertext Markup Language",
                b: "Hypertext Markdown Language",
                c: "Hyperloop Machine Language",
                d: "Helicopters Terminals Motorboats Lamborginis",
                correct: "a",
            },
            {
                question: "جاوا اسکریپت چه سالی راه اندازی شد؟",
                a: "1996",
                b: "1995",
                c: "1994",
                d: "هیچ یک از موارد بالا",
                correct: "b",
            },
            {
                question: "کدام یک از موارد زیر نوعی از زبان برنامه نویسی است؟",
                a: "HTML",
                b: "CSS",
                c: "Python",
                d: "JSON",
                correct: "c",
            },
            {
                question: "کدام یک از زبان های برنامه نویسی زیر برای ساخت برنامه های موبایل استفاده می شود؟",
                a: "Swift",
                b: "Java",
                c: "Kotlin",
                d: "C++",
                correct: "a",
            },
            {
                question: "کدام زبان برای ساخت سیستم عامل برای سیستم عامل Android است؟",
                a: "Kotlin",
                b: "Java",
                c: "C++",
                d: "Swift",
                correct: "b",
            },
            {
                question: "کدام یک از زبان های برنامه نویسی زیر محبوب ترین زبان برنامه نویسی سال 2020 است؟",
                a: "Python",
                b: "JavaScript",
                c: "Java",
                d: "C++",
                correct: "a",
            },
            {
                question: "کدام یک از زبان های برنامه نویسی زیر برای ساخت وب سایت ها استفاده می شود؟",
                a: "Python",
                b: "Java",
                c: "C++",
                d: "HTML",
                correct: "d",
            },
        ];

        // گرفتن اجزای HTML
        const quiz = document.getElementById('quiz');
        const answerEls = document.querySelectorAll('.answer');
        const questionEl = document.getElementById('question');
        const a_text = document.getElementById('a_text');
        const b_text = document.getElementById('b_text');
        const c_text = document.getElementById('c_text');
        const d_text = document.getElementById('d_text');
        const submitBtn = document.getElementById('submit');
        const label_quiz_all = document.querySelectorAll('.label_quiz');
        const timer = document.getElementById('timer');

        // متغیرهای مورد استفاده
        let currentQuiz = 0;
        let score = 0;
        let timeLeft = 70;

        // ایجاد یک تایمر برای زمان
        let intervalTime = setInterval(function () {
            const minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            timer.innerHTML = minutes + ':' + seconds;
            timeLeft--;

            if (timeLeft < 60) {
                timer.style.color = '#ff6666';
            }
            if (timeLeft > 0) {
                timeLeft--;
            }
            else {
                clearInterval(intervalTime);
                timeLeft = 0;
                location.reload();
            }

        }, 1000);

        // بارگذاری سوال
        loadQuiz();

        function loadQuiz() {
            deselectAnswers();

            const currentQuizData = quizData[currentQuiz];

            questionEl.innerText = currentQuizData.question;
            a_text.innerText = currentQuizData.a;
            b_text.innerText = currentQuizData.b;
            c_text.innerText = currentQuizData.c;
            d_text.innerText = currentQuizData.d;
        }

        // انتخاب جواب نشده
        function deselectAnswers() {
            answerEls.forEach(answerEl => answerEl.checked = false);
        }

        // گرفتن جواب انتخاب شده
        function getSelected() {
            let answer;

            answerEls.forEach(answerEl => {
                if (answerEl.checked) {
                    answer = answerEl.id;
                }
            });

            return answer;
        }

        // ارزیابی جواب
        function handelValidation(type = 'is_valid') {
            label_quiz_all.forEach(label => {
                if (type == 'not_valid') {
                    label.classList.add('border-error');
                }
                else {
                    label.classList.remove('border-error');
                }
            });
        }

        // ارسال جواب و بررسی صحت آن
        submitBtn.addEventListener('click', () => {
            const answer = getSelected();

            if (answer) {
                if (answer === quizData[currentQuiz].correct) {
                    score++;
                }

                currentQuiz++;
                handelValidation();
                if (currentQuiz < quizData.length) {
                    loadQuiz();
                } else {
                    quiz.innerHTML = `
                        <h2>${score} پاسخ صحیح از ${quizData.length} سوال</h2>
                        <button onclick="location.reload()">شروع مجدد</button>
                    `;
                }
            }
            else {
                handelValidation('not_valid');
               
            }
        });
    </script>

</body>

</html>
