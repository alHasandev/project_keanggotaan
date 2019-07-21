<?php

if (isset($_GET['id'])) {
  // masukkan file koneksi.php
  require_once '../config/koneksi.php';

  $nik = $_GET['id'];

  // query menghapus hak akses posisi pengguna
  $delMapping = "DELETE FROM mapping WHERE nik = '$nik'";

  // query menghapus pengguna
  $delPengguna = "DELETE FROM pengguna WHERE nik = '$nik'";

  // queary menghapus portofolio
  $delPorto = "DELETE FROM portofolio WHERE nik = '$nik'";

  // query menghapus data login
  $delLogin = "DELETE FROM `login` WHERE nik = '$nik'";

  // jalankan dan cek query
  if ($db->query($delPengguna) && $db->query($delMapping)) {
    $db->query($delPorto);
    $db->query($delLogin);
    header('Location: posisi_pengguna.php');
  } else {
    echo 'Error query : ' . $db->error;
  }
}
