<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data</title>
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

    h3.text-center {
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

    .alert-danger {
      background-color: #f8d7da;
      color: #842029;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">rindi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">data</a></li>
        <li class="nav-item"><a class="nav-link disabled" href="#">Link</a></li>
      </ul>
      <form class="d-flex"><button class="btn btn-danger" type="submit">logout</button></form>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h3 class="text-center">Tambah Data Baru</h3>
  <form action="" method="POST" class="col-lg-4 mx-auto mt-3">
    <?php
      include 'koneksi.php';
      function input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $link_gambar = input($_POST['link_gambar']);
        $judul       = input($_POST['judul']);
        $tahun       = input($_POST['tahun']);
        $penerbit    = input($_POST['penerbit']);
        $isi         = input($_POST['isi']);

        $sql = "INSERT INTO buku (link_gambar, judul, tahun, penerbit, isi) VALUES
                ('$link_gambar', '$judul', '$tahun', '$penerbit', '$isi')";
        if (mysqli_query($koneksi, $sql)) header("Location: dashboard.php");
        else echo "<div class='alert alert-danger'>Data Gagal Disimpan.</div>";
      }
    ?>

    <div class="mb-3">
      <label class="form-label">Link Gambar</label>
      <input type="text" name="link_gambar" class="form-control" placeholder="https://contoh.com/gambar.jpg">
    </div>
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input type="text" name="judul" class="form-control" placeholder="input judul">
    </div>
    <div class="mb-3">
      <label class="form-label">Tahun Terbit</label>
      <textarea name="tahun" class="form-control" placeholder="input Tahun Terbit"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Penerbit</label>
      <input type="text" name="penerbit" class="form-control" placeholder="input penerbit">
    </div>
    <div class="mb-3">
      <label class="form-label">Isi</label>
      <input type="text" name="isi" class="form-control" placeholder="input isi">
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-success">Tambah</button>
      <a href="dashboard.php" class="btn btn-danger">Batal</a>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
