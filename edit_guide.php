<?php
// Start the session
session_start();

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

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $guide_id = $_GET['id'];

    // Prepare statement to prevent SQL Injection
    $stmt = $conn->prepare("SELECT * FROM park_guides WHERE id = ?");
    $stmt->bind_param("i", $guide_id); // "i" denotes the parameter is an integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $guide = $result->fetch_assoc();
    } else {
        echo "No guide found.";
        exit;
    }

    $stmt->close();
} else {
    echo "Guide ID not provided.";
    exit;
}


if (isset($_POST['submit'])) {
    // Collect and sanitize inputs as needed
    $guide_id = $_POST['id']; // make sure it's from a trusted source
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $employment_date = $_POST['employment_date'];
    $languages = $_POST['languages'];
    $experience = $_POST['experience'];
    $specialties = $_POST['specialties'];

    // Use a prepared statement
    $stmt = $conn->prepare("UPDATE park_guides 
                            SET full_name = ?, 
                                username = ?, 
                                email = ?, 
                                phone = ?, 
                                dob = ?, 
                                employment_date = ?, 
                                languages = ?, 
                                experience = ?, 
                                specialties = ?
                            WHERE id = ?");
    
    $stmt->bind_param("sssssssssi", 
                      $full_name, $username, $email, $phone, $dob, 
                      $employment_date, $languages, $experience, $specialties, $guide_id);
    
    if ($stmt->execute()) {
        echo "Park guide details updated successfully.";
        header('Location: displayUserFeedback.php');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}


<!-- HTML Form for editing park guide details -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Park Guide</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="admin-homepage-body">
    <header>
        <div class="header-container">
            <div class="mobile-nav-toggle">
                <i class="fas fa-bars"></i>
            </div>
                <img class="logo" src="images/SFC_logo.jpg" alt="Sarawak Forestry Logo">
              </a>
            <nav class="desktop-nav">
                <ul class="menu">
                    <li><a href="adminHomepage.php"><i class="fas fa-home"></i> Home</a></li>
                    <li class="dropdown">
                        <a href="#"><i class="fas fa-globe"></i> Register <i class="fas fa-chevron-down dropdown-icon"></i></a>
                        <ul class="dropdown-menu">
                          <li><a href="parkGuideSignUpForm.html" target="_blank" rel="noopener"><i class="fas fa-chevron-right"></i> Sign Up Park Guides</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><i class="fas fa-map"></i> Training Schedule <i class="fas fa-chevron-down dropdown-icon"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="trainingSchedule2.html"><i class="fas fa-chevron-right"></i> Park Guide Training Schedule</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><i class="fas fa-map"></i> Assign <i class="fas fa-chevron-down dropdown-icon"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="trainingSchedule.php"><i class="fas fa-chevron-right"></i> Courses</a></li>
                            <li><a href="certAndLicenseAssignForm.html" target="_blank" rel="noopener"><i class="fas fa-chevron-right"></i> Certificates and Licenses</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><i class="fas fa-calendar"></i> Track <i class="fas fa-chevron-down dropdown-icon"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="view_cert.php"><i class="fas fa-chevron-right"></i> Park Guides Certificates and Licenses</a></li>
                            <li><a href="displayUserFeedback.php"><i class="fas fa-chevron-right"></i> Park Guides Performance</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <a class="cta" href="userHomepage.html"><button><i class="far fa-user"></i> Logout</button></a>
        </div>
    </header>

  
<!-- Main content Section -->
<div class="center-container">
    <form class="edit-guide-form" action="edit_guide.php?id=<?php echo $guide_id; ?>" method="POST">
        <h2 class="edit-guide-title">Edit Park Guide Details</h2>

        <label class="edit-guide-label" for="full_name">Full Name:</label>
        <input class="edit-guide-input" type="text" name="full_name" value="<?php echo $guide['full_name']; ?>" required><br>

        <label class="edit-guide-label" for="username">Username:</label>
        <input class="edit-guide-input" type="text" name="username" value="<?php echo $guide['username']; ?>" required><br>

        <label class="edit-guide-label" for="email">Email:</label>
        <input class="edit-guide-input" type="email" name="email" value="<?php echo $guide['email']; ?>" required><br>

        <label class="edit-guide-label" for="phone">Phone:</label>
        <input class="edit-guide-input" type="text" name="phone" value="<?php echo $guide['phone']; ?>" required><br>

        <label class="edit-guide-label" for="dob">Date of Birth:</label>
        <input class="edit-guide-input" type="date" name="dob" value="<?php echo $guide['dob']; ?>" required><br>

        <label class="edit-guide-label" for="employment_date">Employment Date:</label>
        <input class="edit-guide-input" type="date" name="employment_date" value="<?php echo $guide['employment_date']; ?>" required><br>

        <label class="edit-guide-label" for="languages">Languages:</label>
        <textarea class="edit-guide-textarea" name="languages"><?php echo $guide['languages']; ?></textarea><br>

        <label class="edit-guide-label" for="experience">Experience:</label>
        <input class="edit-guide-input" type="number" name="experience" value="<?php echo $guide['experience']; ?>" required><br>

        <label class="edit-guide-label" for="specialties">Specialties:</label>
        <textarea class="edit-guide-textarea" name="specialties"><?php echo $guide['specialties']; ?></textarea><br>

        <button class="edit-guide-submit" type="submit">Update Details</button>
    </form>
</div>




<!-- Footer Section -->
<footer class="footer">
    <div class="footer-container">
      <div class="footer-section contact-info">
        <h3>CORPORATE OFFICE KUCHING</h3>
        <div class="info-item">
          <i class="fas fa-map-marker-alt"></i>
          <span><strong>Address:</strong> Lot 218, KCLD, Jalan Tapang, Kota Sentosa, 93250 Kuching, Sarawak, Malaysia</span>
        </div>
        <div class="info-item">
          <i class="fas fa-phone-alt"></i>
          <span><strong>Phone:</strong> (+6) 082-610088</span>
        </div>
        <div class="info-item">
          <i class="fas fa-fax"></i>
          <span><strong>Fax:</strong> (+6) 082-610099</span>
        </div>
        <div class="info-item">
          <i class="fas fa-phone-volume"></i>
          <span><strong>Toll-Free:</strong> 1800-88-2526</span>
        </div>
        <div class="info-item">
          <i class="fas fa-envelope"></i>
          <span><strong>Email:</strong> info@sarawakforestry.com</span>
        </div>
      </div>
      <div class="footer-section hours-info">
        <h3>OPERATING HOURS</h3>
        <div class="hours-container">
          <div class="hours-item">
            <div class="day"><i class="fas fa-calendar-day"></i> <strong>Monday-Thursday:</strong></div>
            <div class="time">8:00am - 1:00pm & 2:00pm - 5:00pm</div>
          </div>
          <div class="hours-item">
            <div class="day"><i class="fas fa-calendar-day"></i> <strong>Friday:</strong></div>
            <div class="time">8:00am - 11:45am & 2:15pm - 5:00pm</div>
          </div>
          <div class="hours-item">
            <div class="day"><i class="fas fa-calendar-week"></i> <strong>Saturday, Sunday & Public Holiday:</strong></div>
            <div class="time">Counter closed</div>
          </div>
        </div>
      </div>
      <div class="footer-section quick-links">
        <h3>QUICK LINKS</h3>
        <ul>
          <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Our Services</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Protected Areas</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Wildlife Centers</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
        </ul>
      </div>
      <div class="footer-section social-connect">
        <h3>CONNECT WITH US</h3>
        <p>Stay updated with our latest news and announcements</p>
        <div class="social-icons">
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Sarawak Forestry Corporation. All Rights Reserved.</p>
    </div>
</footer>
</html>
</body>
