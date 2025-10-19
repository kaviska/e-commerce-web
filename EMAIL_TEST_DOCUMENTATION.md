# Email Testing System Documentation

## Overview
This email testing system allows you to test email functionality in your e-commerce application. It consists of frontend and backend components that work together to send test emails.

## Files Created/Modified

### Backend
- **`/backend/api/user.php`** - Added `sampleMail()` method for handling email test requests

### Frontend
- **`/public/view/interface/testMail.php`** - Email testing interface with form
- **`/public/js/testMail.js`** - JavaScript for form handling and API communication

## API Endpoint

**URL:** `{server_url}api/user/sampleMail`
**Method:** POST
**Parameters:**
- `email` (required) - Recipient email address
- `subject` (required) - Email subject line
- `message` (required) - Email message content

**Response:**
```json
{
    "status": "success|failed",
    "message": "Success message",
    "error": "Error message (on failure)"
}
```

## Usage Instructions

### 1. Access the Test Page
Navigate to: `{your-domain}/view/interface/testMail.php`

### 2. Fill the Form
- **Recipient Email:** Enter a valid email address to receive the test
- **Subject:** Email subject line (auto-filled with default)
- **Message:** Test message content (pre-filled with sample text)

### 3. Send Test Email
Click "Send Test Email" button. The system will:
1. Validate the form fields
2. Send request to backend API
3. Display success/error message
4. Show toast notification

## Features

### Frontend Features
- **Real-time Validation:** Email format validation as you type
- **Character Counter:** Shows character count for message field
- **Loading States:** Visual feedback during email sending
- **Success/Error Messages:** Clear feedback on operation results
- **Responsive Design:** Works on desktop and mobile devices
- **Template Support:** Pre-filled content for quick testing

### Backend Features
- **Input Validation:** Server-side validation for all fields
- **Email Formatting:** Professional HTML email formatting
- **Error Handling:** Comprehensive error reporting
- **Security:** Uses existing validation and security measures

## Email Configuration

The system uses the existing `EmailSender` class. Make sure your email configuration is properly set up in your application for the test emails to be sent successfully.

## API URL Configuration

The system uses the `server_url` variable from `main.js`:

```javascript
// Current configuration in main.js
const server_url = "https://ecommerce.gigantoo.com/";
// or for local development:
// const server_url = "http://localhost:9001/";
```

## Testing Scenarios

### Basic Email Test
1. Enter your email address
2. Use default subject and message
3. Send test email
4. Check your inbox

### Custom Content Test
1. Enter recipient email
2. Modify subject line
3. Write custom message
4. Send and verify formatting

### Validation Test
1. Try invalid email format
2. Leave required fields empty
3. Verify error messages appear

## Troubleshooting

### Common Issues

**Email Not Received:**
- Check spam/junk folder
- Verify email configuration in EmailSender class
- Check server email settings

**API Errors:**
- Ensure server is running
- Check network connection
- Verify API URL in main.js

**Form Validation Issues:**
- Enable JavaScript in browser
- Check browser console for errors
- Verify required fields are filled

### Debug Mode
Enable console logging by opening browser developer tools to see detailed API communication and error messages.

## File Structure
```
backend/
├── api/
│   └── user.php (modified - added sampleMail method)
public/
├── view/interface/
│   └── testMail.php (new)
├── js/
│   ├── main.js (existing - contains server_url)
│   └── testMail.js (new)
└── css/
    └── (uses existing Bootstrap and custom styles)
```

## Security Notes
- All inputs are validated server-side
- Email addresses are validated for proper format
- Uses existing security measures from the application
- HTML content is properly escaped to prevent XSS

## Future Enhancements
- Email template selection
- Bulk email testing
- Email delivery tracking
- Advanced formatting options
- Attachment support