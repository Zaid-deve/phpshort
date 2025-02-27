$(document).ready(function () {
    const nameInput = $("#name");
    const emailInput = $("#email");
    const passwordInput = $("#password");
    const confirmPasswordInput = $("#confirm-password");
    const signupBtn = $("#signup-btn");

    const nameError = $("#name-error");
    const emailError = $("#email-error");
    const passwordError = $("#password-error");
    const confirmPasswordError = $("#confirm-password-error");
    const apiError = $("#api-error");
    const apiErrorMessage = $("#api-error-message");

    // Validate email format
    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // Validate password (at least 6 characters)
    function isValidPassword(password) {
        return password.length >= 6;
    }

    // Show error messages
    function showError(inputField, errorField, message) {
        errorField.text(message).show();
        inputField.addClass("border-red-500");
    }

    // Hide error messages
    function hideError(inputField, errorField) {
        errorField.hide();
        inputField.removeClass("border-red-500");
    }

    $("#signup-form").on("submit", function (event) {
        event.preventDefault();

        let name = nameInput.val().trim();
        let email = emailInput.val().trim();
        let password = passwordInput.val().trim();
        let confirmPassword = confirmPasswordInput.val().trim();

        let isValid = true;

        // Reset errors
        hideError(nameInput, nameError);
        hideError(emailInput, emailError);
        hideError(passwordInput, passwordError);
        hideError(confirmPasswordInput, confirmPasswordError);
        apiError.hide();

        // Validate inputs
        if (name.length < 3) {
            showError(nameInput, nameError, "Name must be at least 3 characters.");
            isValid = false;
        }
        if (!isValidEmail(email)) {
            showError(emailInput, emailError, "Enter a valid email address.");
            isValid = false;
        }
        if (!isValidPassword(password)) {
            showError(passwordInput, passwordError, "Password must be at least 6 characters.");
            isValid = false;
        }
        if (password !== confirmPassword) {
            showError(confirmPasswordInput, confirmPasswordError, "Passwords do not match.");
            isValid = false;
        }
        if (!isValid) return;

        // Call API if valid
        signupBtn.prop("disabled", true).html('<i class="fas fa-spinner fa-spin"></i> Signing up...');

        $.ajax({
            url: 'http://'+location.hostname + '/phpshort/api/signup.php',
            type: "POST",
            data: JSON.stringify({ name, email, password }),
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    window.location.href = "dashboard.php";
                } else {
                    apiErrorMessage.text(response.message);
                    apiError.show();
                }
            },
            error: function () {
                apiErrorMessage.text("An error occurred. Please try again.");
                apiError.show();
            },
            complete: function () {
                signupBtn.prop("disabled", false).html("Sign Up");
            }
        });
    });
});
