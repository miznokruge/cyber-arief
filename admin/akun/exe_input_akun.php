<?php

//input data 
include "koneksi.php";
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$koneksi->query("INSERT INTO admin set email = '$email', username = '$username', password='$password', level = '$level'");

header("location:index.php?page=daftar_akun");
?>