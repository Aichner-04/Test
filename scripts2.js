document.addEventListener('DOMContentLoaded', function() {
    // Mobile Sidebar Toggle
    const hamburger = document.querySelector('.mobile-nav-toggle');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('.sidebar-overlay');
    const closeBtn = document.querySelector('.close-sidebar');
    
    hamburger.addEventListener('click', function() {
        sidebar.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
    
    closeBtn.addEventListener('click', function() {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = 'auto';
    });
    
    overlay.addEventListener('click', function() {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = 'auto';
    });
    
    // Mobile Dropdowns
    const dropdowns = document.querySelectorAll('.sidebar-item.dropdown > a');
    
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            e.preventDefault();
            const menu = this.nextElementSibling;
            const icon = this.querySelector('.dropdown-icon');
            
            // Close other dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(otherMenu => {
                if (otherMenu !== menu) {
                    otherMenu.style.maxHeight = null;
                    otherMenu.previousElementSibling.querySelector('.dropdown-icon').classList.remove('rotate');
                }
            });
            
            // Toggle current dropdown
            if (menu.style.maxHeight) {
                menu.style.maxHeight = null;
                icon.classList.remove('rotate');
            } else {
                menu.style.maxHeight = menu.scrollHeight + 'px';
                icon.classList.add('rotate');
            }
        });
    });
    
    // Desktop Dropdowns
    const desktopDropdowns = document.querySelectorAll('.dropdown');
    
    desktopDropdowns.forEach(dropdown => {
        dropdown.addEventListener('mouseenter', function() {
            this.querySelector('.dropdown-menu').style.opacity = '1';
            this.querySelector('.dropdown-menu').style.visibility = 'visible';
            this.querySelector('.dropdown-menu').style.transform = 'translateY(0)';
            this.querySelector('.dropdown-icon').classList.add('rotate');
        });
        
        dropdown.addEventListener('mouseleave', function() {
            this.querySelector('.dropdown-menu').style.opacity = '0';
            this.querySelector('.dropdown-menu').style.visibility = 'hidden';
            this.querySelector('.dropdown-menu').style.transform = 'translateY(10px)';
            this.querySelector('.dropdown-icon').classList.remove('rotate');
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Initialize the slideshow
    let slideIndex = 1;
    showSlides(slideIndex);
    
    // Set up automatic slideshow
    let slideInterval = setInterval(function() {
        plusSlides(1);
    }, 6000); // Change slide every 6 seconds
    
    // Get the slideshow container
    const slideshowContainer = document.querySelector('.slideshow-container');
    
    // Pause the slideshow on hover
    if (slideshowContainer) {
        slideshowContainer.addEventListener('mouseenter', function() {
            clearInterval(slideInterval);
        });
        
        // Resume the slideshow when mouse leaves
        slideshowContainer.addEventListener('mouseleave', function() {
            clearInterval(slideInterval);
            slideInterval = setInterval(function() {
                plusSlides(1);
            }, 6000);
        });
    }
    
    // Make these functions globally available
    window.plusSlides = plusSlides;
    window.currentSlide = currentSlide;
    
    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }
    
    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("slide");
        let dots = document.getElementsByClassName("dot");
        
        if (!slides.length) return; // Exit if no slides are found
        
        // Loop back to the first slide if we've reached the end
        if (n > slides.length) {slideIndex = 1}
        
        // Go to the last slide if we go back from the first slide
        if (n < 1) {slideIndex = slides.length}
        
        // Hide all slides
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        
        // Remove active class from all dots
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        
        // Show the current slide and activate the corresponding dot
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
});


//E-licensing
document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const captchaText = document.getElementById('captchaText');
    const refreshBtn = document.getElementById('refreshCaptcha');
    const loginForm = document.getElementById('loginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const captchaCheck = document.getElementById('captchaCheck');
    const loginBtn = document.getElementById('loginBtn');
    
    // Generate random captcha text
    function generateCaptcha() {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
        let captcha = '';
        for (let i = 0; i < 6; i++) {
            captcha += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return captcha;
    }
    
    // Update captcha text
    function refreshCaptcha() {
        captchaText.textContent = generateCaptcha();
        captchaCheck.checked = false;
    }
    
    // Initialize captcha
    refreshCaptcha();
    
    // Add event listener to refresh button
    refreshBtn.addEventListener('click', refreshCaptcha);
    
    // Form validation
    function validateForm() {
        let isValid = true;
        
        // Validate username
        if (usernameInput.value.trim().length < 3) {
            showError(usernameInput, 'Username must be at least 3 characters');
            isValid = false;
        } else {
            hideError(usernameInput);
        }
        
        // Validate password
        if (passwordInput.value.length < 6) {
            showError(passwordInput, 'Password must be at least 6 characters');
            isValid = false;
        } else {
            hideError(passwordInput);
        }
        
        // Validate captcha checkbox
        if (!captchaCheck.checked) {
            alert('Please confirm you are not a robot');
            isValid = false;
        }
        
        return isValid;
    }
    
    // Show error message
    function showError(input, message) {
        input.classList.add('error');
        const errorElement = input.parentElement.querySelector('.error-message');
        errorElement.textContent = message;
        errorElement.style.display = 'block';
    }
    
    // Hide error message
    function hideError(input) {
        input.classList.remove('error');
        const errorElement = input.parentElement.querySelector('.error-message');
        errorElement.style.display = 'none';
    }
    
    // Form submission
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            // Show loading spinner
            loginBtn.classList.add('loading');
            
            // Simulate login request (replace with actual API call)
            setTimeout(function() {
                // Hide loading spinner
                loginBtn.classList.remove('loading');
                
                // Redirect to dashboard (replace with actual redirection)
                alert('Login successful! Redirecting to dashboard...');
                window.location.href = 'dashboard.html'; // Replace with your dashboard page
            }, 2000);
        }
    });
    
    // Real-time validation
    usernameInput.addEventListener('blur', function() {
        if (this.value.trim().length < 3) {
            showError(this, 'Username must be at least 3 characters');
        } else {
            hideError(this);
        }
    });
    
    passwordInput.addEventListener('blur', function() {
        if (this.value.length < 6) {
            showError(this, 'Password must be at least 6 characters');
        } else {
            hideError(this);
        }
    });
    
    // Password show/hide functionality
    const togglePassword = document.createElement('i');
    togglePassword.className = 'fas fa-eye form-icon';
    togglePassword.style.cursor = 'pointer';
    togglePassword.style.right = '15px';
    togglePassword.style.zIndex = '10';
    
    passwordInput.parentElement.appendChild(togglePassword);
    
    togglePassword.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePassword.className = 'fas fa-eye-slash form-icon';
        } else {
            passwordInput.type = 'password';
            togglePassword.className = 'fas fa-eye form-icon';
        }
    });
    
    // Add animations for feature items
    const featureItems = document.querySelectorAll('.feature-item');
    
    // Create observer for animation on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    
    // Set initial state and observe feature items
    featureItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = `all 0.5s ease ${index * 0.1}s`;
        observer.observe(item);
    });
});

//Feedback Form 
function updateStars(rating, starsContainer) {
    const stars = starsContainer.getElementsByTagName('i');
    for (let i = 0; i < stars.length; i++) {
      stars[i].classList.toggle('active', i < rating);
    }
  }

  document.getElementById('engRating').addEventListener('input', function() {
    updateStars(this.value, document.getElementById('engStars'));
  });
  document.getElementById('bmRating').addEventListener('input', function() {
    updateStars(this.value, document.getElementById('bmStars'));
  });
  document.getElementById('chiRating').addEventListener('input', function() {
    updateStars(this.value, document.getElementById('chiStars'));
  });


  
  