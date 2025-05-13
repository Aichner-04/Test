<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_office"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the training session from the database
    $delete_query = "DELETE FROM training_sessions WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param('i', $id);
    
    if ($stmt->execute()) {
        echo "Training session deleted successfully.";
        header("Location: displayUserFeedback.php"); 
    } else {
        echo "Error deleting training session.";
    }
} else {
    echo "No training session ID provided.";
}
?>
