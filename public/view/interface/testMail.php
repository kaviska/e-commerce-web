<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Test - E-commerce System</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../../css/main.css" rel="stylesheet">
    <style>
        .email-test-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        .test-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }
        .card-body {
            padding: 40px;
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #eee;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-send {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            color: white;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .status-message {
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            display: none;
        }
        .success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        .loading {
            display: none;
        }
        .loading.show {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="email-test-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="test-card">
                        <div class="card-header">
                            <h1 class="mb-0">
                                <i class="bi bi-envelope-check"></i>
                                Email Test System
                            </h1>
                            <p class="mb-0 mt-2 opacity-75">Test your email configuration</p>
                        </div>
                        <div class="card-body">
                            <form id="emailTestForm">
                                <div class="mb-4">
                                    <label for="testEmail" class="form-label fw-bold">
                                        <i class="bi bi-at"></i> Recipient Email
                                    </label>
                                    <input type="email" class="form-control" id="testEmail" name="email" 
                                           placeholder="Enter recipient email address" required>
                                    <div class="form-text">We'll send a test email to this address</div>
                                </div>

                                <div class="mb-4">
                                    <label for="testSubject" class="form-label fw-bold">
                                        <i class="bi bi-card-text"></i> Subject
                                    </label>
                                    <input type="text" class="form-control" id="testSubject" name="subject" 
                                           placeholder="Enter email subject" value="Test Email from E-commerce System" required>
                                </div>

                                <div class="mb-4">
                                    <label for="testMessage" class="form-label fw-bold">
                                        <i class="bi bi-chat-square-text"></i> Message
                                    </label>
                                    <textarea class="form-control" id="testMessage" name="message" rows="5" 
                                              placeholder="Enter your test message here..." required>Hello! This is a test email sent from our e-commerce application.

If you received this email, it means our email system is working correctly.

Features tested:
- Email delivery
- HTML formatting
- System connectivity

Thank you for helping us test our system!</textarea>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-send btn-lg">
                                        <span class="loading spinner-border spinner-border-sm me-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </span>
                                        <i class="bi bi-send"></i>
                                        Send Test Email
                                    </button>
                                </div>

                                <div id="statusMessage" class="status-message">
                                    <div id="messageContent"></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="../../" class="text-white text-decoration-none">
                            <i class="bi bi-arrow-left"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Container for notifications -->
    <div class="toast-container position-fixed top-0 end-0 p-3"></div>

    <script src="../../js/bootstrap.bundle.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/testMail.js"></script>
</body>
</html>
