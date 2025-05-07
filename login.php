<?php
session_start();

// اگر کاربر لاگین نکرده ولی کوکی وجود داره
if (!isset($_SESSION['loggedin']) && isset($_COOKIE['remember_username'], $_COOKIE['remember_token'])) {
    $conn = new mysqli('localhost', 'root', '', 'login_system');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_COOKIE['remember_username'];
    $token = $_COOKIE['remember_token'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if ($token === $row['remember_token']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");
            exit;
        }
    }

    $stmt->close();
    $conn->close();
}

// اگر فرم ارسال شد
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'login_system');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];

            if (isset($_POST['remember'])) {
                $token = hash('sha256', $password);
                setcookie('remember_username', $username, time() + (14 * 24 * 60 * 60), "/");
                setcookie('remember_token', $token, time() + (14 * 24 * 60 * 60), "/");

                // ذخیره تو دیتابیس
                $update = $conn->prepare("UPDATE users SET remember_token = ? WHERE username = ?");
                $update->bind_param("ss", $token, $username);
                $update->execute();
                $update->close();
            }

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Wrong password.";
        }
    } else {
        $error = "User not found.";
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
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <label>
            <input type="checkbox" name="remember"> Remember me for 2 weeks
        </label>
        <button type="submit">Login</button>
    </form>
</body>
</html>