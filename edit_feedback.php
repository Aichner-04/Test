<?php
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

// Check if id is passed in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the feedback record
    $sql = "SELECT * FROM user_feedback WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    // If no record found, redirect
    if (!$row) {
        echo "Record not found.";
        exit();
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guide_name = $_POST['guide_name'];
    $bm_rating = $_POST['bm_rating'];
    $eng_rating = $_POST['eng_rating'];
    $chi_rating = $_POST['chi_rating'];
    $feedback = $_POST['knowledge_feedback'];

    // Update the record in the database
    $update_sql = "UPDATE user_feedback SET guide_name = ?, bm_rating = ?, eng_rating = ?, chi_rating = ?, knowledge_feedback = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssssi", $guide_name, $bm_rating, $eng_rating, $chi_rating, $feedback, $id);

    if ($update_stmt->execute()) {
        echo "Record updated successfully!";
        header("Location: displayUserFeedback.php"); // Redirect after update
        exit();
    } else {
        echo "Error updating record.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Feedback</title>

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
<div class="edit-feedback-container">
    <h2 class="edit-feedback-title">Edit Feedback</h2>

    <form method="POST" action="">
        <label for="guide_name">Guide Name:</label><br>
        <input type="text" name="guide_name" value="<?php echo $row['guide_name']; ?>" required><br><br>

        <label for="bm_rating">BM Rating:</label><br>
        <input type="number" name="bm_rating" value="<?php echo $row['bm_rating']; ?>" required><br><br>

        <label for="eng_rating">English Rating:</label><br>
        <input type="number" name="eng_rating" value="<?php echo $row['eng_rating']; ?>" required><br><br>

        <label for="chi_rating">Chinese Rating:</label><br>
        <input type="number" name="chi_rating" value="<?php echo $row['chi_rating']; ?>" required><br><br>

        <label for="knowledge_feedback">Feedback:</label><br>
        <textarea name="knowledge_feedback" required><?php echo $row['knowledge_feedback']; ?></textarea><br><br>

        <button type="submit">Update Feedback</button>
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
</html>

<?php
$conn->close();
?>
