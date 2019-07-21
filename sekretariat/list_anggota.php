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
    <link rel="stylesheet" href="../style/bootstrap.min.css">
<body>
  <div class="container">
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link"  href="pendaftar.php">Pendaftar <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link"  href="list_anggota.php">Daftar Anggota <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link"  href="../profile.php">Sekretariat <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link"  href="../">Logout <span class="sr-only">(current)</span></a>
      </li>

    

      </ul>
    </nav>
  </header>
  <!-- bagian html header -->

  
    <h1>Daftar Anggota yang Telah di Approve</h1>
    <table class="table table-bordered">
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
  <!-- bagian html container -->
<br>
  <footer>
    <p>DTS Kelompok 7 &copy; 2019</p>
  </footer>
  <!-- bagian html footer -->
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>