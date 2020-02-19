<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include 'config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $companyName = $_POST['company-name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $requirement = $_POST['requirement'];
}

if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $secret = '6Lca19kUAAAAAIr5Zv2x1UE0D2pFA2ZOOV4OKm_7';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {
        try {
            //Server settings
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                
            $mail->isSMTP();
            $mail->Host       = MAIL_HOST;                    
            $mail->SMTPAuth   = MAIL_SMTPAuth;
            $mail->Username   = MAIL_USERNAME;                     
            $mail->Password   = MAIL_PASSWORD;                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = MAIL_PORT;                                 

            //Recipients
            $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
            $mail->addAddress(MAIL_TO, MAIL_TO_NAME);     // Add a recipient

            // Content
            $mail->isHTML(true);                          
            $mail->Subject = $subject ?? 'Somebody contact you';
            $body = '<h4>The persion with following infomation has contacted you</h4>'
                . '<span>Name: ' . $name . '</span><br>'
                . '<span>Company Name: ' . $companyName . '</span><br>'
                . '<span>Mail: ' . $email . '</span><br>'
                . '<span>Subject: ' . $subject . '</span><br>'
                . '<span>Content: ' . $requirement . '</span><br>';
            $mail->Body    = $body;
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
        $_SESSION['error'] = 'Cannot send mail!';
    }
} else {
    session_start();
    $_SESSION['error'] = 'Robot verification failed, please try again.';
    header("Location: http://mor.test/#contact");
}
