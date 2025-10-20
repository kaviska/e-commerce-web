<?php
// Include PHPMailer
require_once "SMTP.php";
require_once "PHPMailer.php";
require_once "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender
{
    private $mail;
    private $debugMode;
    private $lastError;

    public function __construct($debugMode = false)
    {
        $this->debugMode = $debugMode;
        $this->lastError = '';
        
        // Create a new PHPMailer instance
        $this->mail = new PHPMailer(true);

        // Configure for hosting environment (GoDaddy compatible)
        $this->configureForHosting();
    }

    private function configureForHosting()
    {
        try {
            // SMTP configuration - optimized for GoDaddy hosting
            $this->mail->isSMTP();
            
            // Check if we're on localhost or hosting environment
            if ($this->isLocalhost()) {
                // Local configuration (Gmail SMTP)
                $this->mail->Host = 'smtp.gmail.com';
                $this->mail->Port = 587;
                $this->mail->SMTPAuth = true;
                $this->mail->Username = 'info.iymart@gmail.com';
                $this->mail->Password = 'ladiaffuinspyzyu';
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            } else {
                // GoDaddy hosting configuration
                $this->mail->Host = 'smtp.gmail.com';
                $this->mail->Port = 465; // Try SSL port for hosting
                $this->mail->SMTPAuth = true;
                $this->mail->Username = 'info.iymart@gmail.com';
                $this->mail->Password = 'ladiaffuinspyzyu';
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                
                // Additional settings for hosting environments
                $this->mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
            }

            // Enable debug output if debug mode is on
            if ($this->debugMode) {
                $this->mail->SMTPDebug = 2;
                $this->mail->Debugoutput = 'html';
            }

            // Set charset and encoding
            $this->mail->CharSet = 'UTF-8';
            $this->mail->Encoding = 'base64';

        } catch (Exception $e) {
            $this->lastError = "Configuration error: " . $e->getMessage();
        }
    }

    private function isLocalhost()
    {
        $localhost_names = ['localhost', '127.0.0.1', '::1'];
        return in_array($_SERVER['HTTP_HOST'] ?? '', $localhost_names) || 
               strpos($_SERVER['HTTP_HOST'] ?? '', 'localhost') !== false ||
               strpos($_SERVER['HTTP_HOST'] ?? '', '127.0.0.1') !== false;
    }

    public function sendEmail($recipient, $subject, $body, $senderName = 'Meet & Greet Service')
    {
        try {
            // Clear any previous recipients
            $this->mail->clearAddresses();
            $this->mail->clearAttachments();

            // Sender and recipient
            $this->mail->setFrom('info.iymart@gmail.com', $senderName);
            $this->mail->addAddress($recipient);
            $this->mail->addReplyTo('info.iymart@gmail.com', $senderName);

            // Email content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            
            // Create plain text version
            $this->mail->AltBody = strip_tags($body);

            // Send the email
            $result = $this->mail->send();
            $this->lastError = '';
            return $result;
            
        } catch (Exception $e) {
            $this->lastError = $e->getMessage();
            if ($this->debugMode) {
                error_log("Email sending failed: " . $e->getMessage());
            }
            return false;
        }
    }

    public function getLastError()
    {
        return $this->lastError;
    }

    public function testEmail($recipient, $includeDebug = false)
    {
        // Validate email format
        if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            return [
                'status' => 'failed',
                'error' => 'Invalid email format'
            ];
        }

        $subject = 'Test Email - ' . date('Y-m-d H:i:s');
        
        // Create a comprehensive test email body
        $body = '<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
            <h2 style="color: #333; text-align: center;">Email Configuration Test</h2>
            <div style="background-color: #f9f9f9; padding: 15px; border-radius: 5px; margin: 20px 0;">
                <p style="color: #666; margin: 0;"><strong>This is a test email sent from the e-commerce application</strong></p>
                <hr style="border: 1px solid #eee; margin: 15px 0;">
                <div style="color: #333; line-height: 1.6;">
                    <p><strong>Test Details:</strong></p>
                    <ul>
                        <li>Sent at: ' . date('Y-m-d H:i:s') . '</li>
                        <li>Server: ' . ($_SERVER['HTTP_HOST'] ?? 'Unknown') . '</li>
                        <li>Environment: ' . ($this->isLocalhost() ? 'Local Development' : 'Production/Hosting') . '</li>
                        <li>PHP Version: ' . phpversion() . '</li>
                        <li>SMTP Host: ' . $this->mail->Host . '</li>
                        <li>SMTP Port: ' . $this->mail->Port . '</li>
                        <li>Encryption: ' . $this->mail->SMTPSecure . '</li>
                    </ul>
                    <p>If you receive this email, the email configuration is working correctly!</p>
                </div>
            </div>
            <p style="color: #999; font-size: 12px; text-align: center; margin-top: 30px;">
                E-commerce Email Test System
            </p>
        </div>';

        // Attempt to send the email
        if ($this->sendEmail($recipient, $subject, $body, 'E-commerce Test System')) {
            return [
                'status' => 'success',
                'message' => 'Test email sent successfully to ' . $recipient,
                'details' => [
                    'environment' => $this->isLocalhost() ? 'localhost' : 'hosting',
                    'smtp_host' => $this->mail->Host,
                    'smtp_port' => $this->mail->Port,
                    'encryption' => $this->mail->SMTPSecure
                ]
            ];
        } else {
            return [
                'status' => 'failed',
                'error' => 'Failed to send email: ' . $this->getLastError(),
                'debug_info' => $includeDebug ? [
                    'environment' => $this->isLocalhost() ? 'localhost' : 'hosting',
                    'smtp_host' => $this->mail->Host,
                    'smtp_port' => $this->mail->Port,
                    'encryption' => $this->mail->SMTPSecure,
                    'last_error' => $this->getLastError()
                ] : null
            ];
        }
    }
}

