<?php
// Lấy dữ liệu từ form gửi qua POST
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$cart_data = json_decode($_POST['cart_data'], true);

// Tính tổng tiền từ giỏ hàng
$total = 0;
foreach ($cart_data as $product) {
    $total += $product['price'] * $product['quantity'];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="/website/assets/css/thank.css"> <!-- Đảm bảo rằng bạn đã link CSS đúng -->
</head>
<body>

    <div class="container">
        <h1>Cảm ơn bạn, <?php echo htmlspecialchars($name); ?>!</h1>
        <p>Đơn hàng của bạn đã được xác nhận và sẽ được giao sớm nhất!</p>
        
        <h2>Thông tin đơn hàng:</h2>
        <ul>
            <li><strong>Họ và tên:</strong> <?php echo htmlspecialchars($name); ?></li>
            <li><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($phone); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
            <li><strong>Địa chỉ giao hàng:</strong> <?php echo htmlspecialchars($address); ?></li>
        </ul>

        <div class="cart-items">
            <h2>Giỏ hàng:</h2>
            <ul>
                <?php foreach ($cart_data as $product): ?>
                    <li><?php echo htmlspecialchars($product['name']) . ' - ' . $product['quantity'] . ' x ' . number_format($product['price'], 0, ',', '.') . 'đ'; ?></li>
                <?php endforeach; ?>
            </ul>
            <p class="total">Tổng cộng: <?php echo number_format($total, 0, ',', '.'); ?>đ</p>
        </div>

        <a href="index.php" class="return-home">Trở về trang chủ</a>
    </div>

</body>
</html>
