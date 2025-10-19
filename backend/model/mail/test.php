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
        $this->mail->Host = 'smtp.titan.email'; //
        $this->mail->SMTPAuth = false;
        $this->mail->Username = 'parking@yourmeetandgreetservice.co.uk'; //
        $this->mail->Password = 'b00x123#!'; //
        $this->mail->SMTPSecure = '';
        $this->mail->Port = 25;
    }

    public function sendEmail($recipient, $subject, $body, $senderName = 'Meet & Greet Service')
    {
        try {
            // Enable debug output for detailed error information
            $this->mail->SMTPDebug = 2; // 0 = off, 1 = client messages, 2 = client and server messages
            $this->mail->Debugoutput = function($str, $level) {
                error_log("PHPMailer DEBUG ($level): $str");
            };

            // Sender and recipient
            $this->mail->setFrom('parking@yourmeetandgreetservice.co.uk', $senderName);
            $this->mail->addAddress($recipient);

            // Email content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            // Log email attempt
            error_log("EmailSender: Attempting to send email to: $recipient");
            error_log("EmailSender: Subject: $subject");
            error_log("EmailSender: SMTP Host: " . $this->mail->Host);
            error_log("EmailSender: SMTP Port: " . $this->mail->Port);
            error_log("EmailSender: SMTP Auth: " . ($this->mail->SMTPAuth ? 'true' : 'false'));

            // Send the email
            $this->mail->send();
            
            error_log("EmailSender: Email sent successfully to: $recipient");
            return true; // Email sent successfully
        } catch (Exception $e) {
            // Log detailed error information
            error_log("EmailSender ERROR: " . $e->getMessage());
            error_log("EmailSender ERROR Details: " . $this->mail->ErrorInfo);
            error_log("EmailSender ERROR Code: " . $e->getCode());
            error_log("EmailSender ERROR Line: " . $e->getLine());
            error_log("EmailSender ERROR File: " . $e->getFile());
            
            // Return detailed error for debugging (you can remove this in production)
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'details' => $this->mail->ErrorInfo,
                'code' => $e->getCode()
            ];
        }
    }
}

// Example usage:
