<?php

if (isset($_GET['id'])) {
  // masukkan file koneksi.php
  require_once '../config/koneksi.php';

  $id = $_GET['id'];

  // buat query mengupdate data anggota menjadi ter approve
  $query = "SELECT * FROM pengguna p INNER JOIN portofolio prt ON p.nik = prt.nik WHERE p.nik = '$id'";

  // tampung hasil query
  $hasil = $db->query($query);

  // buat menjadi array associative
  $data = $hasil->fetch_assoc();

  // jalankan dan cek query
  if (!$hasil->num_rows) {
    die('Tidak ada data yang dipilih');
  }
} else {
  // kembalikan ke halaman list pendaftar
  header('Location: pendaftar.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profile Calon Anggota</title>
</head>

<body>
  <header>
    <h1>DTS Kelompok 7</h1>
    <nav>
      <ul class="nav-left">
        <li><a href="index.php">Home</a></li>
        <li><a href="pendaftar.php">Pendaftar</a></li>
        <li><a href="list_anggota.php">Daftar Anggota</a></li>
      </ul>
      <ul class="nav-right">
        <li><a href="../profile.php">Sekretariat</a></li>
        <li><a href="../">Logout</a></li>
      </ul>
    </nav>
  </header>
  <!-- bagian html header -->

  <div class="container">
    <div class="profile">
      <h1>Profile : <?= $data['nik'] ?></h1>
      <div class="row">
        <span class="label">Nama Lengkap: </span>
        <span class="data"><?= $data['nama'] ?></span>
      </div>
      <div class="row">
        <span class="label">Email: </span>
        <span class="data"><?= $data['email'] ?></span>
      </div>
      <div class="row">
        <span class="label">alamat: </span>
        <span class="data"><?= $data['alamat'] ?></span>
      </div>
      <div class="row">
        <span class="label">Bidang Keahlian: </span>
        <span class="data"><?= $data['bidang_keahlian'] ?></span>
      </div>
      <div class="row">
        <span class="label">Riwayat Pelatihan: </span>
        <span class="data"><?= $data['riwayat_pelatihan'] ?></span>
      </div>
      <div class="row">
        <span class="label">Sertifikat Dimiliki: </span>
        <span class="data"><?= $data['sertifikat_dimiliki'] ?></span>
      </div>
      <div class="row">
        <span class="label">Riwayat Project: </span>
        <span class="data"><?= $data['riwayat_project'] ?></span>
      </div>
      <div class="tombol-approve">
        <a href="approve.php?id=<?= $data['nik'] ?>">APPROVE</a>
        <a href="pendaftar.php">Kembali</a>
      </div>
    </div>
  </div>
  <!-- bagian html container -->

  <footer>
    <p>DTS Kelompok 7 &copy; 2019</p>
  </footer>
  <!-- bagian html footer -->
</body>

</html>