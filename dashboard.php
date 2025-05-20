<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM buku WHERE id = $id";
    mysqli_query($koneksi, $query);
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #fde2e4, #f8bbd0);
      color: #333;
    }
    .navbar {
      background-color: #f06292 !important;
    }
    .navbar-brand,
    .nav-link,
    .btn-danger {
      color: white !important;
    }
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      transition: transform 0.2s ease;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card-title {
      color: #d63384;
      font-weight: 600;
    }
    .btn-warning {
      background-color: #f8bbd0;
      border: none;
      color: #fff;
    }
    .btn-warning:hover {
      background-color: #ec407a;
    }
    .btn-danger {
      background-color: #e91e63;
      border: none;
    }
    .img-fixed {
      height: 300px;
      object-fit: cover;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">rindi</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="create.php">Tambah Data</a></li>
        <li class="nav-item"><a class="nav-link" href="user.php">data user</a></li>
      </ul>
      <a href="index.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h3 class="text-center mb-5 text-danger">Data Buku</h3>
  <?php
    $result = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");
    if (mysqli_num_rows($result) > 0):
  ?>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?= $row['link_gambar'] ?>" class="card-img-top img-fixed" alt="gambar"
               onerror="this.onerror=null;this.src='https://via.placeholder.com/300x300';">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['judul']) ?></h5>
            <p class="card-text">
              <strong>Tahun:</strong> <?= $row['tahun'] ?><br>
              <strong>Penerbit:</strong> <?= $row['penerbit'] ?><br>
              <strong>Isi:</strong> <?= $row['isi'] ?>
            </p>
            <div class="d-flex justify-content-between mt-3">
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Ubah</a>
              <a href="dashboard.php?id=<?= $row['id'] ?>" class="btn btn-danger"
                 onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <?php else: ?>
    <div class="alert alert-info text-center mt-5">Tidak ada data.</div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
