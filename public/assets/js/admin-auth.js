/* =============================================================================
   Admin Login JavaScript
   OTOBIZ Platform - Authentication Interactions
   ============================================================================= */

document.addEventListener('DOMContentLoaded', function() {
    initializePasswordToggle();
    initializeFormInteractions();
});

/**
 * Initialize password visibility toggle
 */
function initializePasswordToggle() {
    const toggleButtons = document.querySelectorAll('.toggle-password');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('data-target');
            const inputField = document.getElementById(targetId);
            const icon = this.querySelector('.icon-eye');
            
            if (!inputField) return;
            
            const isPassword = inputField.type === 'password';
            inputField.type = isPassword ? 'text' : 'password';
            
            // Update icon feedback
            icon.textContent = isPassword ? '👁‍🗨' : '👁';
            
            // Update button state
            this.classList.toggle('active');
            inputField.focus();
        });
    });
}

/**
 * Initialize form interactions and validations
 */
function initializeFormInteractions() {
    const form = document.querySelector('.login-form');
    const submitButton = document.querySelector('.btn-login');
    
    if (!form) return;
    
    // Handle form submission
    form.addEventListener('submit', function(e) {
        if (submitButton) {
            submitButton.disabled = true;
            submitButton.style.opacity = '0.6';
            
            const btnText = submitButton.querySelector('.btn-text');
            if (btnText) {
                btnText.textContent = 'Memproses...';
            }
        }
    });
    
    // Form field interactions
    const inputs = form.querySelectorAll('.form-input');
    inputs.forEach(input => {
        // Clear error on input
        input.addEventListener('input', function() {
            if (this.classList.contains('is-error')) {
                const errorMsg = this.parentElement.nextElementSibling;
                if (errorMsg && errorMsg.classList.contains('error-message')) {
                    errorMsg.style.display = 'none';
                }
            }
        });
        
        // Add focus effect
        input.addEventListener('focus', function() {
            this.style.borderColor = 'var(--color-primary)';
        });
        
        input.addEventListener('blur', function() {
            if (!this.classList.contains('is-error')) {
                this.style.borderColor = '';
            }
        });
    });
}

/**
 * Responsive sidebar toggle for mobile
 */
function togglePasswordVisibility(event) {
    event.preventDefault();
    const btn = event.currentTarget;
    const targetId = btn.getAttribute('data-target');
    const input = document.getElementById(targetId);
    
    if (input.type === 'password') {
        input.type = 'text';
        btn.querySelector('.icon-eye').textContent = '👁‍🗨';
    } else {
        input.type = 'password';
        btn.querySelector('.icon-eye').textContent = '👁';
    }
}

// Export functions if module system is used
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initializePasswordToggle,
        initializeFormInteractions,
        togglePasswordVisibility
    };
}
