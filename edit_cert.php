<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_office"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the certificate ID from the URL
$id = $_GET['id'];

// Fetch the certificate data
$sql = "SELECT * FROM guide_certifications WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the record exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Record not found!";
    exit;
}

// Handle the form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $certifications = $_POST['certifications'];
    $cert_expiry = $_POST['cert_expiry'];
    
    // Check if a new file is uploaded
    $uploaded_files = $row['cert_files']; // Keep the old file if no new file is uploaded

    if (isset($_FILES['cert_files']) && $_FILES['cert_files']['name'] != '') {
        $target_dir = "uploads/";
        // Use the correct way to get the file name
        $target_file = $target_dir . basename($_FILES['cert_files']['name']);
        
        // Check if the file was uploaded successfully
        if (move_uploaded_file($_FILES['cert_files']['tmp_name'], $target_file)) {
            $uploaded_files = $target_file;
        } else {
            // Handle upload failure if necessary
            echo "File upload failed!";
            exit;
        }
    }

    // Prepare and execute the update query
    $update_sql = "UPDATE guide_certifications SET full_name = ?, username = ?, email = ?, certifications = ?, cert_expiry = ?, cert_files = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssssi", $full_name, $username, $email, $certifications, $cert_expiry, $uploaded_files, $id);
    $stmt->execute();
    
    // Redirect to the view page after updating
    header("Location: view_cert.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Certifications</title>
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

    
 <!-- Edit  Section -->
    <section class="edit-certificate-container">
    <h2 class="edit-certificate-title">Edit Certificate for <?php echo $row['full_name']; ?></h2>

    <form class="edit-certificate-form" action="edit_cert.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" value="<?php echo $row['full_name']; ?>" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br>

        <label for="email">Email Address:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

        <label for="certifications">Certifications:</label>
        <textarea name="certifications" rows="3" required><?php echo $row['certifications']; ?></textarea><br>

        <label for="cert_expiry">Certification Expiry Date:</label>
        <input type="date" name="cert_expiry" value="<?php echo $row['cert_expiry']; ?>" required><br>

        <label for="cert_files">Upload New Certificate File (Leave blank to keep the existing file):</label>
        <input type="file" name="cert_files[]" accept=".pdf,.jpg,.jpeg,.png"><br>

        <button type="submit">Update Certificate</button>
    </form>
</section>


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

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
