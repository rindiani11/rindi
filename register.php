<?php
include "koneksi.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = str_replace(' ', '_', strtolower($nama)) . rand(10, 100);

    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nama', '$email', '$username', '$password')");
    $_SESSION['username_baru'] = $username;
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>XI RPL 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #fce4ec, #f8bbd0);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .register-card {
      background: rgba(255, 255, 255, 0.5);
      backdrop-filter: blur(10px);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      max-width: 420px;
      width: 100%;
    }

    h4 {
      font-weight: 600;
      color: #d63384;
    }

    .btn-pink {
      background-color: #f48fb1;
      border: none;
      color: white;
    }

    .btn-pink:hover {
      background-color: #ec407a;
    }

    .form-control {
      border-radius: 12px;
    }
  </style>
</head>
<body>
  <div class="register-card text-center">
    <h4 class="mb-4">Daftar Akun Baru</h4>
    <form method="post">
      <input type="text" name="nama" class="form-control mb-3" placeholder="Nama Lengkap" required>
      <input type="email" name="email" class="form-control mb-3" placeholder="Email Aktif" required>
      <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>
      <button type="submit" class="btn btn-pink w-100">Mendaftar Sekarang</button>
    </form>
  </div>
</body>
</html>
