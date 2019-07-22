<?php

// mulai session
session_start();

require_once '../config/helper.php';

// cek hak akses pengguna
cekPengguna($_SESSION['pengguna'], 'ketua');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../style/bootstrap.min.css">
  <title>Dashboard Ketua</title>
</head>

<body>
  <div class="container">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="../">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Anggota <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Laporan <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item"><a href="../profile.php" class="nav-link">Ketua</a></li>
            <li class="nav-item"><a href="../logout.php" class="nav-link">Logout</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <br>

    <div class="jumbotron">
      <h1 class="display-4">Selamat Datang Ketua</h1>
      <hr>
      <p>Disini akan tampil Statistik Jumlah Anggota Per-Tahun</p>
      <p>Disini akan tampil Statistik Jumlah Anggota Per-Provinsi</p>
      <p>Lihat laporan lengkat pada menu Laporan</p>
      <p>Lihat profile pada menu Ketua</p>

      <hr class="my-4">

    </div>

    <footer>
      <p>DTS Kelompok 7 &copy; 2019</p>
    </footer>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>