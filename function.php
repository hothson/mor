<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $secret = '6Lca19kUAAAAAIr5Zv2x1UE0D2pFA2ZOOV4OKm_7';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;
            $mail->Username   = 'hothson@gmail.com';                     // SMTP username
            $mail->Password   = 'Tesla@33';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                 // TCP port to connect to

            //Recipients
            $mail->setFrom('son.hothanh@mor.com.vn', 'Mor');
            $mail->addAddress('hothson@gmail.com', 'Ho Thanh Son');     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            session_start();
            $_SESSION['success'] = 'Your contact request have submitted successfully.';
            header("Location: http://mor.test/#contact");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        session_start();
        $_SESSION['error'] = 'Robot verification failed, please try again.';
    }
} else {
    session_start();
    $_SESSION['error'] = 'Robot verification failed, please try again.';
    header("Location: http://mor.test/#contact");
}