// Test functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['test_email'])) {
    header('Content-Type: application/json');
    
    $testEmail = $_POST['test_email'] ?? '';
    $includeDebug = isset($_POST['debug']) && $_POST['debug'] === '1';
    
    if (empty($testEmail)) {
        echo json_encode(['status' => 'failed', 'error' => 'Email address is required']);
        exit;
    }
    
    $emailSender = new EmailSender($includeDebug);
    $result = $emailSender->testEmail($testEmail, $includeDebug);
    
    echo json_encode($result);
    exit;
}

// HTML Test Interface
if (!isset($_POST['test_email'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Email Configuration Test</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="email"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #005a87; }
        .result { margin-top: 20px; padding: 15px; border-radius: 4px; }
        .success { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; }
        .error { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; }
        .debug { background: #f8f9fa; border: 1px solid #dee2e6; color: #495057; font-family: monospace; white-space: pre-wrap; }
    </style>
</head>
<body>
    <h1>Email Configuration Test</h1>
    <p>Test your email configuration to ensure it works on both localhost and hosting environment.</p>
    
    <form id="testForm">
        <div class="form-group">
            <label for="test_email">Test Email Address:</label>
            <input type="email" id="test_email" name="test_email" required placeholder="Enter email to receive test message">
        </div>
        
        <div class="form-group">
            <label>
                <input type="checkbox" id="debug" name="debug" value="1"> Enable debug information
            </label>
        </div>
        
        <button type="submit">Send Test Email</button>
    </form>
    
    <div id="result"></div>

    <script>
        document.getElementById('testForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const resultDiv = document.getElementById('result');
            
            resultDiv.innerHTML = '<p>Sending email...</p>';
            
            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                let html = '<div class="result ' + (data.status === 'success' ? 'success' : 'error') + '">';
                html += '<h3>' + (data.status === 'success' ? 'Success!' : 'Error') + '</h3>';
                html += '<p>' + (data.message || data.error) + '</p>';
                
                if (data.details || data.debug_info) {
                    html += '<h4>Details:</h4>';
                    html += '<div class="debug">' + JSON.stringify(data.details || data.debug_info, null, 2) + '</div>';
                }
                
                html += '</div>';
                resultDiv.innerHTML = html;
            })
            .catch(error => {
                resultDiv.innerHTML = '<div class="result error"><h3>Error</h3><p>Failed to send request: ' + error.message + '</p></div>';
            });
        });
    </script>
</body>
</html>
<?php
}

// Example usage for API integration:
/*
$emailSender = new EmailSender(false); // Set to true for debug mode
$result = $emailSender->testEmail('test@example.com', true);
echo json_encode($result);
*/
