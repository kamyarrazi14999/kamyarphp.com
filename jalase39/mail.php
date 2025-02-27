<?php 
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$smtpHost = $_ENV['MAIL_HOST'];
$smtpUsername = $_ENV['MAIL_USERNAME'];
$smtpPassword = $_ENV['MAIL_PASSWORD'];
$smtpPort = $_ENV['MAIL_PORT'];
$smtpMailer = $_ENV['MAIL_MAILER'];
$smtpEnc= $_ENV['MAIL_ENCRYPTION'];


$mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host       = $smtpHost;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUsername;
    $mail->Password   = $smtpPassword;
    $mail->SMTPSecure = $smtpEnc;
    $mail->Port       = $smtpPort;
    $mail->CharSet = "UTF-8";

    // Message Settings
    $mail->setFrom($smtpUsername, 'kamyar APP LLC');
    $mail->addAddress('kami6535@gmail.com','kamyar UNI');
    
    // Read Body from Html file
    $htmlTemplate = file_get_contents('mailtemplate.html');
    
    $mail->isHTML(true);
    $mail->Subject = 'Welcome to kamyar APP LLC';
    $mail->Body    = $htmlTemplate;

    // Send Email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>