<?php

// masukkan file koneksi.php
require_once '../config/koneksi.php';

// buat query tampil list pengguna dan posisinya
$queryPengguna = 'SELECT p.nik, p.nama, p.email, ps.id_posisi, ps.nama_posisi FROM (pengguna p LEFT JOIN mapping m ON p.nik = m.nik) LEFT JOIN posisi ps ON m.id_posisi = ps.id_posisi ORDER BY id_posisi';

// buat query daftar posisi
$queryPosisi = 'SELECT * FROM posisi';

// tampung hasil query pengguna
$pengguna = $db->query($queryPengguna);

// tampung hasil query posisi
$posisi = $db->query($queryPosisi);

// tampung jumlah total baris
$total = $pengguna->num_rows;

// buat fungsi menenntukan option tag yang terpilih
function selected($param1, $param2)
{
  return ($param1 == $param2) ? 'selected' : NULL;
}

?>

<?php require_once 'header.php' ?>
<!-- bagian html header -->

<div class="container py-3" style="min-height: 83.1vh">
  <h1>Posisi Pengguna di SIMAWPI</h1>
  <table class="table table-striped table-bordered my-3">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Posisi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php while ($data = $pengguna->fetch_assoc()) { ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['email'] ?></td>
          <td>
            <select class="form-control-sm" id="posisi" onchange="location.href = this.value">
              <option value="delete_posisi.php?id=<?= $data['nik'] ?>" <?= selected($data['id_posisi'], '0') ?>>---</option>
              <?php foreach ($posisi as $ps) : ?>
                <option value="update_posisi.php?id=<?= $data['nik'] ?>&posisi=<?= $ps['id_posisi'] ?>" <?= selected($data['id_posisi'], $ps['id_posisi']) ?>><?= $ps['nama_posisi'] ?></option>
              <?php endforeach; ?>
            </select>
          </td>
        </tr>
        <?php $no++; ?>
      <?php } ?>
    </tbody>
  </table>

  <h4>Total: <?= $total ?></h4>
</div>
<!-- bagian html container -->

<?php require_once 'footer.php' ?>
<!-- bagian html footer -->