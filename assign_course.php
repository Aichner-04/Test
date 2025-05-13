<?php
// Get the course_id and selected guide_usernames from the form
$course_id = $_POST['course_id'];
$selected_guides = $_POST['guide_usernames'];  // This is an array of selected guides

// Database connection
$conn = new mysqli("localhost", "root", "", "e_office");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert each selected guide into the guide_courses table
foreach ($selected_guides as $guide) {
    $sql = "INSERT INTO guide_courses (course_id, username) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $course_id, $guide);
    $stmt->execute();
}

// Close the connection
$stmt->close();
$conn->close();

// Redirect back to the course details page (or wherever you need)
header("Location: trainingSchedule.php");  // Adjust the redirect URL if needed
exit();
?>
