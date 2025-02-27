// Script for validating URL and calling API

$(document).ready(function () {
    const urlInput = $("input[name='url']");
    const errorMessage = $("#error-message");
    const successMessage = $("#success-message");
    const errDiv = $(".err-div");
    const successDiv = $(".success-div");
    const shortenBtn = $("#shorten-btn");

    function isValidURL(url) {
        const pattern = /^(http(s)?:\/\/.)[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)$/g;
        return !!pattern.test(url);
    }

    function validateURL() {
        const urlValue = urlInput.val().trim();
        if (!isValidURL(urlValue)) {
            errDiv.css('display', 'flex');
            errorMessage.text("Please enter a valid URL.");
            successDiv.hide(); // Hide success message if invalid URL
            return false;
        }
        errDiv.hide();
        errorMessage.text("");
        return true;
    }

    urlInput.on("input", validateURL);

    $("form").on("submit", function (event) {
        event.preventDefault(); // Prevent form submission

        if (!validateURL()) return;

        const urlValue = urlInput.val().trim();

        shortenBtn.prop("disabled", true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');

        $.ajax({
            url: 'http://'+location.hostname + '/phpshort/api/short.php',
            type: "POST",
            data: JSON.stringify({ url: urlValue }),
            success: function (response) {
                if (response.success) {
                    successDiv.css('display', 'flex');
                    successMessage.html(`URL shortened successfully: <a href="${response.surl}" target="_blank" class="text-blue-500 font-bold">${response.surl}</a>`);
                    urlInput.val(response.surl);
                    errDiv.hide();
                } else {
                    errDiv.css('display', 'flex');
                    errorMessage.text(response.message);
                    successDiv.hide();
                }
            },
            error: function () {
                errDiv.css('display', 'flex');
                errorMessage.text("Something went wrong. Please try again.");
            },
            complete: function () {
                shortenBtn.prop("disabled", false).html('Short My URL <i class="fa-solid fa-arrow-down-short-wide"></i>');
            }
        });
    });
});
