<?php session_start(); ?>
<!doctype html>
<html lang="en" class="h-100">
<head>
  <title>XI RPL 1 · perpus</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: url('assets/img/bgg.jpg') center/cover no-repeat;
      background-color: #ffeef5; /* fallback pink pastel */
    }

    .glass {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 40px;
      color: #6d214f;
      box-shadow: 0 8px 32px 0 rgba(255, 192, 203, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .btn-outline-light {
      border-color: #f48fb1;
      color: #f48fb1;
    }

    .btn-outline-light:hover {
      background-color: #f48fb1;
      color: white;
    }

    .btn-light {
      background-color: #fff0f5;
      color: #6d214f;
    }

    .btn-light:hover {
      background-color: #f8bbd0;
      color: white;
    }

    h1 {
      font-weight: 600;
      color: #d63384;
    }

    p.lead {
      font-weight: 300;
      color: #874356;
    }

    .alert-success {
      background-color: rgba(240, 128, 128, 0.3);
      color: #fff;
      border-color: #f48fb1;
    }

    footer {
      color: #f8bbd0;
      font-size: 0.9rem;
    }
  </style>
</head>
<body class="d-flex h-100 align-items-center justify-content-center text-white">

  <div class="glass text-center col-md-6">
    <?php if (isset($_SESSION['username_baru'])): ?>
      <div class="alert alert-success border-0">
        Username Anda adalah: <strong><?= $_SESSION['username_baru'] ?></strong><br>Silakan login menggunakan username ini.
      </div>
      <?php unset($_SESSION['username_baru']); ?>
    <?php endif; ?>

    <h1 class="mb-3">Selamat Datang</h1>
    <p class="lead mb-4">
      Dimana saja dan kapan saja bisa membaca buku
    </p>
    <div class="d-flex justify-content-center gap-3">
      <a href="login.php" class="btn btn-outline-light btn-lg">Login</a>
      <a href="register.php" class="btn btn-light btn-lg">Sign Up</a>
    </div>
  </div>

  <footer class="position-absolute bottom-0 w-100 text-center text-white-50 pb-3">
    <p class="mb-0">&copy; 2024 XI RPL 1. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
