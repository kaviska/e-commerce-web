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

        // Try multiple SMTP configurations based on server capabilities
        $this->setupSMTPConfiguration();
    }

    private function setupSMTPConfiguration()
    {
        // Configuration 1: Try SSL on port 465 (original working local config)
        try {
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.titan.email';
            $this->mail->Port = 465;
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'parking@yourmeetandgreetservice.co.uk';
            $this->mail->Password = 'b00x123#!';
            $this->mail->SMTPSecure = 'ssl';
            
            // Disable SSL verification if needed (for testing)
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            
            error_log("EmailSender: Configured SSL on port 465");
            return;
        } catch (Exception $e) {
            error_log("EmailSender: SSL 465 config failed: " . $e->getMessage());
        }

        // Configuration 2: Try TLS on port 587
        try {
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.titan.email';
            $this->mail->Port = 587;
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'parking@yourmeetandgreetservice.co.uk';
            $this->mail->Password = 'b00x123#!';
            $this->mail->SMTPSecure = 'tls';
            
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            
            error_log("EmailSender: Configured TLS on port 587");
            return;
        } catch (Exception $e) {
            error_log("EmailSender: TLS 587 config failed: " . $e->getMessage());
        }

        // Configuration 3: Plain SMTP on port 25 (your current fallback)
        try {
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.titan.email';
            $this->mail->SMTPAuth = false;
            $this->mail->Username = 'parking@yourmeetandgreetservice.co.uk';
            $this->mail->Password = 'b00x123#!';
            $this->mail->SMTPSecure = '';
            $this->mail->Port = 25;
            
            error_log("EmailSender: Configured plain SMTP on port 25");
            return;
        } catch (Exception $e) {
            error_log("EmailSender: Plain SMTP 25 config failed: " . $e->getMessage());
        }

        // Configuration 4: Use PHP's built-in mail() function as last resort
        $this->mail->isMail();
        error_log("EmailSender: Falling back to PHP mail() function");
    }

    public function sendEmail($recipient, $subject, $body, $senderName = 'Meet & Greet Service')
    {
        try {
            // Enable debug output for detailed error information
            $this->mail->SMTPDebug = 2; // 0 = off, 1 = client messages, 2 = client and server messages
            $this->mail->Debugoutput = function($str, $level) {
                error_log("PHPMailer DEBUG ($level): $str");
            };

            // Test server connectivity before sending
            $this->testServerConnectivity();

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
            error_log("EmailSender: SMTP Secure: " . $this->mail->SMTPSecure);

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
                'code' => $e->getCode(),
                'smtp_config' => [
                    'host' => $this->mail->Host,
                    'port' => $this->mail->Port,
                    'auth' => $this->mail->SMTPAuth,
                    'secure' => $this->mail->SMTPSecure
                ]
            ];
        }
    }

    private function testServerConnectivity()
    {
        $host = $this->mail->Host;
        $port = $this->mail->Port;
        
        error_log("EmailSender: Testing connectivity to $host:$port");
        
        // Test if we can connect to the SMTP server
        $connection = @fsockopen($host, $port, $errno, $errstr, 10);
        if (!$connection) {
            error_log("EmailSender: Cannot connect to $host:$port - Error: $errno - $errstr");
            
            // Try alternative ports if current one fails
            $alternativePorts = [25, 465, 587, 2525];
            foreach ($alternativePorts as $altPort) {
                if ($altPort != $port) {
                    $altConnection = @fsockopen($host, $altPort, $altErrno, $altErrstr, 5);
                    if ($altConnection) {
                        error_log("EmailSender: Alternative port $altPort is accessible");
                        fclose($altConnection);
                    } else {
                        error_log("EmailSender: Alternative port $altPort also blocked: $altErrno - $altErrstr");
                    }
                }
            }
        } else {
            error_log("EmailSender: Successfully connected to $host:$port");
            fclose($connection);
        }
    }
}

// Example usage:
