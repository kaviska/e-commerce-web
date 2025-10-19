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
        // $this->mail->isSMTP();
        // $this->mail->Host = 'smtp.titan.email';
        // $this->mail->Port = 465;
        // $this->mail->SMTPAuth = true;
        // $this->mail->Username = 'parking@yourmeetandgreetservice.co.uk';
        // $this->mail->Password = 'b00x123#!';
        // $this->mail->SMTPSecure = 'ssl';

        $this->mail->isSMTP();
        $this->mail->Host = 'localhost'; //
        $this->mail->SMTPAuth = false;
        $this->mail->Username = 'ecommerce@gigantoo.com'; //
        $this->mail->Password = 'Malidunew@123'; //
        $this->mail->SMTPSecure = '';
        $this->mail->Port = 25;
    }

    public function sendEmail($recipient, $subject, $body, $senderName = 'Meet & Greet Service')
    {
        try {
            // Sender and recipient
            $this->mail->setFrom('ecommerce@gigantoo.com', $senderName);
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
