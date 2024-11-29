<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdlc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password']; // Không mã hóa mật khẩu
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO users (username, password, email, full_name, phone, address) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $username, $password, $email, $full_name, $phone, $address);

    if ($stmt->execute()) {
        echo "Đăng ký thành công!";
        header("Location: /website/login.php"); // Điều hướng người dùng đến trang đăng nhập
        exit();
    } else {
        echo "Đăng ký thất bại: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/website/assets/css/register.css">
</head>
<body>
    <header>
        <div class="header-container">
            <a href="/website/index.php">
                <img src="/pictures/logo.png" alt="Shop Logo" class="logo">
            </a>
            <nav class="nav">
                <a href="#">iPhone</a>
                <a href="#">iPad</a>
                <a href="#">Mac</a>
                <a href="#">Watch</a>
                <a href="#">Accessories</a>
                <a href="#">Used Products</a>
                <a href="#">Services</a>
                <a href="#">News</a>
                <a href="#">Promotions</a>
            </nav>
            <div class="header-icons">
                <img src="/pictures/cart.png" alt="Cart Icon">
                <img src="/pictures/user_icon.png" alt="User Icon">
            </div>
        </div>
    </header>

    <div class="container">
        <div class="image-section">
            <img src="https://shopdunk.com/images/uploaded/banner/TND_M402_010%201.jpeg" alt="Register Banner">
        </div>
        <div class="form-section">
            <h2>Register</h2>
            <form method="POST" action="">
                <label for="full_name">Fullname:</label>
                <input type="text" id="full_name" name="full_name" placeholder="Enter your fullname" required>
                
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Enter your address" required>

                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
