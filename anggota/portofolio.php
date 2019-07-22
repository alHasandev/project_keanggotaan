<?php require_once 'header.php' ?>
<!-- bagian html header -->

<?php

// masukkan file koneksi.php
require_once '../config/koneksi.php';

$pengguna = $_SESSION['pengguna'];

// siapkan query untuk tampil pengguna + portofolionya
$query = "SELECT p.nik, p.nama, p.email, prt.bidang_keahlian, prt.riwayat_pelatihan, prt.sertifikat_dimiliki, prt.riwayat_project FROM pengguna p INNER JOIN portofolio prt ON p.nik = prt.nik WHERE p.nik = '$pengguna[nik]'";

// tampung hasil query
$hasil = $db->query($query);

// tampung data dalam bentuk array associative
$data = $hasil->fetch_assoc();

?>

<br>
<div class="container">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Portofolio Saya</h3>
      </div>
      <div class="modal-body">
        <div class="row my-3">
          <span class="col">Nama Lengkap</span>
          <span class="col"><?= $data['nama'] ?></span>
        </div>
        <hr>
        <div class="row my-3">
          <span class="col">Email</span>
          <span class="col"><?= $data['email'] ?></span>
        </div>
        <hr>
        <div class="row my-3">
          <span class="col">Bidang Keahlian</span>
          <span class="col"><?= $data['bidang_keahlian'] ?></span>
        </div>
        <hr>
        <div class="row my-3">
          <span class="col">Riwayat Pelatihan</span>
          <span class="col"><?= $data['riwayat_pelatihan'] ?></span>
        </div>
        <hr>
        <div class="row my-3">
          <span class="col">Sertifikat Dimiliki</span>
          <span class="col"><?= $data['sertifikat_dimiliki'] ?></span>
        </div>
        <hr>
        <div class="row my-3">
          <span class="col">Riwayat Project</span>
          <span class="col"><?= $data['riwayat_project'] ?></span>
        </div>
        <hr>
      </div>
      <div class="modal-footer">
        <a href="portofolio_edit.php" class="btn btn-primary">EDIT PORTOFOLIO</a>
      </div>
    </div>
  </div>

</div>

<?php require_once 'footer.php' ?>