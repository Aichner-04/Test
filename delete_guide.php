<?php
// Start the session
session_start();

// Include your database connection
include('db_connection.php');

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $guide_id = $_GET['id'];

    // Delete the guide from the database
    $delete_query = "DELETE FROM park_guides WHERE id = $guide_id";
    
    if ($conn->query($delete_query) === TRUE) {
        echo "Park guide deleted successfully.";
        header('Location: displayUserFeedback.php'); // Redirect back to the list of guides
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Guide ID not provided.";
    exit;
}
?>
