<?php
session_start();
include "koneksi.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
  $d = mysqli_fetch_array($data);

  if ($d) {
    if (password_verify($password, $d['password'])) {
      $_SESSION['username'] = $username;
      header("Location: dashboard.php");
      exit;
    } else {
      $error = "Password salah, silakan coba lagi.";
    }
  } else {
    $error = "Username tidak ditemukan.";
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Konter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #ffeef5, #f8bbd0);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.4);
      backdrop-filter: blur(10px);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      max-width: 400px;
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

    .error-msg {
      background-color: rgba(255, 0, 0, 0.1);
      color: #c62828;
      padding: 10px;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="login-card text-center">
    <h4 class="mb-4">Silakan Login</h4>
    <?php if (!empty($error)) echo "<div class='error-msg mb-3'>$error</div>"; ?>
    <form method="post">
      <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
      <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>
      <button type="submit" class="btn btn-pink w-100">Login</button>
    </form>
  </div>
</body>
</html>
