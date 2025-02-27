$(document).ready(function () {
    const emailInput = $("#email");
    const passwordInput = $("#password");
    const emailError = $("#email-error");
    const passwordError = $("#password-error");
    const apiError = $("#api-error");
    const apiErrorMessage = $("#api-error-message");
    const loginBtn = $("#login-btn");

    // Validate email format
    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // Validate password (min 6 chars)
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

    $("#login-form").on("submit", function (event) {
        event.preventDefault();

        let email = emailInput.val().trim();
        let password = passwordInput.val().trim();

        let isValid = true;

        // Reset errors
        hideError(emailInput, emailError);
        hideError(passwordInput, passwordError);
        apiError.hide();

        // Validate inputs
        if (!isValidEmail(email)) {
            showError(emailInput, emailError, "Please enter a valid email.");
            isValid = false;
        }
        if (!isValidPassword(password)) {
            showError(passwordInput, passwordError, "Password must be at least 6 characters.");
            isValid = false;
        }
        if (!isValid) return;

        // Call API if valid
        loginBtn.prop("disabled", true).html('<i class="fas fa-spinner fa-spin"></i> Signing in...');

        $.ajax({
            url: 'http://'+location.hostname + '/phpshort/api/login.php',
            type: "POST",
            data: JSON.stringify({ email, password }),
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
                loginBtn.prop("disabled", false).html("Sign in");
            }
        });
    });
});
