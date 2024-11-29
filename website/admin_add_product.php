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

// Lấy danh sách danh mục sản phẩm
$sql_categories = "SELECT * FROM categories";
$categories_result = $conn->query($sql_categories);

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $stock_quantity = $_POST['stock_quantity'];

    // Thêm sản phẩm vào cơ sở dữ liệu
    $insert_product = "INSERT INTO products (name, price, category_id, stock_quantity) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_product);
    $stmt->bind_param("ssii", $name, $price, $category_id, $stock_quantity);

    if ($stmt->execute()) {
        echo "Sản phẩm đã được thêm thành công!";
        // Redirect to admin page after insertion
        header("Location: /website/admin.php");
        exit();
    } else {
        echo "Lỗi khi thêm sản phẩm: " . $stmt->error;
    }

    $stmt->close();
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm - Apple Store VN</title>
    <link rel="stylesheet" href="/website/assets/css/admin_add_product.css">
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
    <h1 class="text-center">Thêm sản phẩm mới</h1>

    <form method="POST" action="/website/admin_add_product.php">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <?php while ($category = $categories_result->fetch_assoc()) { ?>
                    <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="stock_quantity" class="form-label">Số lượng tồn</label>
            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
        </div>

        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</main>

<footer class="text-center mt-5">
    <p>&copy; 2024 Apple Store VN. All rights reserved.</p>
</footer>

</body>
</html>
