<?php
/**
 * Email Testing Script
 * Use this to test email functionality directly
 */

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'test.php';

// Test email configuration
$testEmail = 'your-test-email@example.com'; // Change this to your test email
$subject = 'Test Email from E-commerce System';
$body = '<h1>Test Email</h1><p>This is a test email to verify the email system is working properly.</p>';

echo "<h2>Email Test Results</h2>\n";
echo "<p>Testing email to: $testEmail</p>\n";

try {
    $emailSender = new EmailSender();
    $result = $emailSender->sendEmail($testEmail, $subject, $body);
    
    if ($result === true) {
        echo "<p style='color: green;'><strong>SUCCESS:</strong> Email sent successfully!</p>\n";
    } else {
        echo "<p style='color: red;'><strong>FAILED:</strong> Email sending failed</p>\n";
        if (is_array($result)) {
            echo "<pre>Error Details:\n" . print_r($result, true) . "</pre>\n";
        }
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>EXCEPTION:</strong> " . $e->getMessage() . "</p>\n";
    echo "<pre>Stack trace:\n" . $e->getTraceAsString() . "</pre>\n";
}

// Show PHP mail configuration
echo "<h3>PHP Mail Configuration:</h3>\n";
echo "<pre>\n";
echo "SMTP: " . ini_get('SMTP') . "\n";
echo "smtp_port: " . ini_get('smtp_port') . "\n";
echo "sendmail_from: " . ini_get('sendmail_from') . "\n";
echo "sendmail_path: " . ini_get('sendmail_path') . "\n";
echo "</pre>\n";

// Show loaded extensions
echo "<h3>Loaded PHP Extensions (Mail Related):</h3>\n";
echo "<pre>\n";
$extensions = get_loaded_extensions();
foreach ($extensions as $ext) {
    if (strpos(strtolower($ext), 'mail') !== false || 
        strpos(strtolower($ext), 'smtp') !== false || 
        strpos(strtolower($ext), 'socket') !== false ||
        strpos(strtolower($ext), 'openssl') !== false) {
        echo "$ext\n";
    }
}
echo "</pre>\n";
?>