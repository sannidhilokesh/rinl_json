document.addEventListener("DOMContentLoaded", function () {
    // SHOW PASSWORD (for register form)
    const showPasswordCheckbox = document.getElementById("showPasswordToggle");
    const passwordInput = document.getElementById("registerPassword");

    if (showPasswordCheckbox && passwordInput) {
        showPasswordCheckbox.addEventListener("change", function () {
            passwordInput.type = this.checked ? "text" : "password";
        });
    }
});
