<?php

// atur properti Koneksi database
$host = 'localhost';
$username = 'root';
$password = NULL;
$dbname = 'db_keanggotaan';

// tampung koneksi kedatabase
$db = new mysqli($host, $username, $password, $dbname);
