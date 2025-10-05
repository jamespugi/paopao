<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
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

    /* Glowing orbs */
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

    /* Register Card */
    .register {
      position: relative;
      width: 420px;
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

    .register h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 30px;
      color: #00ffa3;
      text-shadow: 0 0 12px #00ffa3;
      letter-spacing: 1px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 20px;
    }

    .inputBox input,
    .inputBox select {
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

    .inputBox input:focus,
    .inputBox select:focus {
      border-color: #00ffa3;
      box-shadow: 0 0 10px #00ffa3;
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
      color: #00ffa3;
      transition: 0.3s;
    }

    .toggle-password:hover {
      color: #00e5ff;
    }

    .register button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #00ffa3, #00e5ff);
      color: #0f0f1a;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .register button:hover {
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
  </style>
</head>
<body>

  <!-- Background orbs -->
  <div class="orb"></div>
  <div class="orb"></div>
  <div class="orb"></div>

  <!-- Register Card -->
  <div class="register">
    <h2>Create Account</h2>
    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="inputBox">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="inputBox">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="inputBox">
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="group">
      <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
