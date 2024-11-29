<?php
session_start(); // Khởi tạo session

// Hủy session và đăng xuất người dùng
session_unset(); // Xóa tất cả các session variables
session_destroy(); // Hủy session

// Chuyển hướng về trang login
header('Location: /website/login.php');
exit();
?>
