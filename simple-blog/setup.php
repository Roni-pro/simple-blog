<?php
include 'includes/db.php';

$password = password_hash('admin123', PASSWORD_DEFAULT);
$username = 'admin';

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

echo "✅ Admin user created successfully!";
?>
