function validateForm() {
    const username = document.getElementById("username").value.trim();
    for (let i = 0; i < username.length; i++) {
        const char = username[i];
        const charCode = char.charCodeAt(0);
        if (!(char === '_' || (char >= 0 && char <= 9) || (charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122))) {
            alert("Username must contain only letters,numbers and UnderScore.");
            return false;
        }
    }

    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    const email = document.getElementById("email").value.trim();
    const at = email.indexOf("@");
    const dot = email.lastIndexOf(".");
    if (at < 1 || dot < at + 2 || dot + 2 >= email.length) {
        alert("Invalid email format.");
        return false;
    }

    return true;
}

