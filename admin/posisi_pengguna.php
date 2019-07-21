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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard Admin</title>
</head>

<body>
  <header>
    <h1>DTS Kelompok 7</h1>
    <nav>
      <ul class="nav-left">
        <li><a href="index.php">Home</a></li>
        <li><a href="posisi_pengguna.php">Posisi Pengguna</a></li>
        <li><a href="tambah_pengguna.php">Tambah Pengguna</a></li>
        <li><a href="admin.php">Daftar Admin</a></li>
        <li><a href="ketua.php">Daftar Ketua</a></li>
        <li><a href="sekretariat.php">Daftar Sekretariat</a></li>
        <li><a href="anggota.php">Daftar Anggota</a></li>
      </ul>
      <ul class="nav-right">
        <li><a href="../profile.php">Admin</a></li>
        <li><a href="../">Logout</a></li>
      </ul>
    </nav>
  </header>
  <!-- bagian html header -->

  <div class="container">
    <h1>Posisi Pengguna di SIMAWI</h1>
    <table border="1">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Posisi</th>
      </tr>
      <?php $no = 1; ?>
      <?php while ($data = $pengguna->fetch_assoc()) { ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['email'] ?></td>
          <td>
            <select id="posisi" onchange="location.href = this.value">
              <option value="delete_posisi.php?id=<?= $data['nik'] ?>" <?= selected($data['id_posisi'], '0') ?>>---</option>
              <?php foreach ($posisi as $ps) : ?>
                <option value="update_posisi.php?id=<?= $data['nik'] ?>&posisi=<?= $ps['id_posisi'] ?>" <?= selected($data['id_posisi'], $ps['id_posisi']) ?>><?= $ps['nama_posisi'] ?></option>
              <?php endforeach; ?>
            </select>
          </td>
        </tr>
        <?php $no++; ?>
      <?php } ?>
    </table>

    <h3>Total: <?= $total ?></h3>
  </div>
  <!-- bagian html container -->

  <footer>
    <p>DTS Kelompok 7 &copy; 2019</p>
  </footer>
  <!-- bagian html footer -->
</body>

</html>