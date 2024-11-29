<?php
session_start(); // Start session to manage login

$error_message = ""; // Variable for error message

// Handle login when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Database connection
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "sdlc";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to check user information
    $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Check if the plain-text password matches
        if ($password === $user['password']) {
            // Successful login
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id']; // Save user ID to session
            $_SESSION['username'] = $user['username']; // Save username to session
            $_SESSION['role'] = $user['role']; // Save role to session

            if ($user['role'] === 'admin') {
                // Redirect to admin page for admin users
                header("Location: /website/admin.php");
            } else {
                // Redirect to user page for regular users
                header("Location: /website/user.php");
            }
            exit();
        } else {
            $error_message = "Incorrect password!";
        }
    } else {
        $error_message = "Username does not exist!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/website/assets/css/login.css">
</head>
<body>
    <header>
        <div class="header-container">
            <a href="index.php">
                <img src="/website/assets/pictures/logo.png" alt="Shop Logo" class="logo">
            </a>
            <nav class="nav">
                <a href="/website/product/product_iphone.php">iPhone</a>
                <a href="/website/product/product_ipad.php">iPad</a>
                <a href="/website/product/product_mac.php">Mac</a>
                <a href="#">Watch</a>
                <a href="#">Accessories</a>
                <a href="#">Used Products</a>
                <a href="#">Services</a>
                <a href="#">News</a>
                <a href="#">Promotions</a>
            </nav>
            <div class="header-icons">
                <nav>
                    <a href="/website/login.php">
                        <img src="/website/assets/pictures/user_icon.png" alt="User Icon" id="user-icon">
                    </a>
                    <a href="/website/cart.php">
                        <img src="/website/assets/pictures/cart.png" alt="cart" id="cart-icon">
                    </a>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="login-container">
            <div class="login-image">
                <img src="/website/assets/pictures/login-illustration.png" alt="Login Illustration">
            </div>
            <div class="login-form">
                <h2>Login</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="username">User name:</label>
                        <input type="text" id="username" name="username" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="form-options">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember password</label>
                        <a href="#">Forgot password?</a>
                    </div>
                    <button type="submit" class="login-button">Login</button>

                    <!-- Display error message if any -->
                    <?php if (!empty($error_message)): ?>
                        <p style="color: red;"><?= $error_message; ?></p>
                    <?php endif; ?>

                    <p class="register-html">Don't have an account? <a href="/website/register.php">Register a new account here</a></p>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
