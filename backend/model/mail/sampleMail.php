<?php
// Include PHPMailer
require_once "SMTP.php";
require_once "PHPMailer.php";
require_once "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailSender
{
    private $mail;
    private $config;

    public function __construct($config = null)
    {
        // Default configuration
        $this->config = $config ?: [
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'username' => 'info.iymart@gmail.com',
            'password' => 'ladiaffuinspyzyu',
            'encryption' => 'tls',
            'from_email' => 'info.iymart@gmail.com',
            'from_name' => 'E-Commerce Web Service'
        ];

        // Create a new PHPMailer instance
        $this->mail = new PHPMailer(true);
        $this->setupSMTP();
    }

    private function setupSMTP()
    {
        // SMTP configuration
        $this->mail->isSMTP();
        $this->mail->Host = $this->config['host'];
        $this->mail->Port = $this->config['port'];
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->config['username'];
        $this->mail->Password = $this->config['password'];
        $this->mail->SMTPSecure = $this->config['encryption'];
        
        // Enable verbose debug output (optional)
        // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
    }

    public function sendEmail($recipient, $subject, $body, $senderName = null, $attachments = [])
    {
        try {
            // Clear any previous recipients
            $this->mail->clearAddresses();
            $this->mail->clearAttachments();

            // Sender and recipient
            $senderName = $senderName ?: $this->config['from_name'];
            $this->mail->setFrom($this->config['from_email'], $senderName);
            $this->mail->addAddress($recipient);

            // Email content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            // Add attachments if any
            foreach ($attachments as $attachment) {
                if (file_exists($attachment)) {
                    $this->mail->addAttachment($attachment);
                }
            }

            // Send the email
            $this->mail->send();
            return [
                'success' => true,
                'message' => 'Email sent successfully to ' . $recipient
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Failed to send email: ' . $this->mail->ErrorInfo,
                'error' => $e->getMessage()
            ];
        }
    }

    public function sendBulkEmail($recipients, $subject, $body, $senderName = null)
    {
        $results = [];
        foreach ($recipients as $recipient) {
            $result = $this->sendEmail($recipient, $subject, $body, $senderName);
            $results[] = [
                'recipient' => $recipient,
                'result' => $result
            ];
        }
        return $results;
    }

    public function testConnection()
    {
        try {
            $this->mail->smtpConnect();
            $this->mail->smtpClose();
            return [
                'success' => true,
                'message' => 'SMTP connection successful'
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'SMTP connection failed: ' . $e->getMessage()
            ];
        }
    }

    public static function createTestEmail($recipientEmail, $recipientName = 'User')
    {
        $subject = 'Test Email - E-Commerce Web Service';
        $body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #007bff; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; background-color: #f8f9fa; }
                .footer { padding: 10px; text-align: center; font-size: 12px; color: #666; }
                .button { background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Test Email</h1>
                </div>
                <div class='content'>
                    <h2>Hello, {$recipientName}!</h2>
                    <p>This is a test email from the E-Commerce Web Service email system.</p>
                    <p>If you received this email, it means our email configuration is working correctly.</p>
                    <p><strong>Test Details:</strong></p>
                    <ul>
                        <li>Sent to: {$recipientEmail}</li>
                        <li>Date: " . date('Y-m-d H:i:s') . "</li>
                        <li>Server: " . $_SERVER['HTTP_HOST'] . "</li>
                    </ul>
                    <p style='text-align: center;'>
                        <a href='#' class='button'>Test Button</a>
                    </p>
                </div>
                <div class='footer'>
                    <p>&copy; 2025 E-Commerce Web Service. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>";
        
        return [
            'subject' => $subject,
            'body' => $body
        ];
    }
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    header('Content-Type: application/json');
    
    $action = $_POST['action'];
    $emailSender = new EmailSender();
    
    switch ($action) {
        case 'test_connection':
            $result = $emailSender->testConnection();
            echo json_encode($result);
            exit;
            
        case 'send_test_email':
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $name = htmlspecialchars($_POST['name'] ?? 'User');
            
            if (!$email) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Invalid email address'
                ]);
                exit;
            }
            
            $testEmail = EmailSender::createTestEmail($email, $name);
            $result = $emailSender->sendEmail($email, $testEmail['subject'], $testEmail['body']);
            echo json_encode($result);
            exit;
            
        case 'send_custom_email':
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $subject = htmlspecialchars($_POST['subject']);
            $message = htmlspecialchars($_POST['message']);
            $senderName = htmlspecialchars($_POST['sender_name'] ?? 'E-Commerce Web Service');
            
            if (!$email || !$subject || !$message) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Email, subject, and message are required'
                ]);
                exit;
            }
            
            $htmlMessage = nl2br($message);
            $result = $emailSender->sendEmail($email, $subject, $htmlMessage, $senderName);
            echo json_encode($result);
            exit;
            
        default:
            echo json_encode([
                'success' => false,
                'message' => 'Unknown action'
            ]);
            exit;
    }
}

