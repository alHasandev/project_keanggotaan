<?php

if (isset($_GET['id'])) {
  // masukkan file koneksi.php
  require_once '../config/koneksi.php';

  $nik = $_GET['id'];

  // buat query mengupdate hak akses posisi pengguna
  $query = "DELETE FROM mapping WHERE nik = '$nik'";

  // jalankan dan cek query
  if ($db->query($query)) {
    header('Location: posisi_pengguna.php');
  } else {
    echo 'Error query : ' . $db->error;
  }
}
