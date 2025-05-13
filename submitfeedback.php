<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP (empty)
$dbname = "e_office"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$guide_name = isset($_POST['guideName']) ? $_POST['guideName'] : '';
$bm_rating = isset($_POST['bmRating']) ? $_POST['bmRating'] : '';
$eng_rating = isset($_POST['engRating']) ? $_POST['engRating'] : '';
$chi_rating = isset($_POST['chiRating']) ? $_POST['chiRating'] : '';
$knowledge_feedback = isset($_POST['knowledgeFeedback']) ? $_POST['knowledgeFeedback'] : '';

// Check if any required field is empty
if (empty($guide_name) || empty($bm_rating) || empty($eng_rating) || empty($chi_rating) || empty($knowledge_feedback)) {
    echo "<script>alert('Please fill in all fields.'); window.location.href = 'feedback_form.php';</script>";
    exit();
}

// SQL query to insert the feedback into the database
$sql_feedback = "INSERT INTO user_feedback (guide_name, bm_rating, eng_rating, chi_rating, knowledge_feedback) 
                 VALUES (?, ?, ?, ?, ?)";
$stmt_feedback = $conn->prepare($sql_feedback);
$stmt_feedback->bind_param("sssss", $guide_name, $bm_rating, $eng_rating, $chi_rating, $knowledge_feedback);

// Check if insertion was successful
if ($stmt_feedback->execute()) {
    // Calculate the sum of all ratings
    $total_rating = $bm_rating + $eng_rating + $chi_rating;

    // Assign training if the total rating is below a certain threshold (e.g., 12 or 13)
    if ($total_rating < 12) {
        $training_status = 'Assigned'; // If the total is below threshold, assign training
    } else {
        // Otherwise, mark the status as 'Completed'
        $training_status = 'Completed';
    }

    // Fetch the username based on guide_name from park_guides table
    $sql_guide = "SELECT username FROM park_guides WHERE full_name = ?";
    $stmt_guide = $conn->prepare($sql_guide);
    $stmt_guide->bind_param("s", $guide_name);
    $stmt_guide->execute();
    $result_guide = $stmt_guide->get_result();

    if ($result_guide->num_rows > 0) {
        $guide = $result_guide->fetch_assoc();
        $username = $guide['username']; // Get the username

        // Determine the language(s) that need training based on the rating
        $training_title = "Training Assigned: " . $training_status . " - ";

        if ($bm_rating < 3) {
            $training_title .= "BM Language ";
        }
        if ($eng_rating < 3) {
            $training_title .= "English Language ";
        }
        if ($chi_rating < 3) {
            $training_title .= "Chinese Language ";
        }

        // Now, Insert into the training_sessions table
        $sql_training = "INSERT INTO training_sessions (guide_name, training_date, training_status, training_title)
                     VALUES (?, NOW(), ?, ?)";
        $stmt_training = $conn->prepare($sql_training);
        $stmt_training->bind_param("sss", $username, $training_status, $training_title);

        // Execute the insert query for training_sessions
        if ($stmt_training->execute()) {
            // Insert announcement after assigning training
            $announcement_title = $training_title;
            $announcement_description = "You have been assigned a new training session: " . $training_status . ". Please attend as soon as possible.";

            // Insert into announcements table
            $sql_announcement = "INSERT INTO announcements (guide_name, title, description, status) 
                                 VALUES (?, ?, ?, 'Unread')";
            $stmt_announcement = $conn->prepare($sql_announcement);
            $stmt_announcement->bind_param("sss", $username, $announcement_title, $announcement_description);

            if ($stmt_announcement->execute()) {
                echo "<script>alert('Thank you for your feedback! '); window.location.href = 'userHomepage.html';</script>";
            } else {
                echo "Error creating announcement: " . $stmt_announcement->error;
            }
        } else {
            echo "Error assigning training: " . $stmt_training->error;
        }
    } else {
        echo "Error: No guide found with this name.";
    }
}

// Close the connection
$stmt_feedback->close();
if (isset($stmt_training)) {
    $stmt_training->close(); // Close only if initialized
}
if (isset($stmt_announcement)) {
    $stmt_announcement->close(); // Close only if initialized
}
$stmt_guide->close();
$conn->close();
?>
