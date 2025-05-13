<?php
// Start the session to get the logged-in park guide's username
session_start();

// Assuming the guide's username is stored in the session after login
$guide_username = $_SESSION['username'];  // Retrieve the logged-in guide's username

// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "e_office"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the assigned courses for the logged-in guide
$sql = "SELECT c.course_name, c.course_description, c.course_id
        FROM courses c
        JOIN guide_courses gc ON c.course_id = gc.course_id
        WHERE gc.username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $guide_username);  // Bind the guide's username
$stmt->execute();
$result = $stmt->get_result();

// Fetch all the assigned courses for this guide
$assigned_courses = [];
while ($row = $result->fetch_assoc()) {
    $assigned_courses[] = $row;
}

// Close the connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Park Guide | Available Training</title>
  <link rel="stylesheet" href="style3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="training-page">
<header>
    <div class="header-container">
        <div class="mobile-nav-toggle">
            <i class="fas fa-bars"></i>
        </div>
            <img class="logo" src="images/SFC_logo.jpg" alt="Sarawak Forestry Logo">
        <nav class="desktop-nav">
            <ul class="menu">
                <li><a href="parkGuideHomepage.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="dropdown">
                    <a href="#"><i class="fas fa-map"></i> Certificate Renewal Form <i class="fas fa-chevron-down dropdown-icon"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="certAndLicenseAssignForm.html" target="_blank" rel="noopener"><i class="fas fa-chevron-right"></i> Certificate Renewal Form</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><i class="fas fa-globe"></i> Check Status <i class="fas fa-chevron-down dropdown-icon"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="guide_announcement.html"><i class="fas fa-chevron-right"></i> Announcements</a></li>
                      <li><a href="guide_training.php"><i class="fas fa-chevron-right"></i> Available Training</a></li>
                      <li><a href="guide_certifications.html" ><i class="fas fa-chevron-right"></i> Your Certificates</a></li>                          
                    </ul>
                </li>
            </ul>
        </nav>
        <a class="btn-signin" href="userHomepage.html"><i class="fas fa-sign-out-alt"></i> Logout</a>
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
            <a href="parkGuideHomepage.php"><i class="fas fa-home"></i> <span>Home</span></a>
        </li>
        <li class="sidebar-item dropdown">
            <a href="#"><i class="fas fa-globe"></i> <span>Certificate Renewal Form</span> <i class="fas fa-chevron-down dropdown-icon"></i></a>
            <ul class="dropdown-menu">
                <li><a href="certAndLicenseAssignForm.html" target="_blank" rel="noopener"><i class="fas fa-chevron-right"></i> Certificate Renewal Form</a></li>
            </ul>
        </li>
        <li class="sidebar-item dropdown">
            <a href="#"><i class="fas fa-map"></i> <span>Check Status</span> <i class="fas fa-chevron-down dropdown-icon"></i></a>
            <ul class="dropdown-menu">
                <li><a href="guide_announcement.html"><i class="fas fa-chevron-right"></i> Announcements</a></li>
                <li><a href="guide_training.php"><i class="fas fa-chevron-right"></i> Available Training</a></li>
                <li><a href="guide_certifications.html"><i class="fas fa-chevron-right"></i> Your Certificates</a></li>
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

  <!-- Main Content for Park Guide -->
  <main class="pg-training-content">
    <section class="pg-trainings-section">
      <h3 class="pg-section-title">Assigned Trainings</h3>

      <!-- Dynamically inserted training cards here -->
      <div class="pg-trainings-list" id="trainingsContainer">
        <?php if (!empty($assigned_courses)): ?>
          <?php foreach ($assigned_courses as $training): ?>
            <div class="pg-training-card">
              <h4><strong><?php echo $training['course_name']; ?></strong></h4>
              <p><?php echo $training['course_description']; ?></p>
              <a href="training-detail.html?course_id=<?php echo $training['course_id']; ?>" class="pg-enroll-btn">Enrol Now</a>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>You have not been assigned any courses yet.</p>
        <?php endif; ?>
      </div>
    </section> 
  </main>

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
