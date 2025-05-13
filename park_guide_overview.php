<?php 
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_office"; // Adjust this if necessary

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the number of active guides
$sql_active_guides = "SELECT COUNT(*) AS active_guides FROM park_guides WHERE status = 'active'";
$result_active_guides = $conn->query($sql_active_guides);

// Fetch the result
$active_guides = 0;
if ($result_active_guides->num_rows > 0) {
    $row = $result_active_guides->fetch_assoc();
    $active_guides = $row['active_guides'];
}

// Query to get the number of expired certificates
$sql_expired_certs = "SELECT COUNT(*) AS expired_certs FROM guide_certifications WHERE cert_expiry < CURDATE()";
$result_expired_certs = $conn->query($sql_expired_certs);

// Fetch the result
$expired_certs = 0;
if ($result_expired_certs->num_rows > 0) {
    $row = $result_expired_certs->fetch_assoc();
    $expired_certs = $row['expired_certs'];
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Park Guide Overview</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
<header>
        <div class="header-container">
            <div class="mobile-nav-toggle">
                <i class="fas fa-bars"></i>
            </div>
                <img class="logo" src="images/SFC_logo.jpg" alt="Sarawak Forestry Logo">
              </a>
            <nav class="desktop-nav">
                <ul class="menu">
                    <li><a href="adminHomepage.html"><i class="fas fa-home"></i> Home</a></li>
                    <li class="dropdown">
                        <a href="#"><i class="fas fa-globe"></i> Register Form<i class="fas fa-chevron-down dropdown-icon"></i></a>
                        <ul class="dropdown-menu">
                          <li><a href="signup.html" target="_blank" rel="noopener"><i class="fas fa-chevron-right"></i> Sign Up Park Guides</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><i class="fas fa-map"></i> Timetable <i class="fas fa-chevron-down dropdown-icon"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="trainingSchedule2.html"><i class="fas fa-chevron-right"></i> Fixed Training Schedule for New Park Guide</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><i class="fas fa-map"></i> Assign <i class="fas fa-chevron-down dropdown-icon"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="trainingSchedule.php"><i class="fas fa-chevron-right"></i> Courses</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><i class="fas fa-calendar"></i> Park Guide Info <i class="fas fa-chevron-down dropdown-icon"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="park_guide_overview.php"><i class="fas fa-chevron-right"></i> Overview</a></li>
                            <li><a href="park_guide_basic_info.php"><i class="fas fa-chevron-right"></i> Basic Info</a></li>
                            <li><a href="displayUserFeedback.php"><i class="fas fa-chevron-right"></i> User Feeback</a></li>
                            <li><a href="course_management.php"><i class="fas fa-chevron-right"></i> Course Management</a></li>
                            <li><a href="view_cert.php"><i class="fas fa-chevron-right"></i> Certification Management</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <a class="cta" href="userHomepage.html"><button><i class="far fa-user"></i> Logout</button></a>
        </div>
    </header>
    
    <!-- Mobile Sidebar -->
    <div class="sidebar-overlay"></div>
    <aside class="sidebar">
    <div class="sidebar-header">
        <img src="images/SFC_logo.jpg" alt="Logo" class="logo">
        <span class="brand-name">Semenggoh Wildlife</span>
        <button class="close-sidebar"><i class="fas fa-times"></i></button>
    </div>
    
    <div class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Search...">
    </div>
    
    <ul class="sidebar-menu">
        <li class="sidebar-item active">
            <a href="adminHomepage.php"><i class="fas fa-home"></i> <span>Home</span></a>
        </li>
        <li class="sidebar-item dropdown">
            <a href="#"><i class="fas fa-globe"></i> <span>Register Form</span> <i class="fas fa-chevron-down dropdown-icon"></i></a>
            <ul class="dropdown-menu">
                <li><a href="parkGuideSignUpForm.html" target="_blank" rel="noopener"><i class="fas fa-chevron-right"></i> Sign Up Park Guides</a></li>
            </ul>
        </li>
        <li class="sidebar-item dropdown">
            <a href="#"><i class="fas fa-map"></i> <span>Timetable</span> <i class="fas fa-chevron-down dropdown-icon"></i></a>
            <ul class="dropdown-menu">
                <li><a href="trainingSchedule2.html"><i class="fas fa-chevron-right"></i> Fixed Training Schedule for New Park Guide</a></li>
            </ul>
        </li>
        <li class="sidebar-item dropdown">
            <a href="#"><i class="fas fa-map"></i> <span>Assign</span> <i class="fas fa-chevron-down dropdown-icon"></i></a>
            <ul class="dropdown-menu">
                <li><a href="trainingSchedule.php"><i class="fas fa-chevron-right"></i> Courses</a></li>
            </ul>
        </li>
        <li class="sidebar-item dropdown">
            <a href="#"><i class="fas fa-calendar"></i> <span>Park Guide Info</span> <i class="fas fa-chevron-down dropdown-icon"></i></a>
            <ul class="dropdown-menu">
                <li><a href="park_guide_overview.php"><i class="fas fa-chevron-right"></i> Overview</a></li>
                <li><a href="park_guide_basic_info.php"><i class="fas fa-chevron-right"></i> Basic Info</a></li>
                <li><a href="displayUserFeedback.php"><i class="fas fa-chevron-right"></i> User Feeback</a></li>
                <li><a href="course_management.php"><i class="fas fa-chevron-right"></i> Course Management</a></li>
                <li><a href="view_cert.php"><i class="fas fa-chevron-right"></i> Certification Management</a></li>

            </ul>
        </li>
    </ul>
    <div class="sidebar-footer">
        <div class="theme-toggle">
            <i class="fas fa-moon"></i> Dark Mode
        </div>
        <a class="btn-signin" href="userHomepage.html"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    </aside>

<!-- Overview Section -->
<div class="training-schedule2-container">
    <h1>Park Guide Overview</h1>
</div>
<div class="park-guide-overview-box">
    <h2>Active Park Guides</h2>
    <p><?php echo $active_guides; ?></p>
</div>
<div class="park-guide-overview-box2">
    <h2>Expired Certifications</h2>
    <p><?php echo $expired_certs; ?></p>
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
        <li><a href="aboutUs.html"><i class="fas fa-chevron-right"></i> About Us</a></li>
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
<script src="scripts2.js"></script>
</body>
</html>
