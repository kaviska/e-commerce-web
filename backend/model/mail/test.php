<?php
require_once "PHPMailer.php";
require_once "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        // Use PHP mail() instead of SMTP
        $this->mail->isMail(); 
    }

    public function sendEmail($recipient, $subject, $body, $senderName = 'Meet & Greet Service')
    {
        try {
            $fromEmail = 'info@gigantoo.com';

            $this->mail->setFrom($fromEmail, $senderName);
            $this->mail->addAddress($recipient);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            return false;
        }
    }
}
