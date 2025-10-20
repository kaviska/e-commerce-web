<?php
// Include PHPMailer
require_once "SMTP.php";
require_once "PHPMailer.php";
require_once "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

class EmailSender
{
    private $mail;

    public function __construct()
    {
        // Create a new PHPMailer instance
        $this->mail = new PHPMailer(true);

        // SMTP configuration
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->Port = 587;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'info.iymart@gmail.com';
        $this->mail->Password = 'ladiaffuinspyzyu';
        $this->mail->SMTPSecure = 'tls';

        // $this->mail->isSMTP();
        // $this->mail->Host = 'smtp.titan.email'; //
        // $this->mail->SMTPAuth = false;
        // $this->mail->Username = 'info.iymart@gmail.com'; //
        // $this->mail->Password = 'b00x123#!'; //
        // $this->mail->SMTPSecure = 'None';
        // $this->mail->Port = 25;
    }

    public function sendEmail($recipient, $subject, $body, $senderName = 'Meet & Greet Service')
    {
        try {
            // Sender and recipient
            $this->mail->setFrom('info.iymart@gmail.com', $senderName);
            $this->mail->addAddress($recipient);

            // Email content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            // Send the email
            $this->mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            return false; // Failed to send email
        }
    }
}

// Example usage:
