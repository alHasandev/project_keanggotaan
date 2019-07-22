<?php

// mulai session
session_start();

// masukkan file helper.php
require_once '../config/helper.php';

// cek hak akses pengguna
cekPengguna($_SESSION['pengguna'], 'sekretariat');

?>

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
              <a class="nav-link" href="pendaftar.php">Pendaftar <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="list_anggota.php">Daftar Anggota <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../profile.php">Sekretariat</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</span></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <br>