

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="/website/assets/css/check_out.css">
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
        </div>
    </header>

    <!-- Nội dung checkout -->
    <main>
        <div class="checkout-container">
            <h1>Payment</h1>

            <!-- Thông tin sản phẩm -->
            <div class="cart-items">
                <h2>Product Information</h2>
                <div id="checkout-items">
                    <!-- Sản phẩm sẽ được render ở đây từ Local Storage -->
                </div>
                <p id="total-amount"><strong>Total:</strong> 0đ</p>
            </div>

            <!-- Thông tin khách hàng -->
            <div class="customer-info">
                <h2>delivery information</h2>
                <form action="/website/thank.php" method="POST">
                    <div class="form-group">
                        <label for="name">Fullname:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">phone number:</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea id="address" name="address" class="form-control" required></textarea>
                    </div>
                    <input type="hidden" id="cart-data" name="cart_data">
                    <button type="submit" class="btn-checkout" >Confirm</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Lấy dữ liệu từ Local Storage và hiển thị trong phần checkout
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const checkoutItems = document.getElementById('checkout-items');
        const totalAmount = document.getElementById('total-amount');
        const cartDataInput = document.getElementById('cart-data');

        let total = 0;

        cart.forEach(product => {
            const item = document.createElement('div');
            item.classList.add('checkout-item');
            item.innerHTML = `
                <div>
                    <p><strong>${product.name}</strong> - Phiên bản: ${product.version}</p>
                    <p>Số lượng: ${product.quantity}</p>
                    <p>Giá: ${(product.price * product.quantity).toLocaleString('vi-VN')}đ</p>
                </div>
            `;
            checkoutItems.appendChild(item);
            total += product.price * product.quantity;
        });

        totalAmount.textContent = `Tổng cộng: ${total.toLocaleString('vi-VN')}đ`;

        cartDataInput.value = JSON.stringify(cart);
    </script>

</body>

</html>
<script>
    document.querySelector('.btn-checkout').addEventListener('click', function(e) {
    e.preventDefault();  // Ngừng hành động mặc định của nút submit

    // Lấy thông tin từ Local Storage và thêm vào form nếu cần
    const cartData = JSON.stringify(cart);
    document.getElementById('cart-data').value = cartData;

    // Gửi form sau khi đã chuẩn bị dữ liệu
    document.querySelector('form').submit();
});

</script>