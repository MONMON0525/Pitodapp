document.addEventListener("DOMContentLoaded", () => {
    // LOGIN VALIDATION
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const email = document.getElementById("loginEmail").value.trim();
            const password = document.getElementById("loginPassword").value.trim();

            if (email === "" || password === "") {
                showError("loginEmail", "Email and Password are required!");
            } else if (!isValidEmail(email)) {
                showError("loginEmail", "Invalid email format!");
            } else {
                alert("Login successful!");
                loginForm.submit();
            }
        });
    }

    // SIGNUP VALIDATION
    const signupForm = document.getElementById("signupForm");
    if (signupForm) {
        signupForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const username = document.getElementById("username").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();
            const confirmPassword = document.getElementById("confirmPassword").value.trim();
            const role = document.getElementById("role").value;

            let isValid = true;

            if (username === "") {
                showError("username", "Username is required!");
                isValid = false;
            }

            if (email === "" || !isValidEmail(email)) {
                showError("email", "Valid email is required!");
                isValid = false;
            }

            if (password.length < 6) {
                showError("password", "Password must be at least 6 characters!");
                isValid = false;
            }

            if (confirmPassword !== password) {
                showError("confirmPassword", "Passwords do not match!");
                isValid = false;
            }

            if (role === "") {
                showError("role", "Please select a role!");
                isValid = false;
            }

            if (isValid) {
                alert("Signup successful!");
                signupForm.submit();
                
            }
        });
    }
});

// HELPER FUNCTION: Show Error Messages
function showError(inputId, message) {
    const inputBox = document.getElementById(inputId).parentElement;
    const errorSpan = inputBox.querySelector(".error-message");
    errorSpan.textContent = message;
    errorSpan.style.color = "red";
}

// HELPER FUNCTION: Email Validation
function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
