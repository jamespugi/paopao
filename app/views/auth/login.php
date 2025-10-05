<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
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
      background: linear-gradient(135deg, #e0f7ff, #b3e5fc);
      overflow: hidden;
      position: relative;
    }

    /* Floating clouds animation */
    .cloud {
      position: absolute;
      background: white;
      border-radius: 50px;
      filter: blur(4px);
      opacity: 0.8;
      animation: floatCloud 25s linear infinite;
    }

    .cloud::before, .cloud::after {
      content: '';
      position: absolute;
      background: white;
      width: 100%;
      height: 100%;
      border-radius: 50px;
    }

    .cloud::before {
      top: -20px;
      left: 20px;
      width: 80px;
      height: 80px;
    }

    .cloud::after {
      top: -10px;
      left: -30px;
      width: 100px;
      height: 100px;
    }

    .cloud.small {
      width: 120px;
      height: 60px;
      top: 15%;
      left: -150px;
      animation-duration: 30s;
    }

    .cloud.medium {
      width: 180px;
      height: 80px;
      top: 40%;
      left: -200px;
      animation-duration: 35s;
    }

    .cloud.large {
      width: 250px;
      height: 100px;
      top: 70%;
      left: -300px;
      animation-duration: 45s;
    }

    @keyframes floatCloud {
      from { transform: translateX(0); }
      to { transform: translateX(120vw); }
    }

    /* Login Box */
    .login {
      background: white;
      padding: 35px 30px;
      width: 360px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 128, 255, 0.15);
      z-index: 1;
      animation: fadeUp 1.3s ease forwards;
      transform: translateY(30px);
      opacity: 0;
    }

    @keyframes fadeUp {
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .login h2 {
      text-align: center;
      font-size: 1.8em;
      margin-bottom: 25px;
      color: #0277bd;
    }

    .inputBox {
      margin-bottom: 20px;
      position: relative;
    }

    .inputBox input {
      width: 100%;
      padding: 12px 40px 12px 12px;
      font-size: 1em;
      border: 1px solid #b3e5fc;
      border-radius: 8px;
      outline: none;
      transition: 0.3s;
      background: #f9f9f9;
    }

    .inputBox input:focus {
      border-color: #03a9f4;
      box-shadow: 0 0 5px #81d4fa;
      background: white;
    }

    .toggle-password {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #03a9f4;
    }

    .login button {
      width: 100%;
      padding: 12px;
      background: linear-gradient(90deg, #03a9f4, #4fc3f7);
      color: white;
      font-size: 1.05em;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .login button:hover {
      background: linear-gradient(90deg, #0288d1, #03a9f4);
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(3, 169, 244, 0.3);
    }

    .group {
      text-align: center;
      margin-top: 15px;
    }

    .group a {
      color: #0288d1;
      font-size: 0.9em;
      text-decoration: none;
      transition: 0.3s;
    }

    .group a:hover {
      text-decoration: underline;
    }

    .error-box {
      background: rgba(255,0,0,0.1);
      color: #d32f2f;
      padding: 8px;
      text-align: center;
      border-radius: 5px;
      margin-bottom: 15px;
      font-size: 0.85em;
      border: 1px solid rgba(211, 47, 47, 0.2);
    }
  </style>
</head>
<body>

  <!-- Floating clouds -->
  <div class="cloud small"></div>
  <div class="cloud medium"></div>
  <div class="cloud large"></div>

  <!-- Login Box -->
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
      <p>Don't have an account? 
        <a href="<?= site_url('auth/register'); ?>">Register here</a>
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
