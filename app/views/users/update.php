<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
/* Background with glass effect */
body {
  font-family: "Poppins", sans-serif;
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  min-height: 100vh;
  margin: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  color: #e0f2f1;
}

/* Card */
.update-card {
  background: rgba(255, 255, 255, 0.08);
  border-radius: 18px;
  padding: 35px;
  backdrop-filter: blur(12px);
  box-shadow: 0 6px 25px rgba(0,0,0,0.4);
  max-width: 450px;
  width: 100%;
}

/* Title */
.update-card h2 {
  text-align: center;
  font-weight: 700;
  font-size: 32px;
  color: #80deea;
  margin-bottom: 25px;
}

/* Labels */
.update-card label {
  font-weight: 600;
  color: #b2dfdb;
  margin-bottom: 6px;
}

/* Inputs */
.update-card input {
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

.update-card input:focus {
  background: rgba(255, 255, 255, 0.2);
  box-shadow: 0 0 0 2px #26a69a;
}

/* Button */
.update-card button {
  background: #26a69a;
  border: none;
  padding: 14px;
  border-radius: 12px;
  color: white;
  font-weight: 600;
  width: 100%;
  transition: 0.3s;
}

.update-card button:hover {
  background: #00897b;
  transform: translateY(-2px);
}
  </style>
</head>
<body>

  <div class="update-card">
    <h2>Update Record</h2>

    <!-- ✅ Update Form -->
    <form action="<?= site_url('users/update/' . segment(4)); ?>" method="POST">

      <!-- Username -->
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username"
               value="<?= html_escape($user['username']); ?>" required>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email"
               value="<?= html_escape($user['email']); ?>" required>
      </div>

      <!-- Submit -->
      <button type="submit">Update</button>
    </form>
  </div>

</body>
</html>
