<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = intval($_GET['id']);
$result = mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

if (isset($_POST['submit'])) {
    $link_gambar = htmlspecialchars($_POST['link_gambar']);
    $judul = htmlspecialchars($_POST['judul']);
    $tahun = htmlspecialchars($_POST['tahun']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $isi = htmlspecialchars($_POST['isi']);

    $update = "UPDATE buku SET 
        link_gambar='$link_gambar', 
        judul='$judul', 
        tahun='$tahun', 
        penerbit='$penerbit', 
        isi='$isi' 
        WHERE id=$id";

    if (mysqli_query($koneksi, $update)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #ffeef5;
    }

    .navbar {
      background-color: #ffb6c1 !important;
    }

    .navbar-brand, .nav-link {
      color: #fff !important;
      font-weight: 500;
    }

    .nav-link:hover {
      text-decoration: underline;
    }

    h2.text-center {
      color: #d63384;
      font-weight: 600;
    }

    .form-label {
      color: #d63384;
      font-weight: 500;
    }

    .form-control {
      border: 1px solid #f8bbd0;
    }

    .form-control:focus {
      border-color: #f48fb1;
      box-shadow: 0 0 0 0.2rem rgba(244, 143, 177, 0.25);
    }

    .btn-success {
      background-color: #f48fb1;
      border-color: #f48fb1;
      font-weight: 500;
    }

    .btn-success:hover {
      background-color: #f06292;
      border-color: #f06292;
    }

    .btn-danger {
      background-color: #f8bbd0;
      border-color: #f8bbd0;
      color: #6c757d;
      font-weight: 500;
    }

    .btn-danger:hover {
      background-color: #f48fb1;
      border-color: #f48fb1;
      color: #fff;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">rindi</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="create.php">data</a></li>
        <li class="nav-item"><a class="nav-link disabled">Link</a></li>
      </ul>
      <a href="index.php" class="btn btn-danger">logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="text-center">Edit Data User</h2>
  <form method="POST" class="col-lg-4 mx-auto mt-4">
    <div class="mb-3">
      <label class="form-label">Link Gambar</label>
      <input type="text" name="link_gambar" class="form-control" value="<?= $data['link_gambar'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Tahun Terbit</label>
      <input type="text" name="tahun" class="form-control" value="<?= $data['tahun'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Penerbit</label>
      <input type="text" name="penerbit" class="form-control" value="<?= $data['penerbit'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Isi</label>
      <input type="text" name="isi" class="form-control" value="<?= $data['isi'] ?>">
    </div>
    <div class="d-flex gap-2">
      <button type="submit" name="submit" class="btn btn-success">Simpan</button>
      <a href="dashboard.php" class="btn btn-danger">Batal</a>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
