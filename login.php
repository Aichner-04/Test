<?php
ob_start();
session_start();

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database config
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "e_office";

// Connect
$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get submitted data
$role = $_POST['role'] ?? '';
$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Basic check
if (empty($role) || empty($username) || empty($email) || empty($password)) {
    die("❌ All fields are required.");
}

// Pick the table based on role
if ($role === 'admin') {
    $sql = "SELECT * FROM users WHERE role = 'admin' AND username = ? AND email = ?";
} elseif ($role === 'parkguide') {
    $sql = "SELECT * FROM park_guides WHERE username = ? AND email = ?";
} else {
    die("❌ Invalid role.");
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // DEBUG: Uncomment to test what was fetched
    // echo "<pre>"; print_r($user); exit;  // This will show you the fetched data

    if (password_verify($password, $user['password'])) {
        // Setting session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $role;

        // Show the welcome popup message based on role before redirecting
        echo "<script>
                alert('Welcome " . ucfirst($role) . "! You have successfully logged in.');
                window.location.href = '" . ($role === 'admin' ? 'adminHomepage.php' : 'parkGuideHomepage.php') . "';
              </script>";
        exit; // Stop further execution
    } else {
        // Show incorrect password popup and redirect to e-office.html
        echo "<script>
                alert('❌ Incorrect password.');
                window.location.href = 'e-office.html';
              </script>";
        exit; // Stop further execution
    }
} else {
    // Show no matching user found popup and redirect to e-office.html
    echo "<script>
            alert('❌ No matching user found.');
            window.location.href = 'e-office.html';
          </script>";
    exit; // Stop further execution
}

$stmt->close();
$conn->close();
ob_end_flush();
?>
