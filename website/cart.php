<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập thì chuyển hướng đến trang đăng nhập
if (!isset($_SESSION['logged_in'])) {
    header('Location: /website/login.php');
    exit();
}

// Lấy thông tin người dùng từ session
$username = $_SESSION['username'];
?>



<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="/website/assets/css/cart.css">
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
                    <span>Welcome, <?php echo $username; ?></span> <!-- Hiển thị tên người dùng -->
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

    <!-- Giỏ hàng -->
    <main>
        <div class="cart-container">
            <h1>Cart</h1>
            <div class="cart-items">
                <!-- Sản phẩm trong giỏ hàng -->
            </div>

            <div class="cart-summary">
                <p><strong>Total:</strong> 0đ</p>
                <div class="cart-buttons">
                    <button id="continue-shopping" class="btn-continue-shopping">Continue shopping</button>
                    <button id="checkout" class="btn-checkout">Pay</button>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script>
        const cartItemsContainer = document.querySelector('.cart-items');
        const cartSummary = document.querySelector('.cart-summary p');

        function renderCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            cartItemsContainer.innerHTML = ''; // Xóa nội dung cũ
            let total = 0;

            cart.forEach((product, index) => {
                const item = document.createElement('div');
                item.classList.add('cart-item');
                item.innerHTML = ` 
                    <img src="${product.image}" alt="${product.name}" class="cart-item-image">
                    <div class="cart-item-info">
                        <h2 class="cart-item-name">${product.name}</h2>
                        <p class="cart-item-version"><strong>Version:</strong> ${product.version}</p>
                        <p class="cart-item-price">${(product.price * product.quantity).toLocaleString('vi-VN')}đ</p>
                        <div class="cart-item-quantity">
                            <button class="btn-decrease" data-index="${index}">-</button>
                            <span>${product.quantity}</span>
                            <button class="btn-increase" data-index="${index}">+</button>
                        </div>
                        <button class="btn-remove" data-index="${index}">Xóa</button>
                    </div>
                `;
                cartItemsContainer.appendChild(item);
                total += product.price * product.quantity;
            });

            cartSummary.textContent = `Total: ${total.toLocaleString('vi-VN')}đ`;
        }

        cartItemsContainer.addEventListener('click', function (e) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const index = e.target.dataset.index;

            if (e.target.classList.contains('btn-increase')) {
                cart[index].quantity += 1;
            } else if (e.target.classList.contains('btn-decrease')) {
                if (cart[index].quantity > 1) {
                    cart[index].quantity -= 1;
                }
            } else if (e.target.classList.contains('btn-remove')) {
                cart.splice(index, 1);
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        });
        renderCart();

        // Sự kiện cho các nút chuyển hướng
        document.getElementById('continue-shopping').addEventListener('click', function () {
            window.location.href = 'index.php';
        });

        document.getElementById('checkout').addEventListener('click', function () {
            window.location.href = 'checkout.php';
        });
    </script>

</body>

</html>

