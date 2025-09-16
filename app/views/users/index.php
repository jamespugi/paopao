<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: url('paopao.png') no-repeat center center fixed;
      background-size: cover;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">
  <div class="bg-white/90 shadow-2xl rounded-2xl p-6 w-full max-w-5xl border border-blue-300 backdrop-blur-md">
    <h1 class="text-3xl font-bold text-center text-blue-800 mb-6">Welcome to Index View</h1>
    
    <!-- Create Record Button -->
    <div class="flex justify-end mb-4">
      <a href="<?= site_url('/users/create'); ?>"
         class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-blue-700 transition transform hover:scale-105">
        + Create Record
      </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="w-full border border-blue-300 rounded-lg overflow-hidden">
        <thead>
          <tr class="bg-blue-600 text-white">
            <th class="px-4 py-3 text-left">ID</th>
            <th class="px-4 py-3 text-left">Username</th>
            <th class="px-4 py-3 text-left">Email</th>
            <th class="px-4 py-3 text-left">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-blue-200">
          <?php foreach(html_escape($users) as $user): ?>
          <tr class="hover:bg-blue-50 transition">
            <td class="px-4 py-3 text-blue-900"><?= $user['id']; ?></td>
            <td class="px-4 py-3 font-medium text-blue-900"><?= $user['username']; ?></td>
            <td class="px-4 py-3 text-blue-800"><?= $user['email']; ?></td>
            <td class="px-4 py-3 space-x-3 flex">
              <!-- Update Button -->
              <a href="<?= site_url('users/update/'.$user['id']);?>"
                 class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md 
                        hover:bg-blue-600 hover:scale-105 hover:shadow-lg 
                        transition-all duration-300 ease-in-out">
                Update
              </a>

              <!-- Delete Button -->
              <a href="<?= site_url('users/delete/'.$user['id']);?>"
                 class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md 
                        hover:bg-red-600 hover:scale-105 hover:shadow-lg 
                        transition-all duration-300 ease-in-out">
                Delete
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
