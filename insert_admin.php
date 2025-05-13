<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_office";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Admin info
$adminUsername = "admin1";
$adminEmail = "admin1@example.com";
$adminPassword = "admin123";  // Plain password, will be hashed
$hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT); // Automatically hash the password

// Insert into users table
$sql = "INSERT INTO users (role, username, email, password) VALUES ('admin', ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $adminUsername, $adminEmail, $hashedPassword);

if ($stmt->execute()) {
    echo "✅ Admin inserted successfully.";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
