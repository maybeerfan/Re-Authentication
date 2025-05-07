<?php
session_start();

// پاک کردن سشن‌ها
$_SESSION = [];
session_unset();
session_destroy();

// پاک کردن کوکی‌ها
setcookie('remember_username', '', time() - 3600, "/");
setcookie('remember_token', '', time() - 3600, "/");

// انتقال به صفحه اصلی
header("Location: index.php");
exit;