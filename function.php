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
        error_log("Form is Submited." . "\n", 3, "logs/my-errors.log");
        
        $responseData = $this->checkRecaptcha($_POST['g-recaptcha-response']);
        error_log("Check recaptcha: " . $responseData . "\n", 3, "logs/my-errors.log");
        if (!$responseData) {
            session_start();
            $_SESSION['captcha_error'] = 'Robot verification failed, please try again.';
            $_SESSION['post_data'] = $_POST;
            
            return $this->redirectPage();
        }

        if (isset($_POST['submit'])) {
            $subject = $_POST['subject'];
        }

        $body = $this->getMailContentBody($_POST, 'admin');
        $mailRes = $this->sendMail(MAIL_TO_TEST, $body, $subject);
        $mailRes = $this->sendMail(MAIL_TO, $body, $subject);

        if (!$mailRes) {
            return false;
        }

        session_start();
        $_SESSION['success'] = 'Your contact request have submitted successfully.';
        error_log("Mail is sent to admin" . "\n", 3, "logs/my-errors.log");

        //Reply customer'mail
        $customerMailBody = $this->getMailContentBody($_POST, 'customer');

        if (!isset($_POST['email'])) {
            echo("There is no customer's email");
            
            return $this->redirectPage();
        }

        $mailTo = $_POST['email'];
        $this->sendMail($mailTo, $customerMailBody,PREFIX_SUBJECT);

        return $this->redirectPage();
    }

    private function getMailContentBody($data, $flag) {
        if (!isset($data['submit'])) {
            echo("No data to create mail content");

            return false;
        }

        $name = $data['name'];
        $companyName = $data['company-name'];
        $email = $data['email'];
        $subject = $data['subject'];
        $requirement = $data['requirement'];


        if ($flag == 'admin') {
            $body = '<h4>The persion with following infomation has contacted you</h4>'
                . '<span>Name: ' . $name . '</span><br>'
                . '<span>Company Name: ' . $companyName . '</span><br>'
                . '<span>Mail: ' . $email . '</span><br>'
                . '<span>Subject: ' . $subject . '</span><br>'
                . '<span>Content: ' . $requirement . '</span><br>';

            return $body;
        }

        $time = date("Y-m-d H:i");

        $body = 
            "<h3>" . $name . "様</h3>

            <div>この度はモアアジアへお問合せいただき、誠にありがとうございます。
                以下の内容を受け付けました。
                後日担当よりご返信させていただきます。</div>
            <div>※このメールに返信いただいても、ご返答できませんのでご了承ください。</div>
            <div>＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝</div>
            
            <h5>【 送信日時 】</h5>
            <span>$time</span>
            
            <h5>【 御社名 】</h5>
            <span>$companyName</span>
            
            <h5>【 お名前 】</h5>
            <span>$name</span>
            
            <h5>【 メールアドレス 】</h5>
            <span>$email</span>
            
            <h5>【 お電話番号 】</h5>
            <span></span>
            
            <h5>【 ご相談・ご依頼内容 】</h5>
            <span>$subject</span>
            
            <h5>【 その他 】</h5>
            <p>$requirement</p>
            <div>＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝</div>
            <div>
                 /*---------------------------------*/<br>
                株式会社モアアジア<br>
                〒171-0022<br>
                東京都豊島区南池袋2-9-3 サンビルディング4階<br>
                Tel： 03-5924-6616（日本）<br>
                Mail：sales@morsoftware.com<br>
                URL：https://morsoftware.com<br>
                /*---------------------------------*/
            </div>";

        return $body;
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

    public function sendMail($mailTo, $body, $subject) {
        try {

            error_log("Start sending mail to $mailTo" . "\n", 3, "logs/my-errors.log");

            //Server settings
            $mail = new PHPMailer(true);
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            
            $mail->Host       = MAIL_HOST;
            error_log("Mail Host: " . $mail->Host . "\n", 3, "logs/my-errors.log");

            $mail->SMTPAuth   = MAIL_SMTPAuth;
            error_log("MAIL_SMTPAuth: " . $mail->SMTPAuth . "\n", 3, "logs/my-errors.log");                

            $mail->Username   = MAIL_USERNAME;  
            error_log("MAIL_USERNAME: " . $mail->Username . "\n", 3, "logs/my-errors.log");                

            $mail->Password   = MAIL_PASSWORD;
            error_log("MAIL_PASSWORD: " . $mail->Password . "\n", 3, "logs/my-errors.log");                

            error_log("Username, Password are authenticated" . "\n", 3, "logs/my-errors.log");

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->Port       = MAIL_PORT;
            error_log("MAIL_PORT: " . $mail->Port . "\n", 3, "logs/my-errors.log");
            error_log("Mail server authenticated" . "\n", 3, "logs/my-errors.log");
            
            //Recipients
            error_log("MAIL_FROM: " . MAIL_FROM . "\n", 3, "logs/my-errors.log");
            $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
            // Add a recipient
            $mail->addAddress($mailTo, MAIL_TO_NAME);
            error_log("MAIL_TO: " . MAIL_TO . "\n", 3, "logs/my-errors.log");

            // Content
            $mail->isHTML(true);     
            $mail->CharSet = 'UTF-8';                     
            $mail->Subject = $subject;
            error_log("Subject: " . $mail->Subject . "\n", 3, "logs/my-errors.log");
            
            $mail->Body    = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            error_log("Body: " . $mail->Body . "\n", 3, "logs/my-errors.log");
            $mail->send();
            
        } catch (Exception $e) {
            session_start();
            $_SESSION['error'] = "Mailer is not working!";
            
            error_log("Error info: $mail->ErrorInfo", 3, "logs/my-errors.log");

            return $this->redirectPage();
        }

        return true;
    }
}

$contact = new Contact();
$contact->submitContact();
