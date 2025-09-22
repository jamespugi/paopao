<?php
// signup.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';

    // ✅ Insert into DB here
    /*
    include 'db.php';
    $stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    $stmt->execute([$username, $email]);
    */

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
/* Background with gradient */
body {
  font-family: "Poppins", sans-serif;
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  min-height: 100vh;
  margin: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Card styling */
.signup-card {
  background: rgba(255, 255, 255, 0.08);
  border-radius: 18px;
  padding: 30px;
  backdrop-filter: blur(12px);
  box-shadow: 0 6px 25px rgba(0,0,0,0.4);
  max-width: 420px;
  width: 100%;
  color: #e0f2f1;
}

/* Title */
.signup-card h2 {
  text-align: center;
  font-weight: 700;
  font-size: 32px;
  color: #80deea;
  margin-bottom: 25px;
}

/* Labels */
.signup-card label {
  font-weight: 600;
  color: #b2dfdb;
  margin-bottom: 6px;
}

/* Inputs */
.signup-card input {
  background: rgba(255, 255, 255, 0.1);
  border: none;
  color: #fff;
  padding: 12px 15px;
  border-radius: 12px;
  outline: none;
  width: 100%;
  margin-bottom: 18px;
  transition: 0.3s;
}

.signup-card input:focus {
  background: rgba(255, 255, 255, 0.2);
  box-shadow: 0 0 0 2px #26a69a;
}

/* Button */
.signup-card button {
  background: #43a047;
  border: none;
  padding: 14px;
  border-radius: 12px;
  color: white;
  font-weight: 600;
  width: 100%;
  transition: 0.3s;
}

.signup-card button:hover {
  background: #2e7d32;
  transform: translateY(-2px);
}

/* Footer text */
.signup-card p {
  margin-top: 20px;
  font-size: 14px;
  text-align: center;
  color: #b2dfdb;
}

.signup-card a {
  color: #80deea;
  text-decoration: none;
  font-weight: 600;
}

.signup-card a:hover {
  text-decoration: underline;
}
  </style>
</head>
<body>

  <div class="signup-card">
    <h2>Create an Account</h2>

    <!-- Form -->
    <form action="" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required>
      </div>

      <button type="submit">Sign Up</button>
    </form>

    <p>
      Already have an account? 
      <a href="login.php">Log In</a>
    </p>
  </div>

</body>
</html>
