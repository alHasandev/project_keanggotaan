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
</head>

<body>
  <header>
    <h1>DTS Kelompok 7</h1>
    <nav>
      <ul class="nav-left">
        <li><a href="../">Home</a></li>
      </ul>
      <ul class="nav-right">
        <li><a href="../login.php">Anggota</a></li>
        <li><a href="../">Logout</a></li>
      </ul>
    </nav>
  </header>
  <!-- bagian html header -->

  <div class="container">
    <form action="" method="POST" class="register">
      <h1>Daftar Sebagai Anggota AWP</h1>
      <div class="form-group">
        <label for="nik">NIK</label>
        <input type="number" name="nik" id="nik">
      </div>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat">
      </div>
      <div class="form-group">
        <label for="bidang_keahlian">Bidang Keahlian</label>
        <input type="text" name="bidang_keahlian" id="bidang_keahlian">
      </div>
      <div class="form-group">
        <label for="riwayat_pelatihan">Riwayat Pelatihan</label>
        <input type="text" name="riwayat_pelatihan" id="riwayat_pelatihan">
      </div>
      <div class="form-group">
        <label for="sertifikat_dimiliki">sertifikat_dimiliki</label>
        <input type="text" name="sertifikat_dimiliki" id="sertifikat_dimiliki">
      </div>
      <div class="form-group">
        <label for="riwayat_project">Riwayat Project</label>
        <input type="text" name="riwayat_project" id="riwayat_project">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
      </div>
      <div class="form-group">
        <button type="submit" name="submit">Kirim Permintaan Gabung</button>
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