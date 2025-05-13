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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the ID of the certification to update and the action (Approve/Reject)
    $id = $_POST['id'];
    $action = $_POST['action'];

    // Set the approval status based on the action
    // Change 'Reject' to 'Denied' to match the ENUM values
    $approval_status = $action == 'Approve' ? 'Approved' : 'Denied';

    // Prepare the SQL query to update the approval status
    $sql = "UPDATE guide_certifications SET approval_status = ? WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $approval_status, $id);

        // Execute the query and check if successful
        if ($stmt->execute()) {
            // Redirect back to the certifications page with a success message
            header("Location: view_cert.php?status=success");
            exit;
        } else {
            // Error message if update fails
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
