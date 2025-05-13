<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Park Guide Course Assignment</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="training-schedule-body">
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

    <div class="training-schedule-container">
        <h1>Park Guide Course Assignment</h1>
        
        <div class="training-schedule-card-container">
            <!-- Course Card 1 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">English Course (Online)</h5>
                <p class="training-schedule-card-text">This course focuses on enhancing the English language proficiency of park guides, enabling them to communicate effectively with international visitors and provide a high-quality, informative experience.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Monday, 3:00 PM - 5:00 PM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown1')">Assign Course</button>
                <div class="training-schedule-status-indicator">
    <small class="text-muted" id="status1">
        <?php
        // Fetch the assigned guides for course ID 1
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 1";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>
    </small>
</div>

<!-- Dropdown List to Assign Course -->
<div id="dropdown1" class="dropdown-list" style="display: none;">
    <form action="assign_course.php" method="POST">
        <select multiple name="guide_usernames[]">
            <?php
            // Fetch all park guides for assignment
            $sql = "SELECT username FROM park_guides";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
            }
            ?>
        </select>
        <!-- Hidden input for course_id -->
        <input type="hidden" name="course_id" value="1">  <!-- Course ID for English Course -->
        <button type="submit" class="btn btn-success">Assign Selected Guides</button>
    </form>
