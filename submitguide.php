<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_office";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$full_name = $_POST['full_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$raw_password = $_POST['password']; // Raw password from form

// Hash the password before inserting into the database
$hashed_password = password_hash($raw_password, PASSWORD_DEFAULT); // Hash the password securely

$phone = $_POST['phone'];
$dob = $_POST['dob'];
$employment_date = $_POST['employment_date'];
$languages = isset($_POST['languages']) ? implode(", ", $_POST['languages']) : '';
$experience = $_POST['experience'];
$specialties = $_POST['specialties'];

// First, Insert into `park_guides` table (Park Guide Data)
$park_guides_sql = "INSERT INTO park_guides (full_name, username,password, email, phone, dob, employment_date, languages, experience, specialties) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt_park_guide = $conn->prepare($park_guides_sql);
$stmt_park_guide->bind_param("ssssssssss", $full_name, $username, $hashed_password,$email, $phone, $dob, $employment_date, $languages, $experience, $specialties);

if (!$stmt_park_guide->execute()) {
    echo "Error inserting into park_guides: " . $stmt_park_guide->error;
    exit; // Exit if park guide insert fails
}

// Insert into `users` table for login (hashed password)
$users_sql = "INSERT INTO users (role, username, email, password) VALUES ('parkguide', ?, ?, ?)";
$stmt_user = $conn->prepare($users_sql);
$stmt_user->bind_param("sss", $username, $email, $hashed_password); // Use hashed password here

if ($stmt_user->execute()) {
    // After successful registration, you can redirect
    echo '<script type="text/javascript">
            alert("Registration successful!");
            window.location.href = "adminHomepage.php"; // Redirect to admin homepage or park guide dashboard
          </script>';
    exit; // Stop further execution after redirect
} else {
    echo "Error inserting into users table: " . $stmt_user->error;
}

// Close the connections
$stmt_park_guide->close();
$stmt_user->close();
$conn->close();
?>
