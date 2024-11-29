<?php
session_start(); // Khởi tạo session

// Kiểm tra xem người dùng đã đăng nhập chưa
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

if (!$isLoggedIn) {
    header('Location: /website/login.php'); // Nếu chưa đăng nhập, chuyển hướng về login
    exit();
}

if (!isset($_SESSION['user_id'])) {
    echo "Không tìm thấy thông tin người dùng!";
    exit();
}

$user_id = $_SESSION['user_id']; // Lấy user_id từ session
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdlc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối cơ sở dữ liệu
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy thông tin người dùng từ cơ sở dữ liệu
$sql = "SELECT id, username, full_name, email, phone, address FROM users WHERE id = ?"; // Sửa lại điều kiện truy vấn

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id); // Bind parameter cho truy vấn
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra nếu tìm thấy thông tin người dùng
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Lấy thông tin người dùng từ kết quả truy vấn
} else {
    echo "Không tìm thấy thông tin người dùng!";
    exit();
}

// Kiểm tra xem có yêu cầu cập nhật thông tin không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Cập nhật thông tin người dùng
    $update_sql = "UPDATE users SET full_name = ?, email = ?, phone = ?, address = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssi", $full_name, $email, $phone, $address, $user_id);

    if ($update_stmt->execute()) {
        // Sau khi cập nhật, lấy lại thông tin người dùng mới từ cơ sở dữ liệu
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        echo "Thông tin đã được cập nhật thành công!";
    } else {
        echo "Lỗi khi cập nhật thông tin!";
    }
    
    $update_stmt->close();
}

// Đóng kết nối cơ sở dữ liệu
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="/website/assets/css/user2.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                    <a href="/website/user.php">
                        <img src="/website/assets/pictures/user_icon.png" alt="User Icon" id="user-icon">
                    </a>

                    <a href="/website/cart.php">
                        <img src="/website/assets/pictures/cart.png" alt="cart" id="cart-icon">
                    </a>

                    <!-- Thêm nút đăng xuất -->
                    <a href="/website/logout.php" class="logout">Logout</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Thông tin người dùng -->
    <main>
        <div class="container mt-5">
            <h1>User Information</h1>
            <form id="user-information-form" method="POST">
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Information</button>
            </form>
        </div>
    </main>

</body>

</html>