</div>
         
                </div>
            </div>

            <!-- Course Card 2 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Malay Course (Online)</h5>
                <p class="training-schedule-card-text">Aimed at improving the Malay language skills of guides, this course helps ensure effective communication with local visitors, enhancing the cultural experience and making the guides more accessible to a diverse audience.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Monday, 5:00 PM - 7:00 PM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown2')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status2">
                        <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 2";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?></small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown2" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="2">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 3 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Chinese Course (Online)</h5>
                <p class="training-schedule-card-text">This course trains guides to communicate with Chinese-speaking tourists, covering basic conversational skills and relevant vocabulary to help enhance the experience for this specific visitor group.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Wednesday, 5:00 PM - 7:00 PM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown3')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status3">
                    <?php
       
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 3";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>

                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown3" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="3">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 4 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Park History and Geography</h5>
                <p class="training-schedule-card-text">Guides will learn about the park’s origins, significant historical events, geographical features, and notable landmarks, helping them provide context and enrich the visitor experience with local history and natural wonders.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Tuesday, 3:00 PM - 6:00 PM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown4')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status4">
                    <?php
      
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 4";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>
                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown4" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="4">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 5 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Nature Walk Training</h5>
                <p class="training-schedule-card-text">This training teaches guides how to lead informative nature walks in an interactive and engaging way.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Tuesday, 8:00 AM - 11:00 AM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown5')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status5">
                    <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 5";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>
                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown5" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="5">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>
        
            <!-- Course Card 6 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Bird Watching Training</h5>
                <p class="training-schedule-card-text">Guides will be introduced to various bird species in the park, learning identification techniques, behaviors, and how to enhance the bird-watching experience for visitors by sharing interesting facts about the park’s avian population.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Wednesday, 8:00 AM - 11:00 AM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p></p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown6')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status6">
                    <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 6";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>
                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown6" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="6">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 7 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Orang Utan Caregiving Training</h5>
                <p class="training-schedule-card-text">Focused on the care and rehabilitation of orangutans, this course teaches guides about orangutan behavior, habitat preservation, and how to safely and responsibly educate visitors about these endangered species.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Wednesday, 2:00 PM - 5:00 PM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown7')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status7">
                    <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 7";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>
                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown7" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="7">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 8 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Wildlife Conservation and Protection</h5>
                <p class="training-schedule-card-text">Guides will gain an understanding of wildlife conservation practices, endangered species protection, and the role of park guides in educating visitors about the importance of preserving biodiversity.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Thursday, 8:00 AM - 11:00 AM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown8')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status8">
                    <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 8";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>

                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown8" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="8">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 9 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Flora and Fauna Identification</h5>
                <p class="training-schedule-card-text">This course teaches park guides how to identify and classify different plant and animal species within the park.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Monday, 8:00 AM - 11:00 AM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown9')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status9">
                    <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 9";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>
                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown9" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="9">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 10 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Environmental Sustainability Practices</h5>
                <p class="training-schedule-card-text">Guides will be trained in sustainable practices that minimize environmental impact, such as waste management, water conservation, and eco-friendly tourism practices, allowing them to advocate for and implement sustainable practices in their daily work.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Thursday, 2:00 PM - 5:00 PM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown10')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status10">
                    <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 10";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>

                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown10" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="10">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 11 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Ecotourism Principles</h5>
                <p class="training-schedule-card-text">This course introduces park guides to the principles of ecotourism, emphasizing the importance of preserving natural resources while providing visitors with an educational and environmentally responsible experience.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Friday, 8:00 AM - 11:00 AM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown11')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status11">
                    <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 11";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>
                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown11" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="11">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 12 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Visitor Engagement and Communication Skills</h5>
                <p class="training-schedule-card-text">Park guides will learn how to engage visitors, handle diverse groups, provide effective storytelling, and deliver information in an interactive, friendly, and engaging manner that promotes learning and enjoyment.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Friday, 2:00 PM - 5:00 PM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown12')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status12">
                    <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 12";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>

                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown12" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="12">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 13 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">Survival Skills and Emergency Response</h5>
                <p class="training-schedule-card-text">Guides will be trained in essential survival skills, including first aid, navigation, shelter building, and how to respond to emergencies in the park, ensuring they can manage and assist in emergency situations safely.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Saturday, 2:00 PM - 5:00 PM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown13')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status13">
                    <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 13";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>

                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown13" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="13">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>

            <!-- Course Card 14 -->
            <div class="training-schedule-course-card">
                <div class="training-schedule-card-body">
                <h5 class="training-schedule-card-title">First Aid Training</h5>
                <p class="training-schedule-card-text">This course covers basic first aid skills, teaching park guides how to recognize and respond to medical emergencies, perform CPR, and manage injuries or accidents while on tours.</p>
                <p class="training-schedule-card-text"><strong>Schedule:</strong> Saturday, 9:00 AM - 12:00 PM</p>
                <p class="training-schedule-card-text"><strong>Duration:</strong> 3 hours</p>
                <button class="btn btn-primary training-schedule-btn" onclick="toggleDropdown('dropdown14')">Assign Course</button>
                <div class="training-schedule-status-indicator">
                    <small class="text-muted" id="status14">
                    <?php
        $conn = new mysqli("localhost", "root", "", "e_office");
        $sql = "SELECT username FROM guide_courses WHERE course_id = 14";  // Adjust course_id if necessary
        $result = $conn->query($sql);

        $assigned_guides = [];
        while ($row = $result->fetch_assoc()) {
            $assigned_guides[] = $row['username'];
        }

        // Display the assigned guides or 'Not Assigned' if none
        if ($assigned_guides) {
            echo 'Assigned to: ' . implode(", ", $assigned_guides);
        } else {
            echo 'Not Assigned';
        }
        ?>

                    </small>
                </div>
                <!-- Dropdown List -->
                <div id="dropdown14" class="dropdown-list" style="display: none;">
                <form action="assign_course.php" method="POST">
                            <select multiple name="guide_usernames[]">
                                <!-- PHP to fetch park guides -->
                                <?php
                                $conn = new mysqli("localhost", "root", "", "e_office");
                                $sql = "SELECT username FROM park_guides";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Hidden input for course_id -->
                            <input type="hidden" name="course_id" value="14">  
                            <button type="submit" class="btn btn-success">Assign Selected Guides</button>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown(dropdownId) {
            var dropdown = document.getElementById(dropdownId);
            // Toggle the display of the dropdown list
            dropdown.style.display = (dropdown.style.display === "none" || dropdown.style.display === "") ? "block" : "none";
        }

        function assignCourse(selectId, statusId) {
            var selectElement = document.getElementById(selectId);
            var selectedOptions = selectElement.selectedOptions;
            var assignedGuides = [];
                
            // Collect the selected park guides
            for (var i = 0; i < selectedOptions.length; i++) {
                assignedGuides.push(selectedOptions[i].text);
            }
                
            // Update the status message with the selected guides
            var status = document.getElementById(statusId);
            if (assignedGuides.length > 0) {
                status.textContent = "Assigned to: " + assignedGuides.join(", ");
            } else {
                status.textContent = "Not Assigned";
            }
        }
    </script>
    <script src="scripts2.js"></script>
</body>

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
</html>
