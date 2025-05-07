<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - AuthSystem</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <a href="index.php" class="logo">AuthSystem</a>
        <div class="nav-links">
            <a href="login.php">Login</a>
        </div>
    </nav>

    <div class="form-container">
        <h2>Create an Account</h2>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 1. Connect to the database
            $conn = new mysqli('localhost', 'root', '', 'login_system');

            if ($conn->connect_error) {
                echo "<div class='error-message'>Connection failed: " . $conn->connect_error . "</div>";
            } else {
                // 2. Get and sanitize input
                $username = $conn->real_escape_string($_POST['username']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // encrypt the password

                // 3. Insert into database
                $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $password);

                if ($stmt->execute()) {
                    echo "<div class='success-message'>User registered successfully! You can now <a href='login.php'>login</a>.</div>";
                } else {
                    echo "<div class='error-message'>Error: " . $stmt->error . "</div>";
                }

                $stmt->close();
                $conn->close();
            }
        }
        ?>

        <form action="register.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Choose a username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Choose a password" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Create Account</button>
        </form>
    </div>
</body>
</html>