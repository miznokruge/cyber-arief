<?php

$id_admin = $_POST['id_admin'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$koneksi->query("UPDATE admin set email ='$email', username='$username', password='$password', level= '$level'
	where id_admin='$id_admin'");
header("location:index.php?page=daftar_akun");
?>