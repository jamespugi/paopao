<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom, #b3e5fc, #e1f5fe);
      font-family: "Poppins", sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .form-card {
      width: 100%;
      max-width: 450px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      backdrop-filter: blur(10px);
    }

    .form-card h1 {
      text-align: center;
      font-size: 1.8em;
      font-weight: 600;
      color: #0277bd;
      margin-bottom: 25px;
      text-shadow: 0 1px 4px rgba(2, 119, 189, 0.2);
    }

    .form-group {
      margin-bottom: 18px;
      position: relative;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 15px;
      font-size: 1em;
      border-radius: 8px;
      border: 1px solid #b3e5fc;
      background: rgba(255, 255, 255, 0.9);
      color: #333;
      transition: 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #4fc3f7;
      outline: none;
      box-shadow: 0 0 8px rgba(79, 195, 247, 0.6);
      background: #fff;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #0288d1;
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      background: linear-gradient(90deg, #4fc3f7, #0288d1);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1.1em;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 4px 12px rgba(2, 136, 209, 0.3);
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(2, 136, 209, 0.5);
    }

    .btn-return {
      display: block;
      text-align: center;
      margin-top: 15px;
      padding: 12px;
      background: #81d4fa;
      color: #01579b;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
      box-shadow: 0 3px 10px rgba(129, 212, 250, 0.4);
    }

    .btn-return:hover {
      background: #4fc3f7;
      color: #01579b;
      box-shadow: 0 5px 15px rgba(79, 195, 247, 0.6);
      transform: translateY(-1px);
    }
  </style>
</head>
<body>
  <div class="form-card">
    <h1>Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" value="<?=html_escape($user['username']);?>" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" value="<?=html_escape($user['email']);?>" placeholder="Email" required>
      </div>
      
      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div class="form-group">
          <select name="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div class="form-group">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn-submit">Update User</button>
    </form>
    <a href="<?=site_url('/users');?>" class="btn-return">Return to Home</a>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    if (togglePassword) {
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
