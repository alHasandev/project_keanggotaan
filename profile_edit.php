<?php

// mulai session
session_start();

// masukkan file koneksi.php
require_once 'config/koneksi.php';

// cek apakah data telah disubmit
if (isset($_POST['submit'])) {
  // query update profile
  $query = "UPDATE pengguna SET 
              nama = '$_POST[nama]',
              email = '$_POST[email]',
              alamat = '$_POST[alamat]'
            WHERE nik = '$_POST[nik]'";

  // kirimkan query
  if ($db->query($query))
    header('Location: profile.php');
  else
    header('Location: profile_edit.php?status=gagal');
} else {
  require_once './config/helper.php';

  $pengguna = $_SESSION['pengguna'];

  // buat query tampil profile
  $query = "SELECT * FROM pengguna WHERE nik = '$pengguna[nik]'";

  // tampung hasil query
  $hasil = $db->query($query);

  // buat hasil query dalam bentuk array associative
  $data = $hasil->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profile Pengguna</title>
  <link rel="stylesheet" href="style/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form method="post" action="">
          <div class="modal-header">
            <h4 class="modal-title">Edit Profil <?= $pengguna['nama_posisi'] ?></h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" name="nik" value="<?= $data['nik'] ?>" readonly>
            </div>

            <div class="form-group">
              <label for="nama">nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>">
            </div>

            <div class="form-group">
              <label for="email">email</label>
              <input type="text" class="form-control" id="email" name="email" value="<?= $data['email'] ?>">
            </div>

            <div class="form-group">
              <label for="alamat">alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat'] ?>">
            </div>

          </div>
          <div class="modal-footer">
            <a href="profile.php" class="btn btn-secondary">KEMBALI</a>
            <input type="submit" class="btn btn-primary" name="submit" value="UDPATE">
          </div>

        </form>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>