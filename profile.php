<?php

// mulai session
session_start();

require_once './config/helper.php';

$pengguna = $_SESSION['pengguna'];

// masukkan file koneksi.php
require_once 'config/koneksi.php';

// buat query tampil profile
$query = "SELECT * FROM pengguna WHERE nik = '$pengguna[nik]'";

// tampung hasil query
$hasil = $db->query($query);

// buat hasil query dalam bentuk array associative
$data = $hasil->fetch_assoc();

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
        <div class="modal-header">
          <h5 class="modal-title">Profil <?= $pengguna['nama_posisi'] ?></h5>

        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row my-3">
              <span class="col">NIK</span>
              <span class="col"><?= $data['nik'] ?></span>
            </div>
            <hr>
            <div class="row my-3">
              <span class="col">nama</span>
              <span class="col"><?= $data['nama'] ?></span>
            </div>
            <hr>
            <div class="row my-3">
              <span class="col">email</span>
              <span class="col"><?= $data['email'] ?></span>
            </div>
            <hr>
            <div class="row my-3">
              <span class="col">alamat</span>
              <span class="col"><?= $data['alamat'] ?></span>
            </div>
            <hr>
            <div class="row my-3">
              <span class="col">posisi</span>
              <span class="col"><?= $pengguna['nama_posisi'] ?></span>
            </div>
            <hr>
          </div>
        </div>
        <div class="modal-footer">
          <a href="<?= $pengguna['nama_posisi'] ?>" class="btn btn-secondary">KEMBALI</a>
          <a href="profile_edit.php" class="btn btn-primary">EDIT PROFILE</a>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>