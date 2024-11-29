<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPhone 16 Pro Max</title>
    <link rel="stylesheet" href="/website/assets/css/iphone16promax.css">
</head>

<body>
    <header>
        <div class="header-container">
            <a href="/website/index.php">
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
                    <a href="/website/login.php" id="user-login-link">
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
        <div class="product-page">
            <div class="product-images">
                <img src="https://shopdunk.com/images/thumbs/0029343_titan-trang_550.jpeg" alt="iPhone 16 Pro Max"
                    class="main-image">
                <div class="thumbnail-images">
                    <img src="https://shopdunk.com/images/thumbs/0029338_titan-trang_550.jpeg" alt="Color 1">
                    <img src="https://shopdunk.com/images/thumbs/0029340_titan-trang_550.jpeg" alt="Color 2">
                    <img src="https://shopdunk.com/images/thumbs/0029342_titan-trang_550.jpeg" alt="Color 3">
                    <img src="https://shopdunk.com/images/thumbs/0029341_titan-trang_550.jpeg" alt="Color 4">
                    <img src="https://shopdunk.com/images/thumbs/0029339_titan-trang_550.jpeg" alt="Color 5">
                </div>
            </div>

            <div class="product-info">
                <h1>iPhone 16 Pro Max</h1>
                <p class="price">25.990.000đ <span class="old-price">27.990.000đ</span></p>

                <div class="product-options">
                    <div>
                        <label for="version">Version:</label>
                        <select id="version">
                            <option value="95" data-price="25990000">like new 95% - 25.990.000đ</option>
                            <option value="99" data-price="27990000">like new 99% - 27.990.000đ</option>
                            <option value="new" data-price="30990000">New 100% - 30.990.000đ</option>
                        </select>
                    </div>
                    <div>
                        <label for="storage">Storages:</label>
                        <select id="storage">
                            <option value="128GB" data-price="0">128GB</option>
                            <option value="256GB" data-price="2000000">256GB + 2.000.000đ</option>
                            <option value="512GB" data-price="4000000">512GB + 4.000.000đ</option>
                            <option value="1TB" data-price="8000000">1TB + 8.000.000đ</option>
                        </select>
                    </div>
                </div>

                <div class="product-buttons">
                    <button class="btn-add-to-cart">Add to cart</button>
                    <button class="btn-buy-now">Buy now</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Kiểm tra trạng thái đăng nhập
        const isLoggedIn = localStorage.getItem('isLoggedIn');
        const loginLink = document.getElementById('user-login-link');

        if (isLoggedIn !== 'true') {
            // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
            loginLink.href = '/website/login.php';
        } else {
            // Nếu đã đăng nhập, thay đổi liên kết đăng nhập thành 'Thông tin tài khoản' hoặc 'Đăng xuất'
            loginLink.href = '/website/logout.php';  // Bạn có thể tạo trang logout.php để đăng xuất
            loginLink.innerHTML = "Đăng xuất";  // Hiển thị tên đăng xuất
        }

        // Lấy các phần tử HTML
        const versionSelect = document.getElementById('version');
        const storageSelect = document.getElementById('storage');
        const priceElement = document.querySelector('.price');
        const oldPriceElement = document.querySelector('.old-price');

        // Hàm cập nhật giá sản phẩm
        function updatePrice() {
            const versionPrice = parseInt(versionSelect.options[versionSelect.selectedIndex].dataset.price);
            const storagePrice = parseInt(storageSelect.options[storageSelect.selectedIndex].dataset.price);
            const totalPrice = versionPrice + storagePrice;

            priceElement.textContent = totalPrice.toLocaleString('vi-VN') + 'đ';
            oldPriceElement.textContent = (totalPrice + 2000000).toLocaleString('vi-VN') + 'đ';
        }

        versionSelect.addEventListener('change', updatePrice);
        storageSelect.addEventListener('change', updatePrice);
        updatePrice();

        // Sự kiện "Mua ngay"
        document.querySelector('.btn-buy-now').addEventListener('click', function () {
            const product = {
                name: 'iPhone 16 Pro Max',
                version: versionSelect.options[versionSelect.selectedIndex].text,
                storage: storageSelect.options[storageSelect.selectedIndex].text,
                price: parseInt(priceElement.textContent.replace(/[^0-9]/g, ''))
            };

            const queryParams = new URLSearchParams(product).toString();
            window.location.href = `/website/cart.php?${queryParams}`;
        });

        // Thêm sản phẩm vào giỏ hàng
        document.querySelector('.btn-add-to-cart').addEventListener('click', function () {
            const product = {
                name: 'iPhone 16 Pro Max',
                version: versionSelect.options[versionSelect.selectedIndex].text,
                storage: storageSelect.options[storageSelect.selectedIndex].text,
                price: parseInt(priceElement.textContent.replace(/[^0-9]/g, '')),
                image: 'https://shopdunk.com/images/thumbs/0029343_titan-trang_550.jpeg',
                quantity: 1
            };

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProduct = cart.find(item =>
                item.name === product.name &&
                item.version === product.version &&
                item.storage === product.storage
            );

            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push(product);
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Sản phẩm đã được thêm vào giỏ hàng!');
        });
    </script>

</body>

</html>
