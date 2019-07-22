<?php

// hancurkan data session / logout
session_start();

session_unset();

session_destroy();

// arahkan ke halaman login
header('Location: login.php');
