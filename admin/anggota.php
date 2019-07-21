<?php

// masukkan file koneksi.php
require_once '../config/koneksi.php';

// buat query tampil data anggota (yang belum di approve)
$query = "SELECT p.nik, p.nama, p.email, p.alamat FROM pengguna p INNER JOIN mapping m ON p.nik = m.nik WHERE m.id_posisi = '4'";

// tampung hasil query
$hasil = $db->query($query);

// tampung jumlah total baris
$total = $hasil->num_rows;

?>

<?php require_once 'header.php' ?>
<!-- bagian html header -->

<div class="container py-3" style="min-height: 83.1vh">
  <h1>Data Anggota yang Terdaftar</h1>
  <table class="table table-striped table-bordered my-3">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
    <?php $no = 1; ?>
    <?php while ($data = $hasil->fetch_assoc()) : ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['email'] ?></td>
        <td><?= $data['alamat'] ?></td>
        <td>
          <a href="detail.php?id=<?= $data['nik'] ?>" class="btn btn-primary">Detail</a>
          <a href="hapus.php?id=<?= $data['nik'] ?>" class="btn btn-danger">Hapus</a>
        </td>
      </tr>
      <?php $no++; ?>
    <?php endwhile; ?>
  </table>

  <h4>Total: <?= $total ?></h4>
</div>
<!-- bagian html container -->

<?php require_once 'footer.php' ?>