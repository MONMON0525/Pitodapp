<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users_tbl (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <div class="left-section">
                <h2>SIGN UP</h2>
                <form id="signupForm">
                    <div class="input-box">
                        <input type="text" id="username" placeholder="Username" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <input type="email" id="email" placeholder="Email Address" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <input type="password" id="password" placeholder="Password" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <input type="password" id="confirmPassword" placeholder="Re-type Password" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <select id="role" required>
                            <option value="" disabled selected hidden>Choose Role</option>
                            <option value="Driver">Driver</option>
                            <option value="Operator">Operator</option>
                            <option value="Staff">Staff</option>
                        </select>
                        <span class="error-message"></span>
                    </div>
                    
                    <button type="submit"><a href="login.php"></a>SIGN UP</button>
                </form>
                <p>Already have an account? <a href="login.php">LOG IN</a></p>
            </div>
            <div class="right-section">
                <img src="images/Pitodapp logo.svg" alt="PiTODAPP Logo">
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>
