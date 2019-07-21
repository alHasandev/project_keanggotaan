<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="../style/bootstrap.min.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">DTS Kelompok 7</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="posisi_pengguna.php">Posisi Pengguna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tambah_pengguna.php">Tambah Pengguna</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Data Anggota
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="admin.php">Data Admin</a>
              <a class="dropdown-item" href="ketua.php">Data Ketua</a>
              <a class="dropdown-item" href="sekretariat.php">Data Sekretariat</a>
              <a class="dropdown-item" href="anggota.php">Data Anggota</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item"><a href="../profile.php" class="nav-link">Admin</a></li>
          <li class="nav-item"><a href="../" class="nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- bagian html header -->