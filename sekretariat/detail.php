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
  <link rel="stylesheet" href="../style/bootstrap.min.css">
</head>

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
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  </header>
  <br>
 
  <!-- bagian html header -->

 <div class="jumbotron">
    <div class="profile">
      <h1>Profile : <?= $data['nik'] ?></h1>
      <hr>
        <span class="label">Nama Lengkap: </span>
        <span class="data"><?= $data['nama'] ?></span>
        <br>
        <span class="label">Email: </span>
        <span class="data"><?= $data['email'] ?></span>
        <br>
        <span class="label">alamat: </span>
        <span class="data"><?= $data['alamat'] ?></span>
        <br>
     
        <span class="label">Bidang Keahlian: </span>
        <span class="data"><?= $data['bidang_keahlian'] ?></span>
        <br>
     
        <span class="label">Riwayat Pelatihan: </span>
        <span class="data"><?= $data['riwayat_pelatihan'] ?></span>
        <br>
     
        <span class="label">Sertifikat Dimiliki: </span>
        <span class="data"><?= $data['sertifikat_dimiliki'] ?></span>
        <br>
     
        <span class="label">Riwayat Project: </span>
        <span class="data"><?= $data['riwayat_project'] ?></span>
        <br>
        <hr>
      <div class="tombol-approve">
        <a href="approve.php?id=<?= $data['nik'] ?>" class="btn btn-primary btn-lg">APPROVE</a>
        <a href="pendaftar.php" class="btn btn-primary btn-lg">Kembali</a>
      </div>
    </div>
  </div>
  <!-- bagian html container -->

  <footer>
    <p>DTS Kelompok 7 &copy; 2019</p>
  </footer>
  </div>
  <!-- bagian html footer -->
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>