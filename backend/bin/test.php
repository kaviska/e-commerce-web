<?php
// Email Testing Environment
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include PHPMailer
require_once "../model/mail/SMTP.php";
require_once "../model/mail/PHPMailer.php";
require_once "../model/mail/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

// Handle email sending request
if (isset($_REQUEST['sendemail'])) {
    header("Content-Type: text/plain");
    header("X-Node: " . gethostname());
    
    $from = $_REQUEST['from'];
    $toemail = $_REQUEST['toemail'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
    $sendmethod = $_REQUEST['sendmethod'];
    
    // Validation
    if (empty($from) || empty($toemail)) {
        header("HTTP/1.1 500 ValidationError");
        echo 'FAIL: You must fill in From: and To: fields.';
        exit;
    }
    
    if (!filter_var($toemail, FILTER_VALIDATE_EMAIL)) {
        header("HTTP/1.1 500 ValidationError");
        echo 'FAIL: Invalid email address format.';
        exit;
    }
    
    // Send email based on method
    if ($sendmethod == "mail") {
        $result = mail($toemail, $subject, $message, "From: $from");
        echo $result ? 'OK' : 'FAIL';
        
    } elseif ($sendmethod == "smtp") {
        ob_start();
        
        $mail = new PHPMailer(true);
        
        try {
            // SMTP configuration - using the working configuration from your project
            $mail->isSMTP();
            $mail->Host = 'smtp.titan.email';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = 'parking@yourmeetandgreetservice.co.uk';
            $mail->Password = 'b00x123#!';
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPDebug = 2;
            
            // Email configuration
            $mail->setFrom($from, 'Test Mailer');
            $mail->addAddress($toemail);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            
            // Send email
            $mailresult = $mail->send();
            $mailconversation = nl2br(htmlspecialchars(ob_get_clean()));
            
            if ($mailresult) {
                echo 'OK: Email sent successfully<br />' . $mailconversation;
            } else {
                echo 'FAIL: ' . $mail->ErrorInfo . '<br />' . $mailconversation;
            }
            
        } catch (Exception $e) {
            $mailconversation = nl2br(htmlspecialchars(ob_get_clean()));
            echo 'FAIL: ' . $e->getMessage() . '<br />' . $mailconversation;
        }
    }
    exit;
}