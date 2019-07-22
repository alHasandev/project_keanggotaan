<?php require_once 'header.php' ?>
<br>
<div class="jumbotron">

  <h1>Selamat Datang Anggota AWP</h1>
  <p><?= (isset($_GET['status']) && $_GET['status'] == 'belum_diapprove') ? '"Status keanggotaan anda masih menunggu approval"' : NULL ?></p>
  <p>Lihat profile pada menu Anggota</p>
</div>
<?php require_once 'footer.php' ?>