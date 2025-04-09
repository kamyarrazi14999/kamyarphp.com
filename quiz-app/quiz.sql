CREATE DATABASE guiz_db;
USE guiz_db;

-- جدول کاربران
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
-- جدول آزمون‌ها
CREATE TABLE exams (
    exam_id INT PRIMARY KEY AUTO_INCREMENT,
    exam_name VARCHAR(100) NOT NULL,
    duration INT NOT NULL, -- مدت زمان به دقیقه
    available_at DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- جدول سوالات
CREATE TABLE questions (
    question_id INT PRIMARY KEY AUTO_INCREMENT,
    exam_id INT,
    question_text TEXT NOT NULL,
    option1 VARCHAR(255) NOT NULL,
    option2 VARCHAR(255) NOT NULL,
    option3 VARCHAR(255) NOT NULL,
    option4 VARCHAR(255) NOT NULL,
    correct_answer INT NOT NULL,
    FOREIGN KEY (exam_id) REFERENCES exams(exam_id)
);

-- جدول انتخاب‌ها
CREATE TABLE answers (
    answer_id INT PRIMARY KEY AUTO_INCREMENT,
    result_id INT,
    question_id INT,
    selected_answer INT,
    FOREIGN KEY (result_id) REFERENCES results(result_id),
    FOREIGN KEY (question_id) REFERENCES questions(question_id)
);
-- جدول نتایج
CREATE TABLE results (
    result_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    exam_id INT,
    score INT,
    started_at DATETIME,
    finished_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (exam_id) REFERENCES exams(exam_id)
);
-- جدول تماس‌ها
CREATE TABLE contacts (
    contact_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    sent_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
