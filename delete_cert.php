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

// Get the certificate ID from the URL
$id = $_GET['id'];

// Fetch the certificate data to check the file before deletion
$sql = "SELECT * FROM guide_certifications WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    // Delete the certificate file from the server
    if (file_exists($row['cert_files'])) {
        unlink($row['cert_files']);
    }

    // Delete the record from the database
    $delete_sql = "DELETE FROM guide_certifications WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirect to the view page after deletion
    header("Location: view_cert.php");
    exit;
} else {
    echo "Record not found!";
}

$stmt->close();
$conn->close();
?>
