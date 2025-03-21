<?php

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users_tbl WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header("Location:dashboard.php");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiTODAPP Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <!-- Left Logo Section -->
            <div class="left-section">
                <img src="images/Pitodapp logo.svg" alt="PiTODAPP Logo">
            </div>

            <!-- Right Login Section -->
            <div class="right-section">
                <h2>LOG IN</h2>

                <!-- Display errors if any -->
                <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

                <form action="login.php" method="POST">
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email Account" required>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit"></a>LOG IN</button>
                </form>
                
                <p>Don't have an account? <a href="signup.php">SIGN UP</a></p>
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>
