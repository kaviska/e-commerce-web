<?php
// Include PHPMailer
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
        // Create a new PHPMailer instance
        $this->mail = new PHPMailer(true);

        // GoDaddy SMTP configuration
        $this->mail->isSMTP();
        $this->mail->Host = 'localhost';          // GoDaddy relay server
        $this->mail->Port = 25;                   // GoDaddy allows only port 25 for relay
        $this->mail->SMTPAuth = false;            // No authentication
        $this->mail->SMTPSecure = false;          // No encryption

        // Optional: enable debug output (remove after testing)
        // $this->mail->SMTPDebug = 2;
        // $this->mail->Debugoutput = 'html';
    }

    public function sendEmail($recipient, $subject, $body, $senderName = 'Meet & Greet Service')
    {
        try {
            // Use a valid domain email as sender
            $fromEmail = 'info@gigantoo.com';

            // Sender and recipient
            $this->mail->setFrom($fromEmail, $senderName);
            $this->mail->addAddress($recipient);

            // Email content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            // Send the email
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            return false;
        }
    }
}

// Example usage:
// $email = new EmailSender();
// $email->sendEmail('test@example.com', 'Test Subject', '<h1>Hello from GoDaddy!</h1>');
