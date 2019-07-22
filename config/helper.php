<?php

function cekPengguna($session, $nama_posisi)
{
  if (!isset($session['nama_posisi'])) {
    header('Location: ../login.php');
  } elseif ($session['nama_posisi'] != $nama_posisi) {
    header("Location: ../$session[nama_posisi]");
  }
}
