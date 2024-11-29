<?php
session_start();
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true;
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store VN</title>
    <link rel="stylesheet" href="/website/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="icon" href="/pictures/favicon.png" type="image/x-icon">
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
                <a href="<?= $isLoggedIn ? '/website/user.php' : '/website/login.php' ?>">
                    <img src="/website/assets/pictures/user_icon.png" alt="User Icon" id="user-icon">
                </a>
                <a href="/website/user.php">
                    user
                </a>
                    <a href="/website/cart.php">
                        <img src="/website/assets/pictures/cart.png" alt="cart" id="cart-icon">
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="slideshow-container">
            <a class="slide"><img src="/website/assets/pictures/jp1.jpg" alt="Ảnh 1"></a>
            <a class="slide"><img src="/website/assets/pictures/jp2.png" alt="Ảnh 2"></a>
        </div>

        <section class="products">
            <h2>iPhone</h2>
            <div class="product-list">
                <div class="product-item">
                    <a href="/website/product/product_detail_iphone16promax.php">
                        <img src="https://shopdunk.com/images/thumbs/0029155_iphone-16-pro-max-256gb_240.png" alt="iPhone 16 Pro Max">
                    </a>
                    <h3>iPhone 16 Pro Max 256GB</h3>
                    <p><strong>34.090.000đ</strong> <del>34.990.000đ</del> -2%</p>
                </div>
                <div class="product-item">
                    <a href="/website/product/iphone16.php">
                        <img src="https://shopdunk.com/images/thumbs/0030771_iphone-16-128gb_240.png" alt="iPhone 16">
                    </a>
                    <h3>iPhone 16 128GB</h3>
                    <p><strong>22.190.000đ</strong> <del>22.990.000đ</del> -3%</p>
                </div>
                <div class="product-item">
                    <a href="/html/iphone16plus.html">
                        <img src="https://shopdunk.com/images/thumbs/0030772_iphone-16-plus-128gb_240.png" alt="iPhone 16 Plus">
                    </a>
                    <h3>iPhone 16 Plus 128GB</h3>
                    <p><strong>25.490.000đ</strong> <del>25.990.000đ</del> -1%</p>
                </div>
                <div class="product-item">
                    <a href="/html/iphone16pro.html">
                        <img src="https://shopdunk.com/images/thumbs/0030444_iphone-16-pro-128gb_240.png" alt="iPhone 16 Pro">
                    </a>
                    <h3>iPhone 16 Pro 128GB</h3>
                    <p><strong>28.790.000đ</strong> <del>28.990.000đ</del> 0%</p>
                </div>
            </div>
            <div class="view-all">
                <a href="/website/product/product_iphone.php" class="btn-view-all">See all iPhone</a>
            </div>
        </section>

        <section class="products">
            <h2>iPad</h2>
            <div class="product-list">
                <div class="product-item">
                    <a href="/html/ipadprom4.html">
                        <img src="https://shopdunk.com/images/thumbs/0025624_ipad-pro-m4-11-inch-wi-fi_240.jpeg" alt="iPad Pro 12.9">
                    </a>
                    <h3>iPad Pro 12.9-inch 128GB</h3>
                    <p><strong>29.990.000đ</strong> <del>31.990.000đ</del> -6%</p>
                </div>
                <div class="product-item">
                    <a href="/html/ipadair.html">
                        <img src="https://shopdunk.com/images/thumbs/0025630_ipad-air-6-m2-13-inch-wi-fi_240.jpeg" alt="iPad Air">
                    </a>
                    <h3>iPad Air 6 10.9-inch 256GB</h3>
                    <p><strong>18.490.000đ</strong> <del>19.490.000đ</del> -5%</p>
                </div>
                <div class="product-item">
                    <a href="/html/ipadgen10.html">
                        <img src="https://shopdunk.com/images/thumbs/0009725_ipad-gen-10-th-109-inch-wifi-64gb_240.png" alt="iPad 10.2">
                    </a>
                    <h3>iPad gen 10 10.2-inch 64GB</h3>
                    <p><strong>10.490.000đ</strong> <del>10.990.000đ</del> -4%</p>
                </div>
                <div class="product-item">
                    <a href="/html/ipadmini6.html">
                        <img src="https://shopdunk.com/images/thumbs/0000593_ipad-mini-6_240.png" alt="iPad Mini">
                    </a>
                    <h3>iPad Mini 6 64GB</h3>
                    <p><strong>14.490.000đ</strong> <del>15.490.000đ</del> -3%</p>
                </div>
            </div>
            <div class="view-all">
                <a href="/website/product/product_ipad.php" class="btn-view-all">See all iPad &gt;</a>
            </div>
        </section>

        <section class="products">
            <h2>Mac</h2>
            <div class="product-list">
                <div class="product-item">
                    <a href="/html/macbookm1.html">
                        <img src="https://shopdunk.com/images/thumbs/0000723_macbook-air-m1-2020-8gb-ram-256gb-ssd_240.png" alt="MacBook Air M2">
                    </a>
                    <h3>MacBook Air M2 256GB</h3>
                    <p><strong>27.990.000đ</strong> <del>28.990.000đ</del> -4%</p>
                </div>
                <div class="product-item">
                    <a href="/html/macbookprom2.html">
                        <img src="https://shopdunk.com/images/thumbs/0008502_macbook-air-m2-13-inch-8gb-ram-256gb-ssd_240.png" alt="MacBook Pro M2">
                    </a>
                    <h3>MacBook Pro M2 512GB</h3>
                    <p><strong>43.990.000đ</strong> <del>45.990.000đ</del> -5%</p>
                </div>
                <div class="product-item">
                    <a href="/html/macbookm2.html">
                        <img src="https://shopdunk.com/images/thumbs/0024432_macbook-air-m3-13-inch-8gb-ram-256gb-ssd_240.jpeg" alt="MacBook Air M2">
                    </a>
                    <h3>MacBook Air M2 8GB 256GB</h3>
                    <p><strong>31.990.000đ</strong> <del>32.990.000đ</del> -3%</p>
                </div>
                <div class="product-item">
                    <a href="/html/macpro.html">
                        <img src="https://shopdunk.com/images/thumbs/0024432_macbook-air-m3-13-inch-8gb-ram-256gb-ssd_240.jpeg" alt="MacBook Pro">
                    </a>
                    <h3>MacBook Pro M2 16-inch</h3>
                    <p><strong>52.990.000đ</strong> <del>53.990.000đ</del> -2%</p>
                </div>
            </div>
            <div class="view-all">
                <a href="/website/product/product_mac.php" class="btn-view-all">See all Mac &gt;</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Apple Store VN</p>
    </footer>
</body>

</html>