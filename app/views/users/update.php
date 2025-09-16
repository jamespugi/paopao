<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Record</title>
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

    /* Glow effect for button */
    .glow-btn:hover {
      box-shadow: 0 0 20px rgba(59,130,246,0.7), 0 0 30px rgba(139,92,246,0.6);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">

  <!-- Card -->
  <div class="floating-card bg-white/20 backdrop-blur-md shadow-2xl rounded-2xl p-8 w-full max-w-md border border-white/30">
    <h2 class="text-3xl font-extrabold text-center text-white mb-6 tracking-wide drop-shadow-lg">
      ✨ Update Record ✨
    </h2>

    <!-- ✅ Update Form -->
    <form action="<?= site_url('users/update/' . segment(4)); ?>" method="POST" class="space-y-5">

      <!-- Username -->
      <div>
        <label class="block text-white mb-2 font-medium">Username</label>
        <input type="text" id="username" name="username"  
               value="<?= html_escape($user['username']); ?>" required
               class="w-full px-4 py-2 border border-blue-300 rounded-lg bg-white/30 text-white placeholder-gray-200
                      focus:ring-2 focus:ring-blue-400 focus:border-blue-500 outline-none transition">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-white mb-2 font-medium">Email</label>
        <input type="email" name="email" 
               value="<?= html_escape($user['email']); ?>" required
               class="w-full px-4 py-2 border border-blue-300 rounded-lg bg-white/30 text-white placeholder-gray-200
                      focus:ring-2 focus:ring-blue-400 focus:border-blue-500 outline-none transition">
      </div>

      <!-- Submit -->
      <button type="submit" 
              class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold shadow-md transition transform hover:scale-105 glow-btn">
        🚀 Update
      </button>
    </form>
  </div>

</body>
</html>
