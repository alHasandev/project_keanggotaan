<?php require_once 'header.php' ?>

<?php

// masukkan file koneksi.php
require_once '../config/koneksi.php';

// cek apakah data telah disubmit
if (isset($_POST['submit'])) {
  // query update profile
  $query = "UPDATE portofolio SET 
              bidang_keahlian = '$_POST[bidang_keahlian]',
              riwayat_pelatihan = '$_POST[riwayat_pelatihan]',
              sertifikat_dimiliki = '$_POST[sertifikat_dimiliki]',
              riwayat_project = '$_POST[riwayat_project]'
            WHERE nik = '$_POST[nik]'";

  // kirimkan query
  if ($db->query($query))
    header('Location: portofolio.php');
  else
    header('Location: portofolio.php?status=gagal');
} else {

  $pengguna = $_SESSION['pengguna'];
  // die(print_r($pengguna));

  // siapkan query untuk tampil pengguna + portofolionya
  $query = "SELECT * FROM portofolio prt WHERE prt.nik = '$pengguna[nik]'";

  // tampung hasil query
  $hasil = $db->query($query);

  // tampung data dalam bentuk array associative
  $data = $hasil->fetch_assoc();
}

?>

<div class="container">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form method="post" action="">
        <div class="modal-header">
          <h4 class="modal-title">Edit Profil <?= $pengguna['nama_posisi'] ?></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" class="form-control" name="nik" value="<?= $data['nik'] ?>" readonly>

          <div class="form-group">
            <label for="bidang_keahlian">bidang_keahlian</label>
            <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" value="<?= $data['bidang_keahlian'] ?>">
          </div>

          <div class="form-group">
            <label for="riwayat_pelatihan">riwayat_pelatihan</label>
            <input type="text" class="form-control" id="riwayat_pelatihan" name="riwayat_pelatihan" value="<?= $data['riwayat_pelatihan'] ?>">
          </div>

          <div class="form-group">
            <label for="sertifikat_dimiliki">sertifikat_dimiliki</label>
            <input type="text" class="form-control" id="sertifikat_dimiliki" name="sertifikat_dimiliki" value="<?= $data['sertifikat_dimiliki'] ?>">
          </div>

          <div class="form-group">
            <label for="riwayat_project">riwayat_project</label>
            <input type="text" class="form-control" id="riwayat_project" name="riwayat_project" value="<?= $data['riwayat_project'] ?>">
          </div>

        </div>
        <div class="modal-footer">
          <a href="profile.php" class="btn btn-secondary">KEMBALI</a>
          <input type="submit" class="btn btn-primary" name="submit" value="UDPATE">
        </div>

      </form>
    </div>
  </div>
</div>

<?php require_once 'footer.php' ?>