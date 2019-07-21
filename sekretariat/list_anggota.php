<?php

// masukkan file koneksi.php
require_once '../config/koneksi.php';

// buat query tampil data anggota (yang belum di approve)
$query = 'SELECT p.nik, p.nama, p.email, prt.bidang_keahlian FROM (pengguna p INNER JOIN portofolio prt ON p.nik = prt.nik) INNER JOIN mapping m ON prt.nik = m.nik';

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
  <title>Anggota yang telah di Approve</title>
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
    <h1>Daftar Anggota yang Telah di Approve</h1>
    <table border="1">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Bidang Keahlian</th>
      </tr>
      <?php $no = 1; ?>
      <?php while ($data = $hasil->fetch_assoc()) : ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['email'] ?></td>
          <td><?= $data['bidang_keahlian'] ?></td>
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