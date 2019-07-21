<?php

if (isset($_POST['submit'])) {
  require_once 'config/koneksi.php';

  // buat variabel untuk menampung data login
  $nik = $_POST['nik'];
  $pass = $_POST['password'];
  $id_posisi = $_POST['id_posisi'];

  // buat query login
  $queryLogin = "SELECT * FROM `login` WHERE nik = '$nik'";

  // cek apakah data login sudah terdaftar
  $login = $db->query($queryLogin);

  if ($login->num_rows) {
    $log = $login->fetch_assoc();
    if (password_verify($pass, $log['password'])) {
      // buat query cek posisi
      $queryPosisi = "SELECT m.nik, m.id_posisi, p.nama_posisi FROM mapping m INNER JOIN posisi p ON m.id_posisi = p.id_posisi WHERE m.nik = '$nik' AND m.id_posisi = '$id_posisi'";

      // cek apakah posisi sudah sesusai
      $posisi = $db->query($queryPosisi);


      // die(print_r($posisi->fetch_assoc()));
      if ($posisi->num_rows) {
        $data = $posisi->fetch_assoc();

        header("Location: $data[nama_posisi]");
      } elseif ($id_posisi == 4) {
        // cek apakah posisi sebagai anggota dan belum di approve oleh sekretariat
        header("Location: anggota/index.php?status=belum_diapprove");
      } else {
        header('Location: login.php');
      }
    } else {
      die('Password tidak sesuai');
    }
  } else {
    die('Nik tidak sesuai');
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <form action="" method="POST" class="login">
      <h1>Please Login</h1>
      <div class="form-group">
        <label for="nik">NIK</label>
        <input type="number" name="nik" id="nik" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <div class="form-group">
        <label for="id_posisi">Login Sebagai</label>
        <select name="id_posisi" id="id_posisi" class="form-control">
          <option value="1">Admin</option>
          <option value="2">Ketua</option>
          <option value="3">Sekretariat</option>
          <option value="4">Anggota</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">LOGIN</button >
        <button class="btn btn-primary"><ahref="./anggota/daftar.php">DAFTAR BARU</a></button>
      </div>
    </form>
  </div>
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>