// Frontend HTML (only displayed if not an AJAX request)
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['action'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sender Test Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .status-message {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }
        .status-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .status-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }
        .card-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="mb-0"><i class="bi bi-envelope"></i> Email Sender Test Interface</h3>
                    </div>
                    <div class="card-body">
                        <!-- Connection Test -->
                        <div class="mb-4">
                            <h5><i class="bi bi-wifi"></i> Connection Test</h5>
                            <p class="text-muted">Test the SMTP connection before sending emails.</p>
                            <button id="testConnection" class="btn btn-info">
                                <i class="bi bi-arrow-repeat"></i> Test Connection
                            </button>
                            <div id="connectionStatus" class="status-message"></div>
                        </div>

                        <hr>

                        <!-- Quick Test Email -->
                        <div class="mb-4">
                            <h5><i class="bi bi-send"></i> Quick Test Email</h5>
                            <p class="text-muted">Send a pre-formatted test email to verify the email system.</p>
                            <form id="testEmailForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="testEmail" class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" id="testEmail" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="testName" class="form-label">Recipient Name</label>
                                            <input type="text" class="form-control" id="testName" placeholder="John Doe">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-send"></i> Send Test Email
                                </button>
                            </form>
                            <div id="testEmailStatus" class="status-message"></div>
                        </div>

                        <hr>

                        <!-- Custom Email -->
                        <div class="mb-4">
                            <h5><i class="bi bi-pencil-square"></i> Custom Email</h5>
                            <p class="text-muted">Send a custom email with your own content.</p>
                            <form id="customEmailForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="customEmail" class="form-label">Recipient Email *</label>
                                            <input type="email" class="form-control" id="customEmail" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="senderName" class="form-label">Sender Name</label>
                                            <input type="text" class="form-control" id="senderName" placeholder="E-Commerce Web Service">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="customSubject" class="form-label">Subject *</label>
                                    <input type="text" class="form-control" id="customSubject" required>
                                </div>
                                <div class="mb-3">
                                    <label for="customMessage" class="form-label">Message *</label>
                                    <textarea class="form-control" id="customMessage" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send"></i> Send Custom Email
                                </button>
                            </form>
                            <div id="customEmailStatus" class="status-message"></div>
                        </div>
                    </div>
                </div>

                <!-- Email Templates -->
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="bi bi-file-text"></i> Quick Templates</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-outline-primary btn-sm w-100 template-btn" 
                                        data-subject="Welcome to Our Service!" 
                                        data-message="Thank you for joining our e-commerce platform. We're excited to have you on board!">
                                    Welcome Email
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-outline-primary btn-sm w-100 template-btn" 
                                        data-subject="Order Confirmation" 
                                        data-message="Your order has been confirmed and will be processed shortly. Thank you for your purchase!">
                                    Order Confirmation
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-outline-primary btn-sm w-100 template-btn" 
                                        data-subject="Password Reset Request" 
                                        data-message="We received a request to reset your password. Please click the link below to proceed with the password reset.">
                                    Password Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Utility functions
        function showStatus(elementId, message, isSuccess) {
            const statusEl = document.getElementById(elementId);
            statusEl.textContent = message;
            statusEl.className = 'status-message ' + (isSuccess ? 'status-success' : 'status-error');
            statusEl.style.display = 'block';
            
            // Auto-hide after 5 seconds for success messages
            if (isSuccess) {
                setTimeout(() => {
                    statusEl.style.display = 'none';
                }, 5000);
            }
        }

        function setLoading(elementId, isLoading) {
            const element = document.getElementById(elementId);
            if (isLoading) {
                element.classList.add('loading');
            } else {
                element.classList.remove('loading');
            }
        }

        function sendAjaxRequest(data, callback) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        callback(response);
                    } catch (e) {
                        callback({
                            success: false,
                            message: 'Invalid response from server'
                        });
                    }
                }
            };
            
            const formData = new URLSearchParams(data).toString();
            xhr.send(formData);
        }

        // Test Connection
        document.getElementById('testConnection').addEventListener('click', function() {
            setLoading('testConnection', true);
            
            sendAjaxRequest({action: 'test_connection'}, function(response) {
                setLoading('testConnection', false);
                showStatus('connectionStatus', response.message, response.success);
            });
        });

        // Test Email Form
        document.getElementById('testEmailForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('testEmail').value;
            const name = document.getElementById('testName').value || 'User';
            
            setLoading('testEmailForm', true);
            
            sendAjaxRequest({
                action: 'send_test_email',
                email: email,
                name: name
            }, function(response) {
                setLoading('testEmailForm', false);
                showStatus('testEmailStatus', response.message, response.success);
                
                if (response.success) {
                    document.getElementById('testEmailForm').reset();
                }
            });
        });

        // Custom Email Form
        document.getElementById('customEmailForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('customEmail').value;
            const subject = document.getElementById('customSubject').value;
            const message = document.getElementById('customMessage').value;
            const senderName = document.getElementById('senderName').value;
            
            setLoading('customEmailForm', true);
            
            sendAjaxRequest({
                action: 'send_custom_email',
                email: email,
                subject: subject,
                message: message,
                sender_name: senderName
            }, function(response) {
                setLoading('customEmailForm', false);
                showStatus('customEmailStatus', response.message, response.success);
                
                if (response.success) {
                    document.getElementById('customEmailForm').reset();
                }
            });
        });

        // Template buttons
        document.querySelectorAll('.template-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const subject = this.getAttribute('data-subject');
                const message = this.getAttribute('data-message');
                
                document.getElementById('customSubject').value = subject;
                document.getElementById('customMessage').value = message;
                
                // Scroll to custom email form
                document.getElementById('customEmailForm').scrollIntoView({behavior: 'smooth'});
            });
        });
    </script>
</body>
</html>
<?php
}

// Example usage of the EmailSender class:
/*
// Basic usage
$emailSender = new EmailSender();
$result = $emailSender->sendEmail('user@example.com', 'Test Subject', 'Test message');

// With custom configuration
$config = [
    'host' => 'smtp.example.com',
    'port' => 587,
    'username' => 'your-email@example.com',
    'password' => 'your-password',
    'encryption' => 'tls',
    'from_email' => 'your-email@example.com',
    'from_name' => 'Your Company'
];
$emailSender = new EmailSender($config);

// Send test email
$testEmail = EmailSender::createTestEmail('recipient@example.com', 'John Doe');
$result = $emailSender->sendEmail('recipient@example.com', $testEmail['subject'], $testEmail['body']);

// Test connection
$connectionTest = $emailSender->testConnection();
if ($connectionTest['success']) {
    echo "SMTP connection successful!";
} else {
    echo "SMTP connection failed: " . $connectionTest['message'];
}
*/
?>
