<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Users Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      min-height: 100vh;
      margin: 0;
      padding: 20px;
      color: #e0f2f1;
    }

    h1 {
      text-align: center;
      font-weight: 700;
      font-size: 40px;
      color: #80deea;
      margin-bottom: 30px;
    }

    /* Search bar and create button */
    .header-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      flex-wrap: wrap;
      gap: 10px;
    }

    .search-form input {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      color: #fff;
      padding: 12px 15px;
      border-radius: 10px;
      outline: none;
      width: 250px;
    }

    .search-form input::placeholder {
      color: #b0bec5;
    }

    .search-form button {
      background: #26a69a;
      border: none;
      padding: 12px 18px;
      border-radius: 10px;
      color: white;
      font-weight: 600;
      transition: 0.3s;
    }

    .search-form button:hover {
      background: #00897b;
    }

    /* Create button */
    .btn-create {
      background: #43a047;
      color: white;
      padding: 12px 22px;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-create:hover {
      background: #2e7d32;
      transform: translateY(-2px);
    }

    /* Table styling */
    .table-container {
      background: rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      padding: 20px;
      backdrop-filter: blur(12px);
      box-shadow: 0 4px 20px rgba(0,0,0,0.3);
      overflow-x: auto;
    }

    table {
      color: #fff;
      width: 100%;
    }

    thead {
      background: rgba(255, 255, 255, 0.15);
    }

    thead th {
      color: #80deea;
      font-weight: 600;
    }

    tbody tr {
      transition: 0.2s;
    }

    tbody tr:hover {
      background: rgba(255, 255, 255, 0.1);
    }

    .action-btn {
      padding: 6px 14px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
    }

    .action-btn.update {
      background: #26a69a;
      color: white;
    }

    .action-btn.update:hover {
      background: #00897b;
    }

    .action-btn.delete {
      background: #ef5350;
      color: white;
    }

    .action-btn.delete:hover {
      background: #c62828;
    }

    /* Pagination */
    .pagination {
      margin-top: 30px;
      justify-content: center;
    }

    .pagination a, .pagination strong {
      margin: 0 5px;
      padding: 10px 15px;
      border-radius: 8px;
      border: 1px solid #26a69a;
      font-size: 14px;
      text-decoration: none;
      color: #fff;
      background: #26a69a;
    }

    .pagination a:hover {
      background: #ffffff;
      color: #26a69a;
    }

    .pagination strong {
      background: #ffffff;
      color: #26a69a;
    }
  </style>
</head>
<body>
  <h1>Students Info</h1>

  <!-- Header: Search + Create -->
  <div class="header-bar">
    <form action="<?= site_url('users'); ?>" method="get" class="search-form d-flex gap-2">
      <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
      <input name="q" type="text" placeholder="Search..." value="<?= html_escape($q); ?>">
      <button type="submit">Search</button>
    </form>
    <a href="<?= site_url('users/create'); ?>" class="btn-create">+ Add Student</a>
  </div>

  <!-- Table Container -->
  <div class="table-container">
    <?php if (!empty($user)): ?>
      <table class="table table-borderless align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($user as $users): ?>
            <tr>
              <td><?= html_escape($users['id']); ?></td>
              <td><?= html_escape($users['username']); ?></td>
              <td><?= html_escape($users['email']); ?></td>
              <td class="text-end">
                <a href="<?= site_url('/users/update/'.$users['id']); ?>" class="action-btn update">Update</a>
                <a href="<?= site_url('/users/delete/'.$users['id']); ?>" class="action-btn delete" onclick="return confirm('Delete this user?');">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="text-center">No users found.</p>
    <?php endif; ?>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center">
    <?= $page; ?>
  </div>
</body>
</html>
