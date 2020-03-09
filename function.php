<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include 'config.php';

class Contact
{
    public $url = "http://morasia.mor.com.vn/#contact";

    public function submitContact() {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $companyName = $_POST['company-name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $requirement = $_POST['requirement'];
        }
        $responseData = $this->checkRecaptcha($_POST['g-recaptcha-response']);

        if ($responseData) {
            $this->sendMail($name, $companyName, $email, $subject, $requirement);
        } else {
            session_start();
            $_SESSION['captcha_error'] = 'Robot verification failed, please try again.';
            $_SESSION['post_data'] = $_POST;
            
            return $this->redirectPage();
        }
    }

    public function redirectPage() {
        return header("Location: " . $this->url);
    }

    private function checkRecaptcha($recaptcha) {
        
            $secret = RECAPTCHA_SECRET_KEY;
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $recaptcha);
            $responseData = json_decode($verifyResponse);

            return $responseData->success;
    }

    public function sendMail($name, $companyName, $email, $subject, $requirement) {
        try {
            //Server settings
            $mail = new PHPMailer(true);
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = MAIL_HOST;                  
            $mail->SMTPAuth   = MAIL_SMTPAuth;
            $mail->Username   = MAIL_USERNAME;          
            $mail->Password   = MAIL_PASSWORD;                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = MAIL_PORT;                                 

            //Recipients
            $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
            // Add a recipient
            $mail->addAddress(MAIL_TO, MAIL_TO_NAME);    
            // $mail->addAddress(MAIL_TO_TEST, MAIL_TO_NAME);

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
            
            return $this->redirectPage();
        } catch (Exception $e) {
            session_start();
            $_SESSION['error'] = "Mailer is not working!";
            
            error_log("Error info: $mail->ErrorInfo", 3, "/var/www/html/mor_landing_page/logs/my-errors.log");

            return $this->redirectPage();
        }
    }
}

$contact = new Contact();
$contact->submitContact();
