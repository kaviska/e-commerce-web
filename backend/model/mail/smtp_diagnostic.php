<?php
/**
 * SMTP Server Diagnostic Tool
 * This script will help identify why SMTP is failing on your server
 */

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>SMTP Server Diagnostic Report</h1>\n";
echo "<style>body{font-family:Arial,sans-serif;} .success{color:green;} .error{color:red;} .warning{color:orange;} pre{background:#f5f5f5;padding:10px;border:1px solid #ccc;}</style>\n";

// 1. Check PHP extensions
echo "<h2>1. PHP Extensions Check</h2>\n";
$required_extensions = ['openssl', 'sockets', 'curl'];
foreach ($required_extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "<p class='success'>✓ $ext extension is loaded</p>\n";
    } else {
        echo "<p class='error'>✗ $ext extension is NOT loaded</p>\n";
    }
}

// 2. Test SMTP server connectivity
echo "<h2>2. SMTP Server Connectivity Test</h2>\n";
$smtp_servers = [
    ['host' => 'smtp.titan.email', 'port' => 25],
    ['host' => 'smtp.titan.email', 'port' => 465],
    ['host' => 'smtp.titan.email', 'port' => 587],
    ['host' => 'smtp.gmail.com', 'port' => 587], // Alternative test
];

foreach ($smtp_servers as $server) {
    $host = $server['host'];
    $port = $server['port'];
    
    echo "<h3>Testing $host:$port</h3>\n";
    
    $start_time = microtime(true);
    $connection = @fsockopen($host, $port, $errno, $errstr, 10);
    $end_time = microtime(true);
    $response_time = round(($end_time - $start_time) * 1000, 2);
    
    if ($connection) {
        echo "<p class='success'>✓ Connection successful to $host:$port (Response time: {$response_time}ms)</p>\n";
        
        // Try to read the server banner
        $banner = @fgets($connection, 512);
        if ($banner) {
            echo "<p>Server banner: <code>" . htmlspecialchars(trim($banner)) . "</code></p>\n";
        }
        
        fclose($connection);
    } else {
        echo "<p class='error'>✗ Connection failed to $host:$port</p>\n";
        echo "<p>Error: $errno - $errstr</p>\n";
    }
}

// 3. Test DNS resolution
echo "<h2>3. DNS Resolution Test</h2>\n";
$dns_record = dns_get_record('smtp.titan.email', DNS_A);
if ($dns_record) {
    echo "<p class='success'>✓ DNS resolution successful for smtp.titan.email</p>\n";
    echo "<pre>" . print_r($dns_record, true) . "</pre>\n";
} else {
    echo "<p class='error'>✗ DNS resolution failed for smtp.titan.email</p>\n";
}

// 4. Check server environment
echo "<h2>4. Server Environment</h2>\n";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>\n";
echo "<p><strong>Server Software:</strong> " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "</p>\n";
echo "<p><strong>Operating System:</strong> " . php_uname() . "</p>\n";

// 5. Check allow_url_fopen and other settings
echo "<h2>5. PHP Configuration</h2>\n";
$php_settings = [
    'allow_url_fopen' => ini_get('allow_url_fopen'),
    'max_execution_time' => ini_get('max_execution_time'),
    'memory_limit' => ini_get('memory_limit'),
    'SMTP' => ini_get('SMTP'),
    'smtp_port' => ini_get('smtp_port'),
    'sendmail_from' => ini_get('sendmail_from'),
];

foreach ($php_settings as $setting => $value) {
    echo "<p><strong>$setting:</strong> " . ($value ?: 'Not set') . "</p>\n";
}

// 6. Test basic email function
echo "<h2>6. PHP mail() Function Test</h2>\n";
if (function_exists('mail')) {
    echo "<p class='success'>✓ mail() function is available</p>\n";
    
    // Test basic mail (don't actually send)
    $test_result = @mail('test@example.com', 'Test Subject', 'Test Body', '', '-f noreply@yourdomain.com');
    if ($test_result) {
        echo "<p class='warning'>⚠ mail() function executed (but may not actually send)</p>\n";
    } else {
        echo "<p class='error'>✗ mail() function failed to execute</p>\n";
    }
} else {
    echo "<p class='error'>✗ mail() function is not available</p>\n";
}

// 7. Suggest solutions
echo "<h2>7. Troubleshooting Suggestions</h2>\n";
echo "<div style='background:#f0f8ff;padding:15px;border:1px solid #0066cc;'>\n";
echo "<h3>Based on the tests above, try these solutions:</h3>\n";
echo "<ol>\n";
echo "<li><strong>If all ports are blocked:</strong> Contact your hosting provider to enable outbound SMTP connections</li>\n";
echo "<li><strong>If SSL/TLS fails:</strong> Your server might not have proper SSL certificates. Try using a different email service like Gmail or SendGrid</li>\n";
echo "<li><strong>If only port 25 works:</strong> Many hosting providers block ports 465 and 587 for security</li>\n";
echo "<li><strong>Alternative solution:</strong> Use a transactional email service like:\n";
echo "   <ul>\n";
echo "   <li>SendGrid (recommended)</li>\n";
echo "   <li>Mailgun</li>\n";
echo "   <li>Amazon SES</li>\n";
echo "   <li>Gmail SMTP (if allowed)</li>\n";
echo "   </ul>\n";
echo "</li>\n";
echo "</ol>\n";
echo "</div>\n";

// 8. Sample working configurations
echo "<h2>8. Alternative SMTP Configurations to Try</h2>\n";
echo "<pre>\n";
echo "// Gmail SMTP (if available)\n";
echo "\$mail->Host = 'smtp.gmail.com';\n";
echo "\$mail->Port = 587;\n";
echo "\$mail->SMTPAuth = true;\n";
echo "\$mail->SMTPSecure = 'tls';\n";
echo "\n";
echo "// SendGrid SMTP\n";
echo "\$mail->Host = 'smtp.sendgrid.net';\n";
echo "\$mail->Port = 587;\n";
echo "\$mail->SMTPAuth = true;\n";
echo "\$mail->SMTPSecure = 'tls';\n";
echo "\n";
echo "// Mailgun SMTP\n";
echo "\$mail->Host = 'smtp.mailgun.org';\n";
echo "\$mail->Port = 587;\n";
echo "\$mail->SMTPAuth = true;\n";
echo "\$mail->SMTPSecure = 'tls';\n";
echo "</pre>\n";

echo "<p><strong>Note:</strong> Check your server's error logs for more detailed information about SMTP failures.</p>\n";
?>