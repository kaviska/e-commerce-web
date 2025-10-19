// Test Mail JavaScript Functionality
// Handles email testing form submission and API communication

document.addEventListener('DOMContentLoaded', function() {
    const emailTestForm = document.getElementById('emailTestForm');
    const statusMessage = document.getElementById('statusMessage');
    const messageContent = document.getElementById('messageContent');
    const loadingSpinner = document.querySelector('.loading');
    const submitButton = emailTestForm.querySelector('button[type="submit"]');
    
    // Initialize form validation
    initializeFormValidation();
    
    // Handle form submission
    emailTestForm.addEventListener('submit', function(e) {
        e.preventDefault();
        sendTestEmail();
    });

    /**
     * Initialize form validation and input handlers
     */
    function initializeFormValidation() {
        const emailInput = document.getElementById('testEmail');
        const subjectInput = document.getElementById('testSubject');
        const messageInput = document.getElementById('testMessage');

        // Real-time email validation
        emailInput.addEventListener('blur', function() {
            validateEmailField(this);
        });

        // Character count for message
        messageInput.addEventListener('input', function() {
            updateCharacterCount(this);
        });

        // Auto-suggest subjects
        subjectInput.addEventListener('focus', function() {
            if (!this.value) {
                this.value = 'Test Email from E-commerce System - ' + new Date().toLocaleDateString();
            }
        });
    }

    /**
     * Validate email field in real-time
     */
    function validateEmailField(emailField) {
        const email = emailField.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        // Remove existing validation classes
        emailField.classList.remove('is-valid', 'is-invalid');
        
        if (email && emailRegex.test(email)) {
            emailField.classList.add('is-valid');
            return true;
        } else if (email) {
            emailField.classList.add('is-invalid');
            return false;
        }
        return false;
    }

    /**
     * Update character count for message textarea
     */
    function updateCharacterCount(messageField) {
        const maxLength = 1000;
        const currentLength = messageField.value.length;
        
        let countElement = messageField.parentNode.querySelector('.char-count');
        if (!countElement) {
            countElement = document.createElement('div');
            countElement.className = 'char-count form-text text-end';
            messageField.parentNode.appendChild(countElement);
        }
        
        countElement.textContent = `${currentLength}/${maxLength} characters`;
        countElement.style.color = currentLength > maxLength * 0.9 ? '#dc3545' : '#6c757d';
    }

    /**
     * Send test email via API
     */
    async function sendTestEmail() {
        const formData = new FormData(emailTestForm);
        
        // Validate form before sending
        if (!validateForm(formData)) {
            return;
        }

        // Show loading state
        setLoadingState(true);
        hideStatusMessage();

        try {
            // Construct API URL using the server_url from main.js
            const apiUrl = server_url + "api/user/sampleMail";
            console.log('Sending test email to:', apiUrl);

            // Make the API request
            const response = await fetch(apiUrl, {
                method: 'POST',
                body: formData
            });

            // Parse response
            const data = await response.json();
            console.log('API Response:', data);

            // Handle response
            if (data.status === 'success') {
                showSuccessMessage(data.message || 'Test email sent successfully!');
                resetForm();
                
                // Show success toast
                showToast('Email Sent!', 'Your test email has been sent successfully.', 'success');
            } else {
                showErrorMessage(data.error || 'Failed to send test email. Please try again.');
                showToast('Email Failed', data.error || 'Failed to send test email.', 'error');
            }

        } catch (error) {
            console.error('Error sending test email:', error);
            showErrorMessage('Network error occurred. Please check your connection and try again.');
            showToast('Network Error', 'Please check your connection and try again.', 'error');
        } finally {
            setLoadingState(false);
        }
    }

    /**
     * Validate form data before submission
     */
    function validateForm(formData) {
        const email = formData.get('email');
        const subject = formData.get('subject');
        const message = formData.get('message');

        // Clear previous validation states
        clearValidationStates();

        let isValid = true;

        // Validate email
        if (!email || !isValidEmail(email)) {
            markFieldInvalid('testEmail', 'Please enter a valid email address');
            isValid = false;
        }

        // Validate subject
        if (!subject || subject.trim().length < 3) {
            markFieldInvalid('testSubject', 'Subject must be at least 3 characters long');
            isValid = false;
        }

        // Validate message
        if (!message || message.trim().length < 10) {
            markFieldInvalid('testMessage', 'Message must be at least 10 characters long');
            isValid = false;
        }

        if (!isValid) {
            showErrorMessage('Please fix the validation errors above');
        }

        return isValid;
    }

    /**
     * Mark field as invalid with error message
     */
    function markFieldInvalid(fieldId, message) {
        const field = document.getElementById(fieldId);
        field.classList.add('is-invalid');
        
        // Add or update invalid feedback
        let feedback = field.parentNode.querySelector('.invalid-feedback');
        if (!feedback) {
            feedback = document.createElement('div');
            feedback.className = 'invalid-feedback';
            field.parentNode.appendChild(feedback);
        }
        feedback.textContent = message;
    }

    /**
     * Clear all validation states
     */
    function clearValidationStates() {
        const inputs = emailTestForm.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.classList.remove('is-valid', 'is-invalid');
        });

        // Remove invalid feedback messages
        const feedbacks = emailTestForm.querySelectorAll('.invalid-feedback');
        feedbacks.forEach(feedback => feedback.remove());
    }

    /**
     * Set loading state for the form
     */
    function setLoadingState(isLoading) {
        if (isLoading) {
            loadingSpinner.classList.add('show');
            submitButton.disabled = true;
            submitButton.querySelector('i').classList.add('d-none');
        } else {
            loadingSpinner.classList.remove('show');
            submitButton.disabled = false;
            submitButton.querySelector('i').classList.remove('d-none');
        }
    }

    /**
     * Show success message
     */
    function showSuccessMessage(message) {
        messageContent.innerHTML = `<i class="bi bi-check-circle me-2"></i>${message}`;
        statusMessage.className = 'status-message success';
        statusMessage.style.display = 'block';
    }

    /**
     * Show error message
     */
    function showErrorMessage(message) {
        messageContent.innerHTML = `<i class="bi bi-exclamation-triangle me-2"></i>${message}`;
        statusMessage.className = 'status-message error';
        statusMessage.style.display = 'block';
    }

    /**
     * Hide status message
     */
    function hideStatusMessage() {
        statusMessage.style.display = 'none';
    }

    /**
     * Reset form to initial state
     */
    function resetForm() {
        // Reset form fields except email (for convenience)
        document.getElementById('testSubject').value = 'Test Email from E-commerce System';
        document.getElementById('testMessage').value = `Hello! This is a test email sent from our e-commerce application.

If you received this email, it means our email system is working correctly.

Features tested:
- Email delivery
- HTML formatting
- System connectivity

Thank you for helping us test our system!`;
        
        clearValidationStates();
    }

    /**
     * Show Bootstrap toast notification
     */
    function showToast(title, message, type = 'info') {
        // Use the existing toastSetup function from main.js if available
        if (typeof toastSetup === 'function') {
            toastSetup(`${title}: ${message}`);
            return;
        }

        // Fallback: create custom toast
        const toastContainer = document.querySelector('.toast-container');
        if (!toastContainer) return;

        const toastId = 'toast-' + Date.now();
        const iconClass = type === 'success' ? 'bi-check-circle' : 
                         type === 'error' ? 'bi-exclamation-triangle' : 'bi-info-circle';
        const bgClass = type === 'success' ? 'bg-success' : 
                       type === 'error' ? 'bg-danger' : 'bg-primary';

        const toastHtml = `
            <div class="toast ${bgClass} text-white" id="${toastId}" role="alert">
                <div class="toast-header ${bgClass} text-white">
                    <i class="bi ${iconClass} me-2"></i>
                    <strong class="me-auto">${title}</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">${message}</div>
            </div>
        `;

        toastContainer.insertAdjacentHTML('beforeend', toastHtml);
        const toastElement = document.getElementById(toastId);
        const toast = new bootstrap.Toast(toastElement, { delay: 5000 });
        toast.show();

        // Remove toast element after it's hidden
        toastElement.addEventListener('hidden.bs.toast', () => {
            toastElement.remove();
        });
    }

    /**
     * Enhanced email validation (reuse from main.js if available)
     */
    function isValidEmail(email) {
        // Use the existing function from main.js if available
        if (typeof window.isValidEmail === 'function') {
            return window.isValidEmail(email);
        }
        
        // Fallback validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Expose functions for external use if needed
    window.testMailHandler = {
        sendTestEmail,
        validateForm,
        resetForm,
        showToast
    };
});

