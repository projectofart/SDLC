<?php
session_start();
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPad - Apple Store VN</title>
    <link rel="stylesheet" href="/website/assets/css/product_ipad.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

    <main class="container">
        <!-- Dãy 1: iPad Gen -->
        <div class="product-row">
            <h2 class="text-center">iPad Gen</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="/html/ipadgen10.html">
                            <img src="https://shopdunk.com/images/thumbs/0009725_ipad-gen-10-th-109-inch-wifi-64gb_240.png"
                                alt="iPad Gen 10 256GB">
                        </a>
                        <h5>iPad Gen 10 256GB</h5>
                        <p>34.090.000đ</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="/html/ipadgen9.html">
                            <img src="https://shopdunk.com/images/thumbs/0006205_ipad-gen-9-102-inch-wifi-64gb_240.png"
                                alt="iPad Gen 9 128GB">
                        </a>
                        <h5>iPad Gen 9 128GB</h5>
                        <p>22.190.000đ</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="/html/ipadgen10-512.html">
                            <img src="https://shopdunk.com/images/thumbs/0009725_ipad-gen-10-th-109-inch-wifi-64gb_240.png"
                                alt="iPad Gen 10 512GB">
                        </a>
                        <h5>iPad Gen 10 512GB</h5>
                        <p>39.990.000đ</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="/html/ipadgen9-128.html">
                            <img src="https://shopdunk.com/images/thumbs/0006205_ipad-gen-9-102-inch-wifi-64gb_240.png"
                                alt="iPad Gen 9 128GB">
                        </a>
                        <h5>iPad Gen 9 128GB</h5>
                        <p>28.990.000đ</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dãy 2: iPad M4 -->
        <div class="product-row">
            <h2 class="text-center">iPad M4</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="/html/ipadm4-128.html">
                            <img src="https://shopdunk.com/images/thumbs/0025624_ipad-pro-m4-11-inch-wi-fi_240.jpeg" alt="iPad M4 128GB">
                        </a>
                        <h5>iPad M4 128GB</h5>
                        <p>34.990.000đ</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="/html/ipadm4-plus-128.html">
                            <img src="https://shopdunk.com/images/thumbs/0025624_ipad-pro-m4-11-inch-wi-fi_240.jpeg" alt="iPad M4 Plus 128GB">
                        </a>
                        <h5>iPad M4 Plus 128GB</h5>
                        <p>22.290.000đ</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="/html/ipadm4-plus-256.html">
                            <img src="https://shopdunk.com/images/thumbs/0025626_ipad-pro-m4-13-inch-wi-fi-cellular_240.jpeg" alt="iPad M4 Plus 256GB">
                        </a>
                        <h5>iPad M4 Plus 256GB</h5>
                        <p>24.290.000đ</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="/html/ipadm4-pro.html">
                            <img src="https://shopdunk.com/images/thumbs/0025626_ipad-pro-m4-13-inch-wi-fi-cellular_240.jpeg" alt="iPad M4 Pro 128GB">
                        </a>
                        <h5>iPad M4 Pro 128GB</h5>
                        <p>30.990.000đ</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dãy 2: iPad M2 -->
<div class="product-row">
    <h2 class="text-center">iPad M2</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="product-card">
                <a href="/html/ipadm2-128.html">
                    <img src="https://shopdunk.com/images/thumbs/0022263_iphone-15-pro-128gb_240.png" alt="iPad M2 128GB">
                </a>
                <h5>iPad M2 128GB</h5>
                <p>34.990.000đ</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <a href="/html/ipadm2-plus-128.html">
                    <img src="https://shopdunk.com/images/thumbs/0020317_iphone-15-plus-128gb_240.webp" alt="iPad M2 Plus 128GB">
                </a>
                <h5>iPad M2 Plus 128GB</h5>
                <p>22.290.000đ</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <a href="/html/ipadm2-plus-256.html">
                    <img src="https://shopdunk.com/images/thumbs/0020317_iphone-15-plus-128gb_240.webp" alt="iPad M2 Plus 256GB">
                </a>
                <h5>iPad M2 Plus 256GB</h5>
                <p>24.290.000đ</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <a href="/html/ipadm2-pro.html">
                    <img src="https://shopdunk.com/images/thumbs/0022263_iphone-15-pro-128gb_240.png" alt="iPad M2 Pro 128GB">
                </a>
                <h5>iPad M2 Pro 128GB</h5>
                <p>30.990.000đ</p>
            </div>
        </div>
    </div>
</div>

<!-- Dãy 3: iPad M1 -->
<div class="product-row">
    <h2 class="text-center">iPad M1</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="product-card">
                <a href="/html/ipadm1-128.html">
                    <img src="https://shopdunk.com/images/thumbs/0022263_iphone-15-pro-128gb_240.png" alt="iPad M1 128GB">
                </a>
                <h5>iPad M1 128GB</h5>
                <p>29.990.000đ</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <a href="/html/ipadm1-plus-128.html">
                    <img src="https://shopdunk.com/images/thumbs/0020317_iphone-15-plus-128gb_240.webp" alt="iPad M1 Plus 128GB">
                </a>
                <h5>iPad M1 Plus 128GB</h5>
                <p>19.990.000đ</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <a href="/html/ipadm1-plus-256.html">
                    <img src="https://shopdunk.com/images/thumbs/0020317_iphone-15-plus-128gb_240.webp" alt="iPad M1 Plus 256GB">
                </a>
                <h5>iPad M1 Plus 256GB</h5>
                <p>21.490.000đ</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <a href="/html/ipadm1-pro.html">
                    <img src="https://shopdunk.com/images/thumbs/0022263_iphone-15-pro-128gb_240.png" alt="iPad M1 Pro 128GB">
                </a>
                <h5>iPad M1 Pro 128GB</h5>
                <p>27.990.000đ</p>
            </div>
        </div>
    </div>
</div>

    </main>
</body>

</html>
