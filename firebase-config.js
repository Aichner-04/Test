// Firebase v8 config
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
  
