<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Neon Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(-45deg, #0f0c29, #302b63, #24243e, #00d4ff);
      background-size: 400% 400%;
      animation: gradientShift 12s ease infinite;
      overflow: hidden;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Floating glowing orbs */
    .orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(100px);
      opacity: 0.6;
      animation: float 20s infinite alternate ease-in-out;
    }

    .orb:nth-child(1) {
      width: 300px; height: 300px;
      background: #00fff2;
      top: -100px; left: -100px;
    }
    .orb:nth-child(2) {
      width: 250px; height: 250px;
      background: #ff00e6;
      bottom: -80px; right: -120px;
      animation-delay: 4s;
    }
    .orb:nth-child(3) {
      width: 200px; height: 200px;
      background: #00ff7f;
      top: 50%; left: 70%;
      animation-delay: 8s;
    }

    @keyframes float {
      from { transform: translateY(0) translateX(0); }
      to { transform: translateY(50px) translateX(30px); }
    }

    /* Login Card */
    .login {
      position: relative;
      width: 380px;
      padding: 45px 40px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      backdrop-filter: blur(18px);
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.4);
      z-index: 1;
      animation: fadeIn 1.5s ease forwards;
      transform: translateY(30px);
      opacity: 0;
    }

    @keyframes fadeIn {
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 30px;
      color: #00e5ff;
      text-shadow: 0 0 12px #00e5ff;
      letter-spacing: 1px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 25px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #fff;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      outline: none;
      border-radius: 10px;
      transition: 0.3s;
    }

    .inputBox input:focus {
      border-color: #00e5ff;
      box-shadow: 0 0 10px #00e5ff;
    }

    .inputBox input::placeholder {
      color: #aaa;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #00e5ff;
      transition: 0.3s;
    }

    .toggle-password:hover {
      color: #00ffa3;
    }

    .login button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #00e5ff, #00ffa3);
      color: #0f0f1a;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .login button:hover {
      transform: translateY(-2px);
      box-shadow: 0 0 15px #00ffa3;
    }

    .group {
      text-align: center;
      margin-top: 15px;
    }

    .group a {
      font-size: 0.95em;
      color: #00e5ff;
      text-decoration: none;
      transition: 0.3s;
    }

    .group a:hover {
      color: #00ffa3;
      text-shadow: 0 0 8px #00ffa3;
    }

    /* Error message */
    .error-box {
      background: rgba(255,0,0,0.15);
      color: #ff7b7b;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.9em;
      border: 1px solid rgba(255, 0, 0, 0.3);
    }

  </style>
</head>
<body>

  <!-- Glowing orbs background -->
  <div class="orb"></div>
  <div class="orb"></div>
  <div class="orb"></div>

  <!-- Login Card -->
  <div class="login">
    <h2>Welcome Back</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="inputBox">
        <input type="text" placeholder="Username" name="username" required>
      </div>

      <div class="inputBox">
        <input type="password" placeholder="Password" name="password" id="password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit">Login</button>
    </form>

    <div class="group">
      <p style="font-size: 0.9em;">
        Don't have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
