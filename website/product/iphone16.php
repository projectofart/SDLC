<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPhone 16</title>
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
                <a href="/website/user.php">
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
            <img src="https://shopdunk.com/images/thumbs/0029041_den_550.jpeg" alt="iPhone 16 Pro Max"
                class="main-image">
            <div class="thumbnail-images">
                <img src="https://shopdunk.com/images/thumbs/0029036_den_550.jpeg" alt="Color 1">
                <img src="https://shopdunk.com/images/thumbs/0029037_den_550.jpeg" alt="Color 2">
                <img src="https://shopdunk.com/images/thumbs/0029038_den_550.jpeg" alt="Color 2">
                <img src="https://shopdunk.com/images/thumbs/0029039_den_550.jpeg" alt="Color 2">
                <img src="https://shopdunk.com/images/thumbs/0029339_titan-trang_550.jpeg" alt="Color 2">
            </div>
        </div>

        <div class="product-info">
            <h1>iPhone 16</h1>
            <p class="price" id="price">22.190.000đ <span class="old-price">22.990.000đ</span></p>

            <div class="product-options">
                <label for="version">Version:</label>
                <select id="version">
                    <option value="new">New 100%</option>
                </select>

                <label for="storage">Storage:</label>
                <select id="storage">
                    <option value="128GB">128GB</option>
                    <option value="256GB">256GB</option>
                    <option value="512GB">512GB</option>
                    <option value="1TB">1TB</option>
                </select>
            </div>

            <div class="product-buttons">
                <button class="btn-add-to-cart">Add to cart</button>
                <button class="btn-buy-now">Buy now</button>
            </div>
        </div>
    </div>
</main>

<script>
    // Định nghĩa các mức giá cho các lựa chọn phiên bản và bộ nhớ
    const prices = {
        "128GB": {
            "new": 22190000
        },
        "256GB": {
            "new": 24990000
        },
        "512GB": {
            "new": 27990000
        },
        "1TB": {
            "new": 31990000
        }
    };

    const addToCartButton = document.querySelector('.btn-add-to-cart');
    const versionSelect = document.getElementById('version');
    const storageSelect = document.getElementById('storage');
    const priceElement = document.getElementById('price');

    // Cập nhật giá khi người dùng thay đổi phiên bản hoặc bộ nhớ
    function updatePrice() {
        const version = versionSelect.value;
        const storage = storageSelect.value;
        
        // Lấy giá từ đối tượng prices
        const newPrice = prices[storage] && prices[storage][version] ? prices[storage][version] : 0;

        // Cập nhật giá hiển thị trên trang
        priceElement.textContent = `${newPrice.toLocaleString()}đ`;
    }

    // Lắng nghe sự thay đổi của phiên bản và bộ nhớ
    versionSelect.addEventListener('change', updatePrice);
    storageSelect.addEventListener('change', updatePrice);

    // Cập nhật giá ban đầu
    updatePrice();

    // Thêm sản phẩm vào giỏ hàng
    addToCartButton.addEventListener('click', function () {
        const product = {
            name: 'iPhone 16',
            version: versionSelect.options[versionSelect.selectedIndex].text,
            storage: storageSelect.options[storageSelect.selectedIndex].text,
            price: prices[storageSelect.value][versionSelect.value], // Giá theo lựa chọn
            image: 'https://shopdunk.com/images/thumbs/0029041_den_550.jpeg',
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
