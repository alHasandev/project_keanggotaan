<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Anggota</title>
</head>

<body>
  <header>
    <h1>DTS Kelompok 7</h1>
    <nav>
      <ul class="nav-left">
        <li><a href="../">Home</a></li>
        <li><a href="#">Portofolio</a></li>
      </ul>
      <ul class="nav-right">
        <li><a href="login.php">Anggota</a></li>
        <li><a href="../">Logout</a></li>
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1>Selamat Datang Anggota AWP</h1>
    <p><?= (isset($_GET['status']) && $_GET['status'] == 'belum_diapprove') ? '"Status keanggotaan anda masih menunggu approval"' : NULL ?></p>
    <p>Lihat profile pada menu Anggota</p>
  </div>

  <footer>
    <p>DTS Kelompok 7 &copy; 2019</p>
  </footer>
</body>

</html>