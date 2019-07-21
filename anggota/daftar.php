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

  $bidang = $_POST['bidang_keahlian'];
  $pelatihan = $_POST['riwayat_pelatihan'];
  $sertifikat = $_POST['sertifikat_dimiliki'];
  $project = $_POST['riwayat_project'];

  // buat query insert ke tabel login
  $queryLogin = "INSERT INTO `login` VALUES('$nik', '$pass')";

  // buat query insert ke tabel pengguna
  $queryPengguna = "INSERT INTO pengguna VALUES(
              '$nik', '$nama', '$email', '$alamat'
          )";

  // buat query insert ke tabel portofolio
  $queryPortofolio = "INSERT INTO portofolio VALUES(
                      '$nik', 
                      '$bidang', 
                      '$pelatihan', 
                      '$sertifikat',
                      '$project'
                  )";

  // jalankan dan cek query
  if ($db->query($queryLogin)) {
    if ($db->query($queryPengguna) && $db->query($queryPortofolio))
      header('Location: ../login.php');
    else
      header('Location: daftar.php');
  } else
    header('Location: daftar.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pendaftaran Anggota AWP</title>
  <link rel="stylesheet" href="../style/bootstrap.min.css">
</head>

<body>
  <div class="container">
  <h1>DTS Kelompok 7</h1>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="../">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link"  href="../login.php">Anggota <span class="sr-only">(current)</span></a>
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
  <!-- bagian html header -->

  <div class="container">
    <form action="" method="POST" class="register">
      <h5>Daftar Sebagai Anggota AWP:</h5>
      <div class="form-group">
        <label for="nik">NIK</label>
        <input type="number" name="nik" id="nik" class="form-control">
      </div>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control">
      </div>
      <div class="form-group">
        <label for="bidang_keahlian">Bidang Keahlian</label>
        <input type="text" name="bidang_keahlian" id="bidang_keahlian" class="form-control">
      </div>
      <div class="form-group">
        <label for="riwayat_pelatihan">Riwayat Pelatihan</label>
        <input type="text" name="riwayat_pelatihan" id="riwayat_pelatihan" class="form-control">
      </div>
      <div class="form-group">
        <label for="sertifikat_dimiliki">sertifikat_dimiliki</label>
        <input type="text" name="sertifikat_dimiliki" id="sertifikat_dimiliki" class="form-control">
      </div>
      <div class="form-group">
        <label for="riwayat_project">Riwayat Project</label>
        <input type="text" name="riwayat_project" id="riwayat_project" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Kirim Permintaan Gabung</button>
      </div>
    </form>
  
  <!-- bagian html container -->

  <footer>
    <p>DTS Kelompok 7 &copy; 2019</p>
  </footer>
  </div>
  <!-- bagian html footer -->
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</html>