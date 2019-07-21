<?php

if (isset($_POST['submit'])) {
  // masukkan file koneksi.php
  require_once '../config/koneksi.php';

  // tampung data form
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];

  $pass = $_POST['password'];
  $pass = password_hash($pass, PASSWORD_BCRYPT);

  // buat query insert ke tabel login
  $queryLogin = "INSERT INTO `login` VALUES('$nik', '$pass')";

  // buat query insert ke tabel pengguna
  $queryPengguna = "INSERT INTO pengguna VALUES(
              '$nik', '$nama', '$email', '$alamat'
          )";

  // jalankan dan cek query
  if ($db->query($queryLogin) && $db->query($queryPengguna)) {
    header('Location: posisi_pengguna.php');
  } else
    header('Location: tambah_pengguna.php');
}

?>

<?php require_once 'header.php' ?>
<!-- bagian html header -->


<div class="container py-3" style="min-height: 83.1vh">
  <form action="" method="POST" class="mx-auto px-4 py-5 rounded shadow-sm" style="max-width: 600px">
    <h2 class="mb-3">Tambah Pengguna</h2>
    <div class="form-group">
      <label for="nik">NIK</label>
      <input class="form-control" type="number" name="nik" id="nik">
    </div>
    <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input class="form-control" type="text" name="nama" id="nama">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" type="email" name="email" id="email">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <input class="form-control" type="text" name="alamat" id="alamat">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input class="form-control" type="password" name="password" id="password">
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit" name="submit">Tambah Pengguna</button>
    </div>
  </form>
</div>
<!-- bagian html container -->

<?php require_once 'footer.php' ?>