// Additional utility functions for email testing

/**
 * Generate sample email templates
 */
function getEmailTemplate(templateType = 'default') {
    const templates = {
        default: `Hello! This is a test email sent from our e-commerce application.

If you received this email, it means our email system is working correctly.

Features tested:
- Email delivery
- HTML formatting
- System connectivity

Thank you for helping us test our system!`,
        
        welcome: `Welcome to our E-commerce Platform!

Thank you for joining us. This test email confirms that:
✓ Your account is set up correctly
✓ Email notifications are working
✓ You're ready to start shopping

Best regards,
The E-commerce Team`,

        order: `Order Confirmation Test

This is a test email for order confirmation functionality.

Order Details:
- Order ID: TEST-${Date.now()}
- Date: ${new Date().toLocaleDateString()}
- Status: Test Mode

This email tests our order notification system.`,

        password: `Password Reset Test

This is a test email for password reset functionality.

If this were a real password reset request, you would find a secure link here to reset your password.

Test completed successfully!`
    };

    return templates[templateType] || templates.default;
}

/**
 * Quick fill form with template
 */
function quickFillTemplate(templateType) {
    const messageField = document.getElementById('testMessage');
    const subjectField = document.getElementById('testSubject');
    
    if (messageField) {
        messageField.value = getEmailTemplate(templateType);
        
        // Update subject based on template
        const subjects = {
            welcome: 'Welcome Email Test - E-commerce Platform',
            order: 'Order Confirmation Test - E-commerce System',
            password: 'Password Reset Test - E-commerce Security',
            default: 'Test Email from E-commerce System'
        };
        
        if (subjectField) {
            subjectField.value = subjects[templateType] || subjects.default;
        }
        
        // Trigger character count update if function exists
        if (typeof updateCharacterCount === 'function') {
            updateCharacterCount(messageField);
        }
    }
}
