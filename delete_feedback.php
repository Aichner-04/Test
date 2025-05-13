<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_office"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if id is passed in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from user_feedback
    $delete_sql = "DELETE FROM user_feedback WHERE id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $id);

    if ($delete_stmt->execute()) {
        echo "Record deleted successfully!";
        header("Location: displayUserFeedback.php"); // Redirect after deletion
        exit();
    } else {
        echo "Error deleting record.";
    }
} else {
    echo "ID is required.";
}

$conn->close();
?>
