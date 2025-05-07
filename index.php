<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
        }
        .navbar {
            background: #343a40;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .container {
            text-align: center;
            margin-top: 100px;
        }
        h1 {
            color: #343a40;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>

    <div class="container">
        <h1>Welcome to the Website</h1>
    </div>

</body>
</html>