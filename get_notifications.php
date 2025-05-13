<?php 
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "e_office";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get logged-in guide's username
session_start();
$guide_username = $_SESSION['username']; // Assuming you have the guide's username in session

// Fetch unread or valid notifications for the guide
// Fetch notifications that are approved by the admin and valid or expired
$sql = "SELECT * FROM notifications 
        WHERE guide_username = ? 
        AND EXISTS (SELECT 1 FROM guide_certifications WHERE guide_certifications.username = ? AND guide_certifications.approval_status = 'Approved')
        AND (status = 'valid' OR status = 'expired') 
        ORDER BY created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $guide_username, $guide_username);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the notifications into an array
$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

// Send the notifications as a JSON response
echo json_encode($notifications);

// Close the connection
$stmt->close();
$conn->close();
?>
