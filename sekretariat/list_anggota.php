<?php

// masukkan file koneksi.php
require_once '../config/koneksi.php';

// buat query tampil data anggota (yang belum di approve)
$query = 'SELECT p.nik, p.nama, p.email, prt.bidang_keahlian FROM (pengguna p INNER JOIN portofolio prt ON p.nik = prt.nik) INNER JOIN mapping m ON prt.nik = m.nik';

// tampung hasil query
$hasil = $db->query($query);

// tampung jumlah total baris
$total = $hasil->num_rows;

?>

<?php require_once 'header.php' ?>
<!-- bagian html header -->


<h2>Daftar Anggota yang Telah di Approve</h2>
<hr>
<table class="table table-bordered mb-5">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Bidang Keahlian</th>
  </tr>
  <?php $no = 1; ?>
  <?php while ($data = $hasil->fetch_assoc()) : ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $data['nama'] ?></td>
      <td><?= $data['email'] ?></td>
      <td><?= $data['bidang_keahlian'] ?></td>
    </tr>
    <?php $no++; ?>
  <?php endwhile; ?>
</table>

<h5>Total: <?= $total ?></h5>
<!-- bagian html container -->
<br>

<?php require_once 'footer.php' ?>