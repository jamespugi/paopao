<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(to bottom, #b3e5fc, #e1f5fe);
      background-attachment: fixed;
      color: #333;
    }

    .dashboard-container {
      max-width: 1200px;
      margin: 50px auto;
      padding: 20px;
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .dashboard-header h2 {
      font-weight: 700;
      color: #0277bd;
      text-shadow: 0 0 5px rgba(2, 119, 189, 0.3);
    }

    .logout-btn {
      padding: 10px 18px;
      border: none;
      border-radius: 6px;
      background: linear-gradient(90deg, #29b6f6, #0288d1);
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
      box-shadow: 0 3px 10px rgba(2, 136, 209, 0.4);
    }
    .logout-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(2, 136, 209, 0.6);
    }

    .user-status {
      padding: 12px 18px;
      border-radius: 10px;
      font-size: 14px;
      background: rgba(255, 255, 255, 0.8);
      border: 1px solid #81d4fa;
      color: #0277bd;
      margin-bottom: 20px;
      backdrop-filter: blur(6px);
    }
    .user-status.error {
      background: rgba(255, 205, 210, 0.8);
      border: 1px solid #ef5350;
      color: #c62828;
    }

    .table-card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(15px);
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
      border-radius: 10px;
      overflow: hidden;
    }

    th {
      background: #81d4fa;
      color: #01579b;
      font-size: 14px;
      text-transform: uppercase;
      text-align: center;
    }

    td {
      background: rgba(255, 255, 255, 0.6);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      color: #333;
      text-align: center;
    }

    a.btn-action {
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      margin: 0 2px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
    }

    a.btn-update {
      background: linear-gradient(90deg, #4fc3f7, #0288d1);
      box-shadow: 0 3px 8px rgba(2, 136, 209, 0.3);
    }
    a.btn-update:hover {
      box-shadow: 0 6px 15px rgba(2, 136, 209, 0.5);
    }

    a.btn-delete {
      background: linear-gradient(90deg, #ef5350, #d32f2f);
      box-shadow: 0 3px 8px rgba(211, 47, 47, 0.3);
    }
    a.btn-delete:hover {
      box-shadow: 0 6px 15px rgba(211, 47, 47, 0.5);
    }

    .btn-create {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #4fc3f7, #0288d1);
      color: #fff;
      font-size: 1.1em;
      border-radius: 10px;
      font-weight: 600;
      transition: 0.3s;
      margin-top: 20px;
      box-shadow: 0 4px 15px rgba(2, 136, 209, 0.4);
    }
    .btn-create:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 25px rgba(2, 136, 209, 0.6);
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .search-form input {
      border-radius: 8px;
      border: 1px solid #81d4fa;
      background: rgba(255, 255, 255, 0.7);
      color: #333;
    }
    .search-form input:focus {
      outline: none;
      border: 1px solid #4fc3f7;
      box-shadow: 0 0 10px #4fc3f7;
      background: #fff;
    }

    .search-form button {
      background: #4fc3f7;
      border: none;
      color: #01579b;
      font-weight: 600;
      border-radius: 8px;
      padding: 8px 16px;
    }
    .search-form button:hover {
      box-shadow: 0 0 15px #4fc3f7;
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    
    <div class="dashboard-header">
      <h2>
        <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
      </h2>
      <a href="<?=site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
    </div>

    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status mb-3">
        <strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
      </div>
    <?php else: ?>
      <div class="user-status error mb-3">
        Logged in user not found
      </div>
    <?php endif; ?>

    <!-- Search + Table -->
    <div class="table-card">
      <form action="<?=site_url('users');?>" method="get" class="d-flex mb-3 search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input name="q" type="text" class="form-control me-2" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit">Search</button>
      </form>

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Password</th>
              <th>Role</th>
            <?php endif; ?>
            <th>Action</th>
          </tr>
          <?php foreach ($user as $user): ?>
          <tr>
            <td><?=html_escape($user['id']); ?></td>
            <td><?=html_escape($user['username']); ?></td>
            <td><?=html_escape($user['email']); ?></td>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <td>*******</td>
              <td><?= html_escape($user['role']); ?></td>
            <?php endif; ?>
            <td>
              <a href="<?=site_url('/users/update/'.$user['id']);?>" class="btn-action btn-update">Update</a>
              <a href="<?=site_url('/users/delete/'.$user['id']);?>" class="btn-action btn-delete">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?php echo $page; ?>
      </div>
    </div>

    <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
  </div>
</body>
</html>
