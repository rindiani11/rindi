<?php
session_start();
include 'koneksi.php';

// Proses hapus jika ada ID di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($koneksi, "DELETE FROM user WHERE id = $id");
    header("Location: user.php");
    exit;
}

// Ambil semua data user
$users = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #f8bbd0, #fce4ec);
      color: #333;
    }
    .navbar {
      background-color: #ec407a;
    }
    .navbar-brand, .nav-link {
      color: white !important;
    }
    .btn-danger {
      background-color: #d81b60;
      border: none;
    }
    .btn-warning {
      background-color: #f48fb1;
      border: none;
      color: white;
    }
    .btn-warning:hover {
      background-color: #ec407a;
    }
    .table {
      background-color: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    thead {
      background-color: #f8bbd0;
      color: white;
    }
    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">rindi</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link active" href="user.php">Data User</a></li>
      </ul>
      <a href="index.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h3 class="text-center mb-4 text-danger">Data User</h3>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; while($user = mysqli_fetch_assoc($users)): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
              <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="user.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
