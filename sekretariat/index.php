<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard Sekretariat</title>
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

    <h1>Selamat Datang Sekretariat</h1>
    <hr>
    <p>
      Lihat pada menu pendaftar daftar calon anggota yang menunggu approval
    </p>
    <p>Lihat profile pada menu Sekretariat</p>
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