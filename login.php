<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'login_system');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // گرفتن اطلاعات از فرم
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // پیدا کردن کاربر در دیتابیس
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);  // در مرحله بعد یاد می‌گیریم چطور رمز رو هش کنیم
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // اگر کاربر پیدا شد → ورود موفق
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];  // ← نقش کاربر
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- فرم HTML لاگین -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="login.php">
        <label>Username: <input type="text" name="username" required></label><br><br>
        <label>Password: <input type="password" name="password" required></label><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>