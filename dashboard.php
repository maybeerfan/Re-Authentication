<?php
session_start();

// بررسی اینکه کاربر وارد شده یا نه
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AuthSystem</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <a href="dashboard.php" class="logo">AuthSystem</a>
        <div class="nav-links">
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="hero">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p class="subtitle">You are now logged in to your dashboard.</p>
            
            <?php if ($_SESSION['role'] === 'admin'): ?>
            <div class="cta-buttons">
                <a href="admin.php" class="btn btn-primary">Admin Panel</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>