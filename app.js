// Login function
function login(email, password) {
    auth.signInWithEmailAndPassword(email, password)
      .then((userCredential) => {
        const uid = userCredential.user.uid;
        db.collection("users").doc(uid).get()
          .then(doc => {
            if (doc.exists) {
              const role = doc.data().role;
              if (role === "admin") {
                window.location.href = "adminHomepage.html";
              } else {
                window.location.href = "parkGuideHomepage.html";
              }
            } else {
              alert("Role not defined.");
            }
          });
      })
      .catch(error => alert(error.message));
  }
  
  // Register function (admin only)
  function register(email, password, role) {
    auth.createUserWithEmailAndPassword(email, password)
      .then(userCred => {
        const uid = userCred.user.uid;
        return db.collection("users").doc(uid).set({
          email: email,
          role: role,
          createdAt: new Date()
        });
      })
      .then(() => {
        alert("User created successfully!");
        document.getElementById('registerForm').reset();
      })
      .catch(error => alert(error.message));
  }

  
  
  // Expose to HTML
  window.login = login;
  window.register = register;
  