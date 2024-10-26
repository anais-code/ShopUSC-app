
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm-password');
            const phoneNumber = document.getElementById('phone-number');
            const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=]).{8,20}$/;
            const phonePattern = /^1868\d{7}$/;

            // Custom password strength validation
            if (!passwordPattern.test(password.value)) {
                password.setCustomValidity("Password must be 8-20 characters, with at least one uppercase letter, one digit, and one special character.");
            } else {
                password.setCustomValidity("");
            }

            // Custom confirm password validation
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Passwords must match.");
            } else {
                confirmPassword.setCustomValidity("");
            }

            // Phone number validation
            if (!phonePattern.test(phoneNumber.value)) {
                phoneNumber.setCustomValidity("Phone number must be in the format 1868xxxxxxx");
            } else {
                phoneNumber.setCustomValidity("");
            }

            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
})();

function updateCharCount() {
    const textarea = document.getElementById("business-description");
    const charCount = document.getElementById("char-count");
    const charsRemaining = 500 - textarea.value.length;
    charCount.textContent = charsRemaining + " characters remaining";
}


