// Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyASSss0zkQjM4zIpfBn17yC3QnWy3kwAoY",
  authDomain: "cos30049-project.firebaseapp.com",
  projectId: "cos30049-project",
  storageBucket: "cos30049-project.firebasestorage.app",
  messagingSenderId: "578452647386",
  appId: "1:578452647386:web:2e9eeb81b8bad8ecafa4e3",
  measurementId: "G-7WYNCQP2HH"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
const auth = firebase.auth();

// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("changePasswordForm");
  const message = document.getElementById("message");

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    const newPassword = document.getElementById("newPassword").value;
    const user = auth.currentUser;

    if (!user) {
      message.style.color = "red";
      message.textContent = "❌ You must be signed in to change your password.";
      return;
    }

    if (newPassword.length < 6) {
      message.style.color = "red";
      message.textContent = "❌ Password must be at least 6 characters long.";
      return;
    }

    user.updatePassword(newPassword)
      .then(() => {
        message.style.color = "green";
        message.textContent = "✅ Password updated successfully! Redirecting in 10 seconds...";
        
        // Redirect after 10 seconds
        setTimeout(() => {
          window.location.href = "parkGuideHomepage.html"; // Change to your actual main page path
        }, 10000);
      })
      .catch((error) => {
        message.style.color = "red";
        message.textContent = `❌ ${error.message}`;
      });
  });
});
