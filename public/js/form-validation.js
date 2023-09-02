function validateForm() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const passwordError = document.getElementById("error");

    if (password.length < 8) {
        passwordError.textContent = "Password must be at least 8 characters long.";
        return false;
    } else if (password !== confirmPassword) {
        passwordError.textContent = "Passwords do not match.";
        return false;
    }

    return true;
}