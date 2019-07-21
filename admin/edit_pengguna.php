<?php

// masukkan file koneksi.php
require_once '../config/koneksi.php';

if (isset($_POST['submit'])) {


  // tampung data form
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];

  $pass = $_POST['password'];
  $pass = password_hash($pass, PASSWORD_BCRYPT);

  // buat query insert ke tabel login
  $queryLogin = "UPDATE `login` SET `password` = '$pass' WHERE nik = '$nik'";

  // buat query insert ke tabel pengguna
  $queryPengguna = "UPDATE pengguna SET
                nama = '$nama',
                email = '$email',
                alamat = '$alamat'
              WHERE nik = '$nik'";

  // die(var_dump($queryPengguna));

  // jalankan dan cek query
  if ($db->query($queryLogin) && $db->query($queryPengguna)) {
    header('Location: posisi_pengguna.php');
  } else {
    unset($_POST);
    header('Location: edit_pengguna.php?id=' . $nik);
  }
} elseif (isset($_GET['id'])) {

  // tampung data id
  $nik = $_GET['id'];

  // query menampilkan data pengguna sesuai nik
  $query = "SELECT * FROM pengguna WHERE nik = '$nik'";

  // tampung hasil query pengguna
  $hasil = $db->query($query);
  // buat hasil query menjadi array associative
  $data = $hasil->fetch_assoc();
} else {
  header('Location: posisi_pengguna.php');
}

?>

<?php require_once 'header.php' ?>
<!-- bagian html header -->


<div class="container py-3" style="min-height: 83.1vh">
  <form action="edit_pengguna.php" method="POST" class="mx-auto px-4 py-5 rounded shadow-sm" style="max-width: 500px">
    <h2 class="mb-3">Edit Pengguna</h2>
    <div class="form-group">
      <label for="nik">NIK</label>
      <input class="form-control" type="number" name="nik" id="nik" value="<?= $data['nik'] ?>" readonly>
    </div>
    <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input class="form-control" type="text" name="nama" id="nama" value="<?= $data['nama'] ?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" type="email" name="email" id="email" value="<?= $data['email'] ?>">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <input class="form-control" type="text" name="alamat" id="alamat" value="<?= $data['alamat'] ?>">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input class="form-control" type="password" name="password" id="password">
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit" name="submit">Edit Pengguna</button>
    </div>
  </form>
</div>
<!-- bagian html container -->

<?php require_once 'footer.php' ?>