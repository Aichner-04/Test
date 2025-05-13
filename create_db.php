<?php
// Set the servername, username, and password
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    error_log("Connection failed: " . mysqli_connect_error()); // Log error
    die("Connection failed: Unable to connect to the database.");
}

// Sanitize the database name to ensure it only contains alphanumeric characters and underscores
$databaseName = "e_office"; // Hardcoded for simplicity, sanitize dynamically if needed
if (!preg_match('/^[a-zA-Z0-9_]+$/', $databaseName)) {
    error_log("Invalid database name provided.");
    die("Invalid database name.");
}

// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS `$databaseName`";

if (mysqli_query($conn, $sql)) {
    echo "Database '$databaseName' created or selected successfully.<br>";
} else {
    // Log the error and provide a generic error message
    error_log("Error creating database: " . mysqli_error($conn));
    echo "Error creating database. Please try again later.";
}

// Select the created or existing database
if (!mysqli_select_db($conn, $databaseName)) {
    error_log("Error selecting database: " . mysqli_error($conn));
    die("Error selecting the database.");
}

// Helper function to handle query execution and error logging
function executeQuery($conn, $sql) {
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        error_log("SQL error: " . mysqli_error($conn) . " Query: $sql");
        return false;
    }
}

// Create the `user_feedback` table
$sql = "CREATE TABLE IF NOT EXISTS user_feedback (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    guide_name VARCHAR(255) NOT NULL,
    bm_rating INT(11) NOT NULL,
    eng_rating INT(11) NOT NULL,
    chi_rating INT(11) NOT NULL,
    knowledge_feedback TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (executeQuery($conn, $sql)) {
    echo "Table 'user_feedback' created successfully.<br>";
} else {
    echo "Error creating table 'user_feedback'. Please try again later.<br>";
}

// Create the `users` table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    role ENUM('admin', 'parkguide') NOT NULL,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (executeQuery($conn, $sql)) {
    echo "Table 'users' created successfully.<br>";
} else {
    echo "Error creating table 'users'. Please try again later.<br>";
}

// Create the `training_sessions` table
$sql = "CREATE TABLE IF NOT EXISTS training_sessions (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    guide_name VARCHAR(255) NOT NULL,
    training_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    training_status VARCHAR(20) NOT NULL,
    training_title VARCHAR(255) DEFAULT NULL
)";
if (executeQuery($conn, $sql)) {
    echo "Table 'training_sessions' created successfully.<br>";
} else {
    echo "Error creating table 'training_sessions'. Please try again later.<br>";
}

// Create the `park_guides` table
$sql = "CREATE TABLE IF NOT EXISTS park_guides (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    dob DATE DEFAULT NULL,
    employment_date DATE NOT NULL,
    languages TEXT DEFAULT NULL,
    experience INT(11) DEFAULT NULL,
    specialties TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (executeQuery($conn, $sql)) {
    echo "Table 'park_guides' created successfully.<br>";
} else {
    echo "Error creating table 'park_guides'. Please try again later.<br>";
}

// Create the `notifications` table
$sql = "CREATE TABLE IF NOT EXISTS notifications (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    guide_username VARCHAR(255) DEFAULT NULL,
    message TEXT DEFAULT NULL,
    status ENUM('valid', 'expired') DEFAULT 'valid',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (executeQuery($conn, $sql)) {
    echo "Table 'notifications' created successfully.<br>";
} else {
    echo "Error creating table 'notifications'. Please try again later.<br>";
}

// Create the `guide_courses` table
$sql = "CREATE TABLE IF NOT EXISTS guide_courses (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) DEFAULT NULL,
    course_id INT(11) DEFAULT NULL
)";
if (executeQuery($conn, $sql)) {
    echo "Table 'guide_courses' created successfully.<br>";
} else {
    echo "Error creating table 'guide_courses'. Please try again later.<br>";
}

// Create the `guide_certifications` table
$sql = "CREATE TABLE IF NOT EXISTS guide_certifications (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    certifications TEXT NOT NULL,
    cert_expiry DATE DEFAULT NULL,
    cert_files VARCHAR(255) DEFAULT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (executeQuery($conn, $sql)) {
    echo "Table 'guide_certifications' created successfully.<br>";
} else {
    echo "Error creating table 'guide_certifications'. Please try again later.<br>";
}

// Create the `courses` table
$sql = "CREATE TABLE IF NOT EXISTS courses (
    course_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    course_description TEXT NOT NULL
)";
if (executeQuery($conn, $sql)) {
    echo "Table 'courses' created successfully.<br>";
} else {
    echo "Error creating table 'courses'. Please try again later.<br>";
}

// Insert the courses values
$courses = [
    ["English Course", "Enhance English skills for guides to communicate effectively."],
    ["Malay Course", "Improve Malay language skills for guides to communicate effectively."],
    ["Chinese Course", "This course trains guides to communicate with Chinese-speaking visitors."],
    ["Park History and Geography", "Guides will learn about the park’s origins, significance, and history."],
    ["Nature Walk Training", "This training teaches guides how to lead informative nature walks."],
    ["Bird Watching Training", "Guides will be introduced to various bird species in the park."],
    ["Orang Utan Caregiving Training", "Focused on the care and rehabilitation of orangutans."],
    ["Wildlife Conservation and Protection", "Guides will gain an understanding of wildlife conservation efforts."],
    ["Flora and Fauna Identification", "This course teaches park guides how to identify animal and plant species."],
    ["Environmental Sustainability Practices", "Guides will be trained in sustainable practices for park operations."],
    ["Ecotourism Principles", "This course introduces park guides to the principles of ecotourism."],
    ["Visitor Engagement and Communication Skills", "Guides will learn how to engage visitors, handle inquiries, and ensure an enriching experience."],
    ["Survival Skills and Emergency Response", "Guides will be trained in essential survival skills and emergency response procedures."],
    ["First Aid Training", "This course covers basic first aid skills, teaching guides how to assist injured individuals."]
];

// Prepare the insert query once
$stmt = mysqli_prepare($conn, "INSERT INTO courses (course_name, course_description) VALUES (?, ?)");

foreach ($courses as $course) {
    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ss", $course_name, $course_description);
    
    // Assign values
    $course_name = $course[0];
    $course_description = $course[1];

    // Execute the query and check for success
    if (mysqli_stmt_execute($stmt)) {
        echo "Course '$course_name' inserted successfully.<br>";
    } else {
        error_log("Error inserting course '$course_name': " . mysqli_error($conn));
        echo "Error inserting course '$course_name'. Please try again later.<br>";
    }
}

// Close the prepared statement
mysqli_stmt_close($stmt);

// Create the `announcements` table
$sql = "CREATE TABLE IF NOT EXISTS announcements (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    guide_name VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    status ENUM('Unread', 'Read') DEFAULT 'Unread',
    related_training_session_id INT(11) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (executeQuery($conn, $sql)) {
    echo "Table 'announcements' created successfully.<br>";
} else {
    echo "Error creating table 'announcements'. Please try again later.<br>";
}

// Close the connection when done
mysqli_close($conn);
?>

