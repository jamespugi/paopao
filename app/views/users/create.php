<?php
// signup.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';

    // ✅ Here you can insert the data into your database
    // Example (adjust to your DB):
    /*
    include 'db.php';
    $stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    $stmt->execute([$username, $email]);
    */

    // ✅ After saving, redirect to index.php
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Background gradient animation */
    @keyframes gradientAnimation {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    body {
      background: linear-gradient(-45deg, #3b82f6, #8b5cf6, #6366f1, #7c3aed);
      background-size: 400% 400%;
      animation: gradientAnimation 12s ease infinite;
    }

    /* Floating animation */
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }
    .floating-card {
      animation: float 6s ease-in-out infinite;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">

  <!-- Card -->
  <div class="floating-card bg-white/90 shadow-2xl rounded-2xl p-8 w-full max-w-md border border-blue-300 backdrop-blur-md">
    <h2 class="text-3xl font-bold text-center text-blue-800 mb-6">Create an Account</h2>

    <!-- ✅ Form -->
    <form action="signup.php" method="POST" class="space-y-5">

      <!-- Username -->
      <div>
        <label class="block text-blue-900 mb-2 font-medium">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required
               class="w-full px-4 py-2 border border-blue-400 rounded-lg bg-blue-50 text-blue-900 
                      focus:ring-2 focus:ring-blue-500 focus:border-blue-600 outline-none transition">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-blue-900 mb-2 font-medium">Email</label>
        <input type="email" name="email" placeholder="Enter email" required
               class="w-full px-4 py-2 border border-blue-400 rounded-lg bg-blue-50 text-blue-900 
                      focus:ring-2 focus:ring-blue-500 focus:border-blue-600 outline-none transition">
      </div>

      <!-- Submit -->
      <button type="submit" 
              class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold shadow-md 
                     hover:bg-blue-700 hover:shadow-lg hover:scale-105 transition transform">
        Sign Up
      </button>
    </form>

    <p class="mt-6 text-sm text-center text-blue-800">
      Already have an account? 
      <a href="#" class="text-blue-700 font-semibold hover:underline">Log In</a>
    </p>
  </div>

</body>
</html>
