<?php
// Start the session
session_start();

// Include your database connection
include('db_connection.php');

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $guide_id = $_GET['id'];

    // Prepare the delete statement to prevent SQL Injection
    $stmt = $conn->prepare("DELETE FROM park_guides WHERE id = ?");
    $stmt->bind_param("i", $guide_id); // "i" = integer

    if ($stmt->execute()) {
        echo "Park guide deleted successfully.";
        header('Location: displayUserFeedback.php');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Guide ID not provided.";
    exit;
}

?>
