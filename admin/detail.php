<?php

if (isset($_GET['id'])) {
  // masukkan file koneksi.php
  require_once '../config/koneksi.php';

  $id = $_GET['id'];

  // query tampil data pengguna sesuai posisi
  $query = "SELECT p.nik, p.nama, p.email, p.alamat, ps.nama_posisi FROM (pengguna p INNER JOIN mapping m ON p.nik = m.nik) INNER JOIN posisi ps ON m.id_posisi = ps.id_posisi WHERE p.nik = '$id'";

  // tampung pengguna query
  $hasil = $db->query($query);

  // buat menjadi array associative
  $pengguna = $hasil->fetch_assoc();

  // query tampil data pengguna sesuai posisi
  $query = "SELECT * FROM portofolio WHERE nik = '$id'";

  // tampung hasil query portofolio
  $porto = $db->query($query);

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
    <div class="profile">
      <h1>Profile : <?= $pengguna['nik'] ?></h1>
      <div class="row">
        <span class="label">Nama Lengkap: </span>
        <span class="data"><?= $pengguna['nama'] ?></span>
      </div>
      <div class="row">
        <span class="label">Email: </span>
        <span class="data"><?= $pengguna['email'] ?></span>
      </div>
      <div class="row">
        <span class="label">alamat: </span>
        <span class="data"><?= $pengguna['alamat'] ?></span>
      </div>

      <!-- tampilkan jika memiliki portofolio -->
      <?php if ($porto->num_rows) : ?>
        <?php $data = $porto->fetch_assoc(); ?>
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
      <?php endif; ?>

      <div class="row">
        <span class="label">posisi: </span>
        <span class="data"><?= $pengguna['nama_posisi'] ?></span>
      </div>

      <div class="row">
        <button><a href="edit_pengguna.php?id=<?= $pengguna['nik'] ?>">EDIT PENGGUNA</a></button>
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