<?php

// masukkan file koneksi.php
require_once '../config/koneksi.php';

// buat query tampil data anggota (yang belum di approve)
$query = "SELECT p.nik, p.nama, p.email, p.alamat FROM pengguna p INNER JOIN mapping m ON p.nik = m.nik WHERE m.id_posisi = '3'";

// tampung hasil query
$hasil = $db->query($query);

// tampung jumlah total baris
$total = $hasil->num_rows;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dafta Sekretariat</title>
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
    <h1>Daftar Sekretariat yang Terdaftar</h1>
    <table border="1">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
      <?php $no = 1; ?>
      <?php while ($data = $hasil->fetch_assoc()) : ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['email'] ?></td>
          <td><?= $data['alamat'] ?></td>
          <td>
            <a href="detail.php?id=<?= $data['nik'] ?>">Detail</a>
            <a href="hapus.php?id=<?= $data['nik'] ?>">Hapus</a>
          </td>
        </tr>
        <?php $no++; ?>
      <?php endwhile; ?>
    </table>

    <h3>Total: <?= $total ?></h3>
  </div>
  <!-- bagian html container -->

  <footer>
    <p>DTS Kelompok 7 &copy; 2019</p>
  </footer>
  <!-- bagian html footer -->
</body>

</html>