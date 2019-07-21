<?php

if (isset($_GET['id']) && isset($_GET['posisi'])) {
  // masukkan file koneksi.php
  require_once '../config/koneksi.php';

  $nik = $_GET['id'];
  $posisi = $_GET['posisi'];

  // cek apakah data telah ada,
  $ada = $db->query("SELECT * FROM mapping WHERE nik = '$nik'");

  // jika ada, maka
  if ($ada->num_rows) {
    // buat query mengupdate hak akses / privilage pengguna
    $query = "UPDATE mapping SET id_posisi = '$posisi' WHERE nik = '$nik'";
  } else { // jika tidak ada, maka
    // buat query untuk menambah posisi pengguna
    $query = "INSERT INTO mapping VALUE ('$nik', '$posisi')";
  }

  // jalankan dan cek query
  if ($db->query($query)) {
    header('Location: posisi_pengguna.php');
  } else {
    echo 'Error query : ' . $db->error;
  }
}
