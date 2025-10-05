<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create User</title>
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
      background: linear-gradient(to bottom, #87ceeb 0%, #e0f7ff 100%);
      overflow: hidden;
    }

    /* Floating clouds animation */
    .cloud {
      position: absolute;
      background: white;
      border-radius: 50px;
      filter: blur(2px);
      opacity: 0.8;
      animation: floatClouds linear infinite;
    }

    .cloud::before,
    .cloud::after {
      content: "";
      position: absolute;
      background: white;
      width: 100%;
      height: 100%;
      border-radius: 50px;
    }

    .cloud1 { width: 180px; height: 60px; top: 15%; left: -200px; animation-duration: 60s; }
    .cloud2 { width: 220px; height: 70px; top: 40%; left: -250px; animation-duration: 80s; }
    .cloud3 { width: 160px; height: 50px; top: 70%; left: -180px; animation-duration: 70s; }

    @keyframes floatClouds {
      0% { transform: translateX(0); }
      100% { transform: translateX(120vw); }
    }

    .form-container {
      position: relative;
      width: 400px;
      padding: 35px;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      z-index: 2;
    }

    .form-container h1 {
      text-align: center;
      font-size: 1.8em;
      font-weight: 600;
      color: #0d47a1;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group input {
      width: 100%;
      padding: 12px 15px;
      font-size: 1em;
      border-radius: 6px;
      border: 1px solid #ccc;
      background: #fff;
      color: #333;
      transition: 0.3s;
    }

    .form-group input:focus {
      border-color: #0d47a1;
      outline: none;
      box-shadow: 0 0 6px rgba(13,71,161,0.3);
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      background: #0d47a1;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 1.1em;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-submit:hover {
      background: #1565c0;
    }

    .link-wrapper {
      text-align: center;
      margin-top: 18px;
    }

    .btn-link {
      display: inline-block;
      padding: 10px 18px;
      background: #6c757d;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-link:hover {
      background: #5a6268;
    }
  </style>
</head>
<body>
  <!-- Clouds -->
  <div class="cloud cloud1"></div>
  <div class="cloud cloud2"></div>
  <div class="cloud cloud3"></div>

  <div class="form-container">
    <h1>Create User</h1>
    <form id="user-form" action="<?=site_url('users/create/')?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required value="<?= isset($username) ? html_escape($username) : '' ?>">
      </div>
      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required value="<?= isset($email) ? html_escape($email) : '' ?>">
      </div>
      <button type="submit" class="btn-submit">Create User</button>
    </form>
    <div class="link-wrapper">
      <a href="<?=site_url('/users'); ?>" class="btn-link">Return to Home</a>
    </div>
  </div>
</body>
</html>
