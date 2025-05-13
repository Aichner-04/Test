// Firebase config
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
const db = firebase.firestore();

// Register form handler
document.getElementById("registerForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const role = document.getElementById("role").value;
  const message = document.getElementById("message");

  message.textContent = "";
  message.style.color = "red";

  // Validation
  if (password !== confirmPassword) {
    message.textContent = "❌ Passwords do not match.";
    return;
  }

  if (!role) {
    message.textContent = "❌ Please select a role.";
    return;
  }

  // Create user in Firebase Auth
  auth.createUserWithEmailAndPassword(email, password)
    .then((userCredential) => {
      const uid = userCredential.user.uid;
      return db.collection("users").doc(uid).set({
        email: email,
        role: role,
        createdAt: firebase.firestore.FieldValue.serverTimestamp()
      });
    })
    .then(() => {
      message.style.color = "green";
      message.textContent = `✅ User registered as ${role}. Redirecting to main page in 10 seconds...`;

      // Reset form
      document.getElementById("registerForm").reset();

      // Redirect after 10 seconds
      setTimeout(() => {
        window.location.href = "adminHomepage.html"; // Change to your actual main page path
      }, 10000);
    })
    .catch((error) => {
      message.textContent = `❌ ${error.message}`;
    });
});
