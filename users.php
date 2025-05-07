<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    http_response_code(403);
    echo "<h1>403 Forbidden</h1><p>You do not have permission to access this page.</p>";
    exit;
}

// نمایش لیست کاربران
$conn = new mysqli('localhost', 'root', '', 'login_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT id, username, role FROM users");

echo "<h2>User List</h2>";
echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Role</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['role']}</td></tr>";
}
echo "</table>";

$conn->close();
?>