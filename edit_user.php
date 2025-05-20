<?php
session_start();
include 'koneksi.php';

if (!isset($_GET['id'])) exit(header("Location: user.php"));
$id = (int)$_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM user WHERE id = $id");
if (mysqli_num_rows($result) == 0) exit("User tidak ditemukan.");
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = htmlspecialchars($_POST['nama']);
    $email    = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'];

    $update = mysqli_query($koneksi, "UPDATE user SET 
        nama='$nama', email='$email', username='$username', password='$password' WHERE id=$id");

    exit(header("Location: user.php"));
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="bg-white p-4 rounded shadow" style="min-width: 350px;">
    <h3 class="text-center mb-4">Edit Data User</h3>
    <form method="POST">
      <?php foreach (['nama', 'email', 'username'] as $field): ?>
        <div class="mb-3">
          <label><?= ucfirst($field) ?></label>
          <input type="<?= $field == 'email' ? 'email' : 'text' ?>" name="<?= $field ?>" 
                 value="<?= htmlspecialchars($user[$field]) ?>" class="form-control" required>
        </div>
      <?php endforeach; ?>
      <div class="mb-3">
        <label>Password (Kosongkan jika tidak ingin diubah)</label>
        <input type="text" name="password" class="form-control" placeholder="Isi untuk ganti password">
      </div>
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="user.php" class="btn btn-secondary">Kembali</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>