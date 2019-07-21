<?php

// masukkan file koneksi.php
require_once '../config/koneksi.php';

// buat query tampil data anggota (yang belum di approve)
$query = 'SELECT p.nik, p.nama, p.email, prt.bidang_keahlian FROM (pengguna p INNER JOIN portofolio prt ON p.nik = prt.nik) LEFT JOIN mapping m ON prt.nik = m.nik WHERE m.nik IS NULL';

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
  <title>Pendaftar Menunggu di Approval</title>
  <link rel="stylesheet" href="../style/bootstrap.min.css">
</head>

<body>
     <div class="container">
    <h1>DTS Kelompok 7</h1>
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
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  </header>
  <br>

  <!-- bagian html header -->

  
    <h1>Daftar Anggota yang menunggu di Approve</h1>
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Bidang Keahlian</th>
        <th>Aksi</th>
      </tr>
      <?php $no = 1; ?>
      <?php while ($data = $hasil->fetch_assoc()) : ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['email'] ?></td>
          <td><?= $data['bidang_keahlian'] ?></td>
          <td>
            <a href="detail.php?id=<?= $data['nik'] ?>">Detail</a>
            <a href="approve.php?id=<?= $data['nik'] ?>">Approve</a>
          </td>
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
  </div>
  <!-- bagian html footer -->
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>