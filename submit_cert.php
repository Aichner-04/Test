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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $full_name = $_POST['full_name'];
    $guide_username = $_POST['username'];  // Park guide username
    $email = $_POST['email'];
    $certifications = $_POST['certifications'];
    $test_marks = $_POST['test_marks'];  // Get the test marks

    // Handle the certification expiry dates as an array and convert it to a string
    $cert_expiry = isset($_POST['cert_expiry']) ? implode(",", $_POST['cert_expiry']) : '';

    // Handle file upload
    $uploaded_files = [];
    if (isset($_FILES['cert_files']) && count($_FILES['cert_files']['name']) > 0) {
        $total_files = count($_FILES['cert_files']['name']);
        for ($i = 0; $i < $total_files; $i++) {
            // Get the file path
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['cert_files']['name'][$i]);

            // Check if file is a valid image or pdf
            if (move_uploaded_file($_FILES['cert_files']['tmp_name'][$i], $target_file)) {
                // Add uploaded file to array
                $uploaded_files[] = $target_file;
            }
        }
    }
    
    // Convert uploaded file paths to a string
    $cert_files = implode(",", $uploaded_files);

    // Prepare and execute the insert query for the certification
    $sql = "INSERT INTO guide_certifications (full_name, username, email, certifications, cert_expiry, cert_files, test_marks) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";  // Added test_marks to query
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssss", $full_name, $guide_username, $email, $certifications, $cert_expiry, $cert_files, $test_marks);  // Added test_marks to bind
        
        // Execute the statement and check if successful
        if ($stmt->execute()) {
            // Certification insert was successful, now handle notification insertion
            $expiry_date = strtotime($cert_expiry);
            $status = 'unread';  // Default status for a notification (new, unread)

            if ($expiry_date && $expiry_date < time()) {
                // Certification expired, send a notification
                $message = "Your certification '$certifications' has expired. Please renew it as soon as possible. Expiry Date: " . date('Y-m-d', $expiry_date);
                $status = 'expired';  // Use 'expired' status for expired certification
            } else {
                // Certification is still valid
                $message = "Your certification '$certifications' is valid and up to date. Expiry Date: " . date('Y-m-d', $expiry_date);
                $status = 'valid';  // Set status as 'valid' if certification is still active
            }
            
            // Insert the notification into the notifications table
            $notif_sql = "INSERT INTO notifications (guide_username, message, status) VALUES (?, ?, ?)";
            if ($notif_stmt = $conn->prepare($notif_sql)) {
                $notif_stmt->bind_param("sss", $guide_username, $message, $status);
                $notif_stmt->execute();
                $notif_stmt->close();
            }

            // Redirect to admin homepage with an alert on success
            echo '<script type="text/javascript">
                    alert("Form submitted successfully!");
                    window.location.href = "parkGuideHomepage.php";  // Redirect to admin homepage
                  </script>';
            exit; // Stop further execution after redirect
        } else {
            // If form insertion fails, show error
            echo "Error inserting into guide_certifications table: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
