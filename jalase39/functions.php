<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ );
$dotenv->load();

function generateOTP(){
    return rand(1000,9999);
}

function sendOTP($email, $otp){
    $mail = new PHPMailer(true);

    try {
        $smtpHost = $_ENV['MAIL_HOST'];
        $smtpUsername = $_ENV['MAIL_USERNAME'];
        $smtpPassword = $_ENV['MAIL_PASSWORD'];
        $smtpPort = $_ENV['MAIL_PORT'];
        $smtpMailer = $_ENV['MAIL_MAILER'];
        $smtpEnc = $_ENV['MAIL_ENCRYPTION'];

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host       = $smtpHost;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpUsername;
        $mail->Password   = $smtpPassword;
        $mail->SMTPSecure = $smtpEnc;
        $mail->Port       = $smtpPort;
        $mail->CharSet    = "UTF-8";

        // Email settings
        $mail->setFrom($smtpUsername, 'kamyar LLC');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'OTP Verification';
        $mail->Body    = "Your OTP is: $otp";

        $mail->send();
        echo "Message has been sent successfully";

    } catch (Exception $e) {
        echo "Connection failed: ". $mail->ErrorInfo;
    }
}
?>