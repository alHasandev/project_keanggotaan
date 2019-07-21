<?php

if (isset($_GET['id'])) {
  // masukkan file koneksi.php
  require_once '../config/koneksi.php';

  $id = $_GET['id'];

  // query tampil data pengguna sesuai posisi
  $query = "SELECT p.nik, p.nama, p.email, p.alamat, ps.nama_posisi FROM (pengguna p INNER JOIN mapping m ON p.nik = m.nik) INNER JOIN posisi ps ON m.id_posisi = ps.id_posisi WHERE p.nik = '$id'";

  // tampung pengguna query
  $hasil = $db->query($query);

  // buat menjadi array associative
  $pengguna = $hasil->fetch_assoc();

  // query tampil data pengguna sesuai posisi
  $query = "SELECT * FROM portofolio WHERE nik = '$id'";

  // tampung hasil query portofolio
  $porto = $db->query($query);

  // jalankan dan cek query
  if (!$hasil->num_rows) {
    die('Tidak ada data yang dipilih');
  }
} else {
  // kembalikan ke halaman list pendaftar
  header('Location: pendaftar.php');
}

?>

<?php require_once 'header.php' ?>
<!-- bagian html header -->

<div class="container py-3" style="min-height: 83.1vh">
  <div class="modal-dialog shadow-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Pengguna</h4>
      </div>
      <div class="modal-body">
        <div class="row my-3">
          <span class="col">NIK: </span>
          <span class="col"><?= $pengguna['nik'] ?></span>
        </div>
        <div class="row my-3">
          <span class="col">Nama Lengkap: </span>
          <span class="col"><?= $pengguna['nama'] ?></span>
        </div>
        <div class="row my-3">
          <span class="col">Email: </span>
          <span class="col"><?= $pengguna['email'] ?></span>
        </div>
        <div class="row my-3">
          <span class="col">alamat: </span>
          <span class="col"><?= $pengguna['alamat'] ?></span>
        </div>

        <!-- tampilkan jika memiliki portofolio -->
        <?php if ($porto->num_rows) : ?>
          <?php $data = $porto->fetch_assoc(); ?>
          <div class="row my-3">
            <span class="col">Bidang Keahlian: </span>
            <span class="col"><?= $data['bidang_keahlian'] ?></span>
          </div>
          <div class="row my-3">
            <span class="col">Riwayat Pelatihan: </span>
            <span class="col"><?= $data['riwayat_pelatihan'] ?></span>
          </div>
          <div class="row my-3">
            <span class="col">Sertifikat Dimiliki: </span>
            <span class="col"><?= $data['sertifikat_dimiliki'] ?></span>
          </div>
          <div class="row my-3">
            <span class="col">Riwayat Project: </span>
            <span class="col"><?= $data['riwayat_project'] ?></span>
          </div>
        <?php endif; ?>

        <div class="row my-3">
          <span class="col">posisi: </span>
          <span class="col"><?= $pengguna['nama_posisi'] ?></span>
        </div>

      </div>
      <div class="modal-footer">
        <a href="posisi_pengguna.php" class="btn btn-secondary">Kembali</a>
        <a href="edit_pengguna.php?id=<?= $pengguna['nik'] ?>" class="btn btn-primary">Edit Pengguna</a>
      </div>
    </div>
  </div>
</div>
<!-- bagian html container -->

<?php require_once 'footer.php' ?>