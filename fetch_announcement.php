<?php
// Database connection
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";      // Default password for XAMPP (empty)
$dbname = "e_office"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the guide's name is stored in the session
session_start();
$guide_name = $_SESSION['username']; // or $_SESSION['user_id'] if you're storing the user ID

// Query to fetch announcements for the logged-in guide
$sql = "SELECT * FROM announcements WHERE guide_name = ? AND status = 'Unread' ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $guide_name);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the announcements
$announcements = [];
while ($row = $result->fetch_assoc()) {
    $announcements[] = $row;
}

// Return the announcements as JSON
echo json_encode($announcements);

// Close the connection
$stmt->close();
$conn->close();
?>
