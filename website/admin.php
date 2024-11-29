<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "sdlc";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý khi người dùng muốn xóa sản phẩm
if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];

    // Bước 1: Xóa các mục trong bảng order_items có liên quan đến sản phẩm này
    $delete_order_items = "DELETE FROM order_items WHERE product_id = ?";
    $stmt = $conn->prepare($delete_order_items);
    $stmt->bind_param("i", $product_id);
    if (!$stmt->execute()) {
        echo "Lỗi khi xóa mục trong đơn hàng: " . $stmt->error;
        exit();
    }

    // Bước 2: Xóa sản phẩm khỏi bảng products
    $delete_product = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($delete_product);
    $stmt->bind_param("i", $product_id);
    if ($stmt->execute()) {
        echo "Sản phẩm đã được xóa thành công!";
        // Redirect to admin page after deletion
        header("Location: /website/admin.php");
        exit();
    } else {
        echo "Lỗi khi xóa sản phẩm: " . $stmt->error;
    }

    $stmt->close();
}

// Truy vấn lấy tất cả sản phẩm
$sql = "SELECT p.id, p.name, p.price, p.stock_quantity, c.name AS category_name
        FROM products p
        JOIN categories c ON p.category_id = c.id";
$result = $conn->query($sql);

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Apple Store VN</title>
    <link rel="stylesheet" href="/website/assets/css/admin.css">
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
                    
                    <a href="/website/logout.php">
                        <img src="/website/assets/pictures/user_icon.png" alt="User Icon" id="user-icon">
                    </a>
                    <a href="/website/cart.php">
                        <img src="/website/assets/pictures/cart.png" alt="cart" id="cart-icon">
                    </a>
                </nav>
            </div>
        </div>
    </header>

<main class="container mt-5">
    <h1 class="text-center">Quản lý sản phẩm</h1>

    <!-- Button to add new product -->
    <div class="text-end mb-4">
        <a href="/website/admin_add_product.php" class="btn btn-success">Thêm sản phẩm</a>
    </div>

    <!-- Product table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Số lượng tồn</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$stt}</td>
                        <td>{$row['name']}</td>
                        <td>" . number_format($row['price'], 0, ',', '.') . "₫</td>
                        <td>{$row['category_name']}</td>
                        <td>{$row['stock_quantity']}</td>
                        <td>
                            <a href='/website/admin_edit_product.php?id={$row['id']}' class='btn btn-warning btn-sm'>Sửa</a>
                            <a href='/website/admin.php?delete={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm này?\")'>Xóa</a>
                        </td>
                    </tr>";
                    $stt++;
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>Chưa có sản phẩm nào.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<footer class="text-center mt-5">
    <p>&copy; 2024 Apple Store VN. All rights reserved.</p>
</footer>

</body>

</html>
