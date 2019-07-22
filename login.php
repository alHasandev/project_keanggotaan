<?php

session_start();

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
        $_SESSION['pengguna'] = [
          'nik' => $data['nik'],
          'nama_posisi' => $data['nama_posisi']
        ];

        header("Location: $data[nama_posisi]");
      } elseif ($id_posisi == 4) {
        // cek apakah posisi sebagai anggota dan belum di approve oleh sekretariat
        $_SESSION['pengguna'] = [
          'nik' => $data['nik'],
          'id_posisi' => 0
        ];

        header("Location: login.php?status=belum_diapprove");
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
    <?php if (isset($_GET['status'])) : ?>
      <?php if ($_GET['status'] == 'belum_diapprove') : ?>
        <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
          <strong>Menunggu Persetujuan!</strong> Harap bersabar, permintaan keanggotaan anda sedang menunggu persetujuan Sekretariat.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php elseif ($_GET['status'] == 'berhasil') : ?>
        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
          <strong>Pendaftaran Berhasil!</strong> Permintaan bergabung anda telah terkirim, harap menunggu konfirmasi dari Sekretariat.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

    <?php endif; ?>
    <form action="" method="POST" class="py-5 px-4 mx-auto my-3 shadow-sm" style="max-width: 600px">
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
        <p>belum punya akun ? <a href="./anggota/daftar.php">Daftar Baru</a></p>
        <a href="./" class="btn btn-secondary">KEMBALI</a>
        <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
      </div>
    </form>
  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>