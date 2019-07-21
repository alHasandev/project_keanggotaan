<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../style/bootstrap.min.css">
  <title>Profile Anggota</title>
</head>

<body>
  <header>

    <nav>
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
        <a class="nav-link"  href="#">Portofolio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link"  href="../">Logout <span class="sr-only">(current)</span></a>
      </li>

    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  
</nav>
  </header>
  <!-- bagian html header -->
<br>
  
    <div class="jumbotron">
  <h1 class="display-4">Portofolio</h1>
  <hr>
  <p class="lead">
  <div class="row">
          <span class="label"> </span>
          <span class="data">Misal Frontend Web Dev</span>
          </div>
          <div class="row">
          <span class="label">Riwayat Pelatihan: </span>
          <span class="data">Digitalent VSGA JWD Poliban 2019</span>
          </div>
          <div class="row">
          <span class="label">Sertifikat Dimiliki: </span>
          <span class="data">LSP Junior Web Developer</span>
          </div>
          <div class="row">
          <span class="label">Riwayat Project: </span>
          <span class="data">SIMAWI</span>
          </div>
      </p>
  <hr class="my-4">
  <p></p>
  <a class="btn btn-primary btn-lg" href="portofolio_edit.php" role="button">Edit Portofolio</a>
</div>

  <footer>
    <p>DTS Kelompok 7 &copy; 2019</p>
  </footer>
  <!-- bagian html footer -->

     <script src="js/jquery-3.3.1.min.js"></script>
     <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>