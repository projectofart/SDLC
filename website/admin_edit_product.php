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

// Lấy thông tin sản phẩm cần sửa
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
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

    // Cập nhật sản phẩm vào cơ sở dữ liệu
    $update_product = "UPDATE products SET name = ?, price = ?, category_id = ?, stock_quantity = ? WHERE id = ?";
    $stmt = $conn->prepare($update_product);
    $stmt->bind_param("ssiii", $name, $price, $category_id, $stock_quantity, $product_id);

    if ($stmt->execute()) {
        echo "Sản phẩm đã được cập nhật thành công!";
        // Redirect to admin page after update
        header("Location: /website/admin.php");
        exit();
    } else {
        echo "Lỗi khi cập nhật sản phẩm: " . $stmt->error;
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
    <title>Sửa sản phẩm - Apple Store VN</title>
    <link rel="stylesheet" href="/website/assets/css/admin_edit_product.css">
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
    <h1 class="text-center">Edit product information</h1>

    <form method="POST" action="/website/admin_edit_product.php?id=<?= $product['id'] ?>">
        <div class="mb-3">
            <label for="name" class="form-label">product name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">product price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?= $product['price'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categories</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <?php while ($category = $categories_result->fetch_assoc()) { ?>
                    <option value="<?= $category['id']; ?>" <?= $category['id'] == $product['category_id'] ? 'selected' : ''; ?>><?= $category['name']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="stock_quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="<?= $product['stock_quantity'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update product</button>
    </form>
</main>

<footer class="text-center mt-5">
    <p>&copy; 2024 Apple Store VN.</p>
</footer>

</body>
</html>
