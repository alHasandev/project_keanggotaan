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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pendaftaran Anggota AWP</title>
</head>

<body>
  <header>
    <h1>DTS Kelompok 7</h1>
    <nav>
      <ul class="nav-left">
        <li><a href="index.php">Home</a></li>
        <li><a href="posisi_pengguna.php">Posisi Pengguna</a></li>
        <li><a href="tambah_pengguna.php">Tambah Pengguna</a></li>
        <li><a href="admin.php">Daftar Admin</a></li>
        <li><a href="ketua.php">Daftar Ketua</a></li>
        <li><a href="sekretariat.php">Daftar Sekretariat</a></li>
        <li><a href="anggota.php">Daftar Anggota</a></li>
      </ul>
      <ul class="nav-right">
        <li><a href="../profile.php">Admin</a></li>
        <li><a href="../">Logout</a></li>
      </ul>
    </nav>
  </header>
  <!-- bagian html header -->


  <div class="container">
    <form action="edit_pengguna.php" method="POST" class="tambah_data">
      <h1>Edit Pengguna</h1>
      <div class="form-group">
        <label for="nik">NIK</label>
        <input type="number" name="nik" id="nik" value="<?= $data['nik'] ?>" readonly>
      </div>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $data['email'] ?>">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="<?= $data['alamat'] ?>">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
      </div>
      <div class="form-group">
        <button type="submit" name="submit">Edit Pengguna</button>
      </div>
    </form>
  </div>
  <!-- bagian html container -->

  <footer>
    <p>DTS Kelompok 7 &copy; 2019</p>
  </footer>
  <!-- bagian html footer -->
</body>

</html>