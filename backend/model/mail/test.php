<?php
require_once "PHPMailer.php";
require_once "SMTP.php";
require_once "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.titan.email';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'parking@yourmeetandgreetservice.co.uk';
        $this->mail->Password = 'b00x123#!';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;

        $this->mail->SMTPDebug = 2;
        $this->mail->Debugoutput = 'html';
    }

    public function sendEmail($recipient, $subject, $body)
    {
        try {
            $this->mail->setFrom('parking@yourmeetandgreetservice.co.uk', 'Meet & Greet Service');
            $this->mail->addAddress($recipient);

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            $this->mail->send();
            echo "✅ Email sent successfully!";
        } catch (Exception $e) {
            echo "❌ Email failed: " . $this->mail->ErrorInfo;
        }
    }
}

