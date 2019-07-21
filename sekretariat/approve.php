<?php

if (isset($_GET['id'])) {
  // masukkan file koneksi.php
  require_once '../config/koneksi.php';

  $id = $_GET['id'];

  // buat query mengupdate data anggota menjadi ter approve
  $query = "INSERT INTO mapping VALUES ('$id', '4')";

  // jalankan dan cek query
  if ($db->query($query)) {
    header('Location: pendaftar.php');
  } else {
    echo 'Error query : ' . $db->error;
  }
